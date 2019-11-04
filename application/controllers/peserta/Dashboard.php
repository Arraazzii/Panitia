<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta/DashboardModel');
        $this->load->model('peserta/DaftarMyEventModel');
        $this->load->model('peserta/DaftarPembayaranModel');
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
	    $data['ended'] = $this->EventModel->ended();
		$this->load->view('peserta/dashboard', $data);
	}

	public function profile()
	{
		if(empty($this->session->userdata('id_peserta'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
	    $var['profile'] = $this->DashboardModel->profile();
	    $var['minat'] = $this->EventModel->Minat();
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

    public function pembayaran()
	{
		if(empty($this->session->userdata('id_peserta'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }

		$this->load->view('peserta/list_pembayaran');
	}

	public function get_list_pembayaran_peserta()
    {

        $list = $this->DaftarPembayaranModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $no = 1;
        foreach ($list as $pembayaran) {

            $row = array();
            $row[] = $no++;
            $row[] = $pembayaran->JUDUL_ACARA;
            $row[] = $pembayaran->NAMA_BANK;
            $row[] = $pembayaran->NO_REKENING;
            $row[] = $pembayaran->NAMA_REKENING;
            $row[] = '<a href="javascript:void(0)" class="detail" data-images="'.$pembayaran->BUKTI_TRANSFER.'" data-id="'.$pembayaran->ID_PEMBAYARAN.'">Bukti.png</a>';

            if ($pembayaran->STATUS_PEMBAYARAN == 1) {
            	//add html for action
            	$row[] = '<button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-check"></i> Sudah Dikonfirmasi</button>';
            } else {
            	//add html for action
            	$row[] = '<button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-clock"></i> Menunggu Konfirmasi</button>';
            }
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->DaftarPembayaranModel->count_all(),
            "recordsFiltered" => $this->DaftarPembayaranModel->count_filtered(),
            "data" => $data,
       	);
        //output to json format
        echo json_encode($output);
    }

    public function getListClickked(){
		$id = $this->input->post('id');

		$result = $this->DaftarPembayaranModel->getpembayaranclickList($id);
		echo json_encode($result);

	}

    public function myevent()
	{
		if(empty($this->session->userdata('id_peserta'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }

		$this->load->view('peserta/list_myevent_peserta');
	}

	public function get_list_myevent_peserta()
    {
        $list = $this->DaftarMyEventModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $no = 1;
        foreach ($list as $event) {

        	if ($event->STATUS == 2) {
        		$status = 'UPCOMING';
        	} elseif ($event->STATUS == 1) {
        		$status = 'NOW';
        	} else {
        		$status = 'END';
        	}

            $row = array();
            $row[] = $no++;
            $row[] = $event->KODE_EVENTS;
            $row[] = $event->JUDUL_ACARA;
            $row[] = date('d-m-Y H:i:s', strtotime($event->WAKTU_MULAI));
            $row[] = date('d-m-Y H:i:s', strtotime($event->WAKTU_AKHIR));
            $row[] = $event->LOKASI;
            $row[] = $status;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->DaftarMyEventModel->count_all(),
            "recordsFiltered" => $this->DaftarMyEventModel->count_filtered(),
            "data" => $data,
       	);
        //output to json format
        echo json_encode($output);
    }
}
