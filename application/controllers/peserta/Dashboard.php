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
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
	    $data['event'] = $this->EventModel->eventNow();
	    $data['upcoming'] = $this->EventModel->upcoming();
		$this->load->view('peserta/dashboard', $data);
	}

	public function profile()
	{
		if(empty($this->session->userdata('id_peserta'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
	    $var['profile'] = $this->DashboardModel->profile();
		$this->load->view('peserta/profile', $var);
	}

	public function event_now()
	{
		if(empty($this->session->userdata('id_peserta'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
		$this->load->view('peserta/event_now');
	}

	public function upcoming()
	{
		if(empty($this->session->userdata('id_peserta'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
		$this->load->view('peserta/upcoming');
	}

    public function DaftarEvent($kode_event)
    {
    	if (!$this->session->userdata('id_peserta')) {
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
    	}

		$kode = $kode_event;
	    $var['detail'] = $this->EventModel->detailEvent($kode);
	    $var['count_peserta'] = $this->EventModel->countPeserta($kode);
	    $var['profile'] = $this->DashboardModel->profile();
	    $var['minat'] = $this->EventModel->Minat();
	    $check = $this->DashboardModel->CheckKeikutsertaan($var['profile']->ID_PESERTA, $var['detail']->KODE_EVENTS);

	    if ($check) {
		   	$this->session->set_flashdata('danger', 'Anda Telah Terdaftar Di Event ini.');
		    redirect(site_url('peserta/dashboard'),'refresh');
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
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
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
		   		$this->session->set_flashdata('success', 'Berhasil Memperbarui Profile.');
		    	redirect(site_url('peserta/profile'),'refresh');
			} else {
		   		$this->session->set_flashdata('danger', 'Gagal Memperbarui Profile.');
		    	redirect(site_url('peserta/profile'),'refresh');
			}
		} else {
			if ($query) {
		    	redirect(site_url('peserta/pembayaran/'.$this->input->post('kode_events')));
			} else {
		   		$this->session->set_flashdata('danger', 'Gagal Memperbarui Profile.');
		    	redirect(site_url('daftar_event/'.$this->input->post('kode_events')), 'refresh');
			}
		}
	}

    public function KonfirmasiPendaftaran()
    {
    	if(empty($this->session->userdata('id_peserta'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
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
		    	$this->DashboardModel->DeletePendaftaran($id_pendaftaran);
		   		$this->session->set_flashdata('danger', 'Gagal Upload Bukti Pembayaran.');
		    	redirect(site_url('detail_event/'.$this->input->post('kode_events')), 'refresh');
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
		   	$this->session->set_flashdata('success', 'Berhasil Mendaftar, Silahkan Tunggu Konfirmasi dari Panitia.');
		    redirect(site_url('detail_event/'.$this->input->post('kode_events')), 'refresh');
	    } else {
		   	$this->session->set_flashdata('danger', 'Gagal Mendaftar.');
		    redirect(site_url('detail_event/'.$this->input->post('kode_events')),'refresh');
	    }
    }
}
