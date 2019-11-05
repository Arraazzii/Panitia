<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('eo/EventModel');
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
  		$this->load->library('pagination');
    }

	public function events()
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
	    //set params
	    $params = array();
	    //set records per page
	    $limit_page = 16;
	    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
	    $total = $this->EventModel->totalEvents();
	    if ($total > 0) 
        {
            // get current page records
            $params['results'] = $this->EventModel->get_current_page($limit_page, $page * $limit_page);
             
            $config['base_url'] = site_url('event_organizer/events');
            $config['total_rows'] = $total;
            $config['per_page'] = $limit_page;
            $config['uri_segment'] = 3;

            //paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
            
            //bootstrap pagination 
            $config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['attributes'] = ['class' => 'page-link'];
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
             
            $this->pagination->initialize($config);
             
            // build paging links
            $params['links'] = $this->pagination->create_links();
        }
	    // $data['event'] = $this->EventModel->myEvent();
		$this->load->view('eo/my_events', $params);
	}

	public function tambah_events()
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
	    $data['minat'] = $this->EventModel->Minat();
		$this->load->view('eo/tambah_event', $data);
	}

	public function detailEvent($kode_event)
	{
		$kode = $kode_event;
	    $var['detail'] = $this->EventModel->detailEvent($kode);
	    $var['count_peserta'] = $this->EventModel->countPeserta($kode);
		if ($this->session->userdata('id_eo')) {
			if (!empty($var['detail'])) {
				$this->load->view('eo/detail_event', $var);
			} else {
				redirect('eo/dashboard');
			}
		} elseif($this->session->userdata('id_peserta')) {
			if (!empty($var['detail'])) {
				$this->load->view('peserta/detail_event', $var);
			} else {
				redirect('peserta/dashboard');
			}
		} else {
			if (!empty($var['detail'])) {
				$this->load->view('detail', $var);
			} else {
				redirect('index');
			}
		}
	}

	public function prosesTambahEvents()
    {
	    $this->load->library('upload');
        //config untuk upload gambar
        $config['upload_path'] = './assets/img/agenda/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = FALSE;
        $config['max_size'] = '5000';
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('agenda')) {
            echo "error";
        } else {
	        $agenda = $this->upload->data();
            unset($config);
            $config['upload_path'] = './assets/img/flayer/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['overwrite'] = FALSE;
            $config['max_size'] = '15000';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('flayer')) {
                echo "error";
            } else {
	        	$flayer = $this->upload->data();
            }
        }

	   	$check = $this->EventModel->countKodeEvents();
		$kode = 'EVT'.str_pad($check, 4, 0, STR_PAD_LEFT);
	    $data = array(
	        'kode_events' => $kode,
			'judul_acara' => $this->input->post('judul_acara'),
			'detail_acara' => $this->input->post('detail_acara'),
	        'website' => $this->input->post('website'),
	        'lokasi' => $this->input->post('lokasi'),
	        'waktu_mulai' => $this->input->post('waktu_mulai'),
	        'waktu_akhir' => $this->input->post('waktu_akhir'),
	        'agenda' => $agenda['file_name'],
	        'nama_cp' => $this->input->post('nama_cp'),
	        'email' => $this->input->post('email'),
	        'nohp' => $this->input->post('nohp'),
	        'status_event' => $this->input->post('status_event'),
	        'harga' => preg_replace("/[^0-9]/", "", $this->input->post('harga')),
	        'nama_bank' => $this->input->post('nama_bank'),
	        'nama_rekening' => $this->input->post('nama_rekening'),
	        'nomor_rekening' => $this->input->post('no_rekening'),
	        'id_minat' => $this->input->post('id_minat'),
	        'status' => 2,
	        'status_event' => $this->input->post('status_event'),
	        'flayer' => $flayer['file_name'],
	        'is_deleted' => 0,
	        'created_by' => $this->session->userdata('id_eo'),
	        'created_date' => date('Y-m-d H:i:s')
	    );
	    $query = $this->EventModel->tambahEvents($data);
	    if($query == TRUE){
		   	$this->session->set_flashdata('success', 'Berhasil Mengupload Events, Silahkan Aktifkan Terlebih dahulu.');
		    redirect(site_url('event_organizer/events'),'refresh');
	    }else{
		   	$this->session->set_flashdata('danger', 'Event gagal di Upload.');
		    redirect(site_url('event_organizer/add_events'),'refresh');
	    }
	}

	public function deleteEvent($kode_event){
        $query = $this->EventModel->deleteEvent($kode_event);
        if($query){
            unlink("assets/img/flayer/".$_id->image);
            unlink("assets/img/agenda/".$_id->image);
        }
        redirect(site_url('event_organizer/events'));
    }

    public function editEvent($kode_event)
    {
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
	    $data['detail'] = $this->EventModel->detailEvent($kode_event);
	    $data['minat'] = $this->EventModel->Minat();
		$this->load->view('eo/edit_event', $data);
    }

    public function prosesEditEvent()
    {
    	$kode_event = $this->input->post('kode_events');

    	$config['upload_path'] = './assets/img/agenda/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = FALSE;
        $config['max_size'] = '15000';
	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('agenda')) {
            $file_agenda = $this->input->post('old_agenda');
        } else {
	        $agenda = $this->upload->data();
	        $file_agenda = $agenda['file_name'];
	        unlink("assets/img/agenda/".$this->input->post('old_agenda'));
            unset($config);
        }

        $config['upload_path'] = './assets/img/flayer/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = FALSE;
        $config['max_size'] = '15000';
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('flayer')) {
            $file_flayer = $this->input->post('old_flayer');
        } else {
	       	$flayer = $this->upload->data();
	        $file_flayer = $flayer['file_name'];
	        unlink("assets/img/flayer/".$this->input->post('old_flayer'));
        }

	    $data = array(
	        'judul_acara' => $this->input->post('judul_acara'),
	        'detail_acara' => $this->input->post('detail_acara'),
	        'website' => $this->input->post('website'),
	        'lokasi' => $this->input->post('lokasi'),
	        'waktu_mulai' => $this->input->post('waktu_mulai'),
	        'waktu_akhir' => $this->input->post('waktu_akhir'),
	        'agenda' => $file_agenda,
	        'nama_cp' => $this->input->post('nama_cp'),
	        'email' => $this->input->post('email'),
	        'nohp' => $this->input->post('nohp'),
	        'status_event' => $this->input->post('status_event'),
	        'harga' => preg_replace("/[^0-9]/", "", $this->input->post('harga')),
	        'nama_bank' => $this->input->post('nama_bank'),
	        'nama_rekening' => $this->input->post('nama_rekening'),
	        'nomor_rekening' => $this->input->post('no_rekening'),
	        'id_minat' => $this->input->post('id_minat'),
	        'status' => 2,
	        'status_event' => $this->input->post('status_event'),
	        'flayer' => $file_flayer,
	        'is_deleted' => 0,
	        'updated_by' => $this->session->userdata('id_eo'),
	        'updated_date' => date('Y-m-d H:i:s')
	    );

	    $query = $this->EventModel->editEvents($data, $kode_event);
	    if($query == TRUE){
		   	$this->session->set_flashdata('success', 'Berhasil Mengupdate Events.');
		    redirect(site_url('event_organizer/events'),'refresh');
	    }else{
		   	$this->session->set_flashdata('danger', 'Event gagal di Update.');
		    redirect(site_url('event_organizer/edit_event/'.$kode_event), 'refresh');
	    }
    }

    public function nonAktifkanEvent($kode_event)
    { 	
    	$data = array(
    		'status' => 0
    	);
        $query = $this->EventModel->nonAktifkan($kode_event, $data);
        if ($query) {
        	redirect('detail_event/'.$kode_event, 'refresh'); 
        }
    }

    public function AktifkanEvent($kode_event)
    { 	
    	$data = array(
    		'status' => 1
    	);
        $query = $this->EventModel->Aktifkan($kode_event, $data);
        if ($query) {
        	redirect('detail_event/'.$kode_event, 'refresh'); 
        }
    }
}
