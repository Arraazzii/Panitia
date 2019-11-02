<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta/DashboardModel');
        $this->load->model('eo/EventModel');
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
    }

	public function index()
	{
		if(empty($this->session->userdata('id_peserta'))){
			echo "<script>alert('Silahkan Login Dahulu.')</script>";
			redirect('login', 'refresh');
			die();
	    }
	    $data['event'] = $this->EventModel->eventNow();
	    $data['upcoming'] = $this->EventModel->upcoming();
		$this->load->view('peserta/dashboard', $data);
	}

	public function profile()
	{
		if(empty($this->session->userdata('id_peserta'))){
			echo "<script>alert('Silahkan Login Dahulu.')</script>";
			redirect('login', 'refresh');
			die();
	    }
	    $var['profile'] = $this->DashboardModel->profile();
		$this->load->view('peserta/profile', $var);
	}

	public function event_now()
	{
		if(empty($this->session->userdata('id_peserta'))){
			echo "<script>alert('Silahkan Login Dahulu.')</script>";
			redirect('login', 'refresh');
			die();
	    }
		$this->load->view('peserta/event_now');
	}

	public function upcoming()
	{
		if(empty($this->session->userdata('id_peserta'))){
			echo "<script>alert('Silahkan Login Dahulu.')</script>";
			redirect('login', 'refresh');
			die();
	    }
		$this->load->view('peserta/upcoming');
	}

    public function DaftarEvent($kode_event)
    {
    	if (!$this->session->userdata('id_peserta')) {
			echo "<script>alert('Silahkan Login Dahulu.')</script>";
			redirect('login', 'refresh');
			die();
    	}

		$kode = $kode_event;
	    $var['detail'] = $this->EventModel->detailEvent($kode);
	    $var['count_peserta'] = $this->EventModel->countPeserta($kode);
	    $var['profile'] = $this->DashboardModel->profile();
	    $var['minat'] = $this->EventModel->Minat();
	    $check = $this->DashboardModel->CheckKeikutsertaan($var['profile']->ID_PESERTA, $var['detail']->KODE_EVENTS);

	    if ($check) {
	    	echo "<script>alert('Anda Telah Terdaftar Di Event ini');</script>";
	    	redirect('peserta/dashboard', 'refresh');
	    	die();
	    } else {
	    	$query = $this->DashboardModel->CheckKelengkapan();

	    	if ($query) {
	    		$this->load->view('peserta/pembayaran', $var);
	    	} else {
	    		$this->load->view('peserta/daftar', $var);
	    	}
	    }
	    
    }

	public function prosesDaftar()
	{
		if(empty($this->session->userdata('id_peserta'))){
			echo "<script>alert('Silahkan Login Dahulu.')</script>";
			redirect('login', 'refresh');
			die();
	    }

		$id_peserta = $this->input->post('id_peserta');
		$update = array(
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'status_pernikahan' => $this->input->post('status_pernikahan'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'pendapatan' => $this->input->post('pendapatan'),
			'id_minat' => $this->input->post('id_minat'),
			'updated_date' => date('Y-m-d H:i:s')
		);
		
		$query = $this->DashboardModel->update_profile($update, $id_peserta);

		if ($this->input->post('profile') == 'update_profile') {
			if ($query) {
				echo "<script>alert('Berhasil Memperbarui Profile.')</script>";
				redirect('peserta/profile', 'refresh');
				die();
			} else {
				echo "<script>alert('Gagal Memperbarui Profile.')</script>";
				redirect('peserta/profile', 'refresh');
				die();
			}
		} else {
			if ($query) {
		    	redirect(site_url('peserta/pembayaran/'.$this->input->post('kode_events')));
			} else {
				echo "<script>alert('Gagal Memperbarui Profile.')</script>";
				redirect('daftar_event/'.$this->input->post('kode_events'), 'refresh');
				die();
			}
		}
	}

    public function KonfirmasiPendaftaran()
    {
    	if(empty($this->session->userdata('id_peserta'))){
			echo "<script>alert('Silahkan Login Dahulu.')</script>";
			redirect('login', 'refresh');
			die();
	    }

		$daftar = array(
			'id_peserta' => $this->input->post('id_peserta'),
			'kode_events' => $this->input->post('kode_events'),
			'status' => 2
		);

	    
		$id_pendaftaran = $this->DashboardModel->DaftarEvent($daftar);

	    if ($this->input->post('harga') == 0) {
	    	$bayar = array(
			    // 'nama_bank' => $this->input->post('nama_bank'),
			    // 'no_rekening' => $this->input->post('no_rekening'),
			    // 'nama_rekening' => $this->input->post('nama_rekening'),
			    // 'bukti_transfer' => $_dataBukti['upload_bukti']['file_name'],
			    'id_pendaftaran' => $id_pendaftaran,
			    'status_pembayaran' => 2
			);
	    } else {
	    	$config['upload_path'] = './assets/img/bukti/';
		    $config['allowed_types'] = 'gif|jpg|png';
		    $config['max_size'] = 0;
		    $config['max_width'] = 0;
		    $config['max_height'] = 0;
		    $this->load->library('upload', $config);
		    if (!$this->upload->do_upload('bukti')){
		    	echo "<script>alert('Gagal Upload Bukti Pembayaran.')</script>";
		    	$this->DashboardModel->DeletePendaftaran($id_pendaftaran);
				redirect('detail_event/'.$this->input->post('kode_events'), 'refresh');
				die(); 
		    }else{
		    	$_dataBukti = array('upload_bukti' => $this->upload->data());
		    	$bayar = array(
			    	'nama_bank' => $this->input->post('nama_bank'),
			    	'no_rekening' => $this->input->post('no_rekening'),
			    	'nama_rekening' => $this->input->post('nama_rekening'),
			    	'bukti_transfer' => $_dataBukti['upload_bukti']['file_name'],
			    	'id_pendaftaran' => $id_pendaftaran,
			    	'status_pembayaran' => 2
			    );
		    }
	    }

	    $queryBayar = $this->DashboardModel->BayarEvent($bayar);

	    if ($queryBayar) {
	    	echo "<script>alert('Berhasil Mendaftar, Silahkan Tunggu Konfirmasi dari Panitia.')</script>";
			redirect('detail_event/'.$this->input->post('kode_events'), 'refresh');
			die();
	    } else {
	    	echo "<script>alert('Gagal Mendaftar.')</script>";
			redirect('detail_event/'.$this->input->post('kode_events'), 'refresh');
			die();
	    }
    }
}
