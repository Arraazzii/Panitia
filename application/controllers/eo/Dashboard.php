<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('eo/DashboardModel');
        $this->load->model('eo/EventModel');
        $this->load->model('eo/DaftarPesertaModel');
        $this->load->model('eo/DaftarEventModel');
        $this->load->model('eo/DaftarPembayaranModel');
        $this->load->model('eo/DaftarInvoiceModel');
        $this->load->model('eo/DaftarUserModel');
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
    }

	public function index()
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
		$data['count_peserta'] = $this->DashboardModel->CountPeserta();
		$data['count_myevents'] = $this->DashboardModel->CountMyEvents();
		$data['count_jadwal'] = $this->DashboardModel->CountJadwal();
        $data['count_invoice'] = $this->DashboardModel->CountInvoice();
	    $data['event'] = $this->EventModel->eventNow();
		$this->load->view('eo/dashboard', $data);
	}

	public function profile()
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
	    $var['profile'] = $this->DashboardModel->profile();
		$this->load->view('eo/profile', $var);
	}

	public function ListEventPembayaran()
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
		$this->load->view('eo/list_event_pembayaran');
	}

	public function get_list_event_pembayaran()
    {

        $list = $this->DaftarEventModel->get_datatables();
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
            $row[] = $event->LOKASI;
            $row[] = $event->STATUS_EVENT;
            $row[] = $status;
            $row[] = '<a class="btn btn-info btn-sm" target="_blank" title="Hapus" href="'.site_url('event_organizer/pembayaran/'.$event->KODE_EVENTS).'"><i class="mdi mdi-eye"></i> Lihat</a>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->DaftarEventModel->count_all(),
            "recordsFiltered" => $this->DaftarEventModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

	public function ListEventPendaftaran()
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
		$this->load->view('eo/list_event_pendaftaran');
	}

	public function get_list_event_pendaftaran()
    {

        $list = $this->DaftarEventModel->get_datatables();
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
            $row[] = $event->LOKASI;
            $row[] = $event->STATUS_EVENT;
            $row[] = $status;
            $row[] = '<a class="btn btn-info btn-sm" target="_blank" title="Hapus" href="'.site_url('daftar_peserta/'.$event->KODE_EVENTS).'"><i class="mdi mdi-eye"></i> Lihat</a>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->DaftarEventModel->count_all(),
            "recordsFiltered" => $this->DaftarEventModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

	public function DaftarPeserta($kode_events)
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
		$var['kode'] = $kode_events;
	    $var['detail'] = $this->EventModel->detailEvent($kode_events);
		$this->load->view('eo/daftar_peserta', $var);
	}

	public function get_list_daftar()
    {
    	$kode = $this->input->post('kode_events');

        $list = $this->DaftarPesertaModel->get_datatables($kode);
        $data = array();
        $no = $_POST['start'];
        $no = 1;
        foreach ($list as $peserta) {
            $row = array();
            $row[] = $no++;
            $row[] = $peserta->NAMA;
            $row[] = $peserta->EMAIL;
            $row[] = $peserta->NOHP;
            $row[] = $peserta->KODE_EVENTS.' - '.$peserta->JUDUL_ACARA;
            $row[] = '';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->DaftarPesertaModel->count_all($kode),
            "recordsFiltered" => $this->DaftarPesertaModel->count_filtered($kode),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

	public function pembayaran($kode_events)
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
		$var['kode'] = $kode_events;
	    $var['detail'] = $this->DaftarPembayaranModel->detailPembayaran($kode_events);

		$this->load->view('eo/pembayaran', $var);
	}

	public function get_list_pembayaran()
    {
    	$kode = $this->input->post('kode_events');

        $list = $this->DaftarPembayaranModel->get_datatables($kode);
        $data = array();
        $no = $_POST['start'];
        $no = 1;
        foreach ($list as $pembayaran) {

            $row = array();
            $row[] = $no++;
            $row[] = $pembayaran->NAMA;
            $row[] = $pembayaran->NAMA_BANK;
            $row[] = $pembayaran->NO_REKENING;
            $row[] = $pembayaran->NAMA_REKENING;
            $row[] = '<a href="javascript:void(0)" class="detail" data-images="'.$pembayaran->BUKTI_TRANSFER.'" data-id="'.$pembayaran->ID_PEMBAYARAN.'">Bukti.png</a>';

            if ($pembayaran->STATUS_PEMBAYARAN == 1) {
            	//add html for action
            	$row[] = '<button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-check"></i> Sudah Dikonfirmasi</button>';
            } else {
            	//add html for action
            	$row[] = '<a class="btn btn-success btn-done btn-sm" onclick="return confirm(\'Are You sure you want to confirm this?\');" title="Konfirmasi" href="'.site_url('Konfirmasi_pembayaran/'.$pembayaran->ID_PEMBAYARAN).'"><i class="mdi mdi-check"></i> Konfirmasi</a>';
            }
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->DaftarPembayaranModel->count_all($kode),
            "recordsFiltered" => $this->DaftarPembayaranModel->count_filtered($kode),
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

	public function invoice()
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
		$this->load->view('eo/invoice');
	}

	public function get_list_invoice()
    {

        $list = $this->DaftarInvoiceModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $no = 1;
        foreach ($list as $invoice) {
            $row = array();
        	$nilai = "Rp " . number_format($invoice->NILAI_INVOICE,2,',','.');
            $row[] = $no++;
            $row[] = $invoice->KODE_EVENTS;
            $row[] = $nilai;
            $row[] = $invoice->NAMA_BANK;
            $row[] = $invoice->NO_REKENING;
            $row[] = $invoice->NAMA_REKENING;
            $row[] = '<a href="'.base_url("assets/pdf_invoice/").$invoice->INVOICE.'" target="_blank">Invoice.pdf</a>';
            $row[] = date('d-m-Y', strtotime($invoice->CREATED_DATE));
            $row[] = '<a class="btn btn-danger btn-sm" onclick="return confirm(\'Are You sure you want to delete this?\');" title="Hapus" href="'.site_url('delete_invoice/'.$invoice->ID_INVOICE).'"><i class="mdi mdi-delete"></i> Hapus</a>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->DaftarInvoiceModel->count_all(),
            "recordsFiltered" => $this->DaftarInvoiceModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

	public function deleteInvoice($id_invoice){
        $query = $this->DashboardModel->DeleteInvoice($id_invoice);

        if($query){
            unlink("assets/pdf_invoice/".$_id->image);
        }
        redirect(site_url('event_organizer/invoice'));
    }

	public function tambah_invoice()
	{
		if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }
	    $var['event'] = $this->DashboardModel->MyEvent();
		$this->load->view('eo/tambah_invoice', $var);
	}

	public function ProsesTambahInvoice()
	{
		$config['upload_path'] = './assets/pdf_invoice/';
	    $config['allowed_types'] = 'pdf';
	    $config['max_size'] = 0;
	    $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('invoice')){
		   	$this->session->set_flashdata('danger', 'Gagal Upload Invoice.');
		    redirect(site_url('event_organizer/add_invoice'),'refresh');
	    }else{
	        $_dataInvoice = array('upload_invoice' => $this->upload->data());
	        $data = array(
				'kode_events' => $this->input->post('kode_events'),
				'nilai_invoice' => preg_replace("/[^0-9]/", "", $this->input->post('nilai_invoice')),
				'nama_bank' => $this->input->post('nama_bank'),
				'nama_rekening' => $this->input->post('nama_rekening'),
				'no_rekening' => $this->input->post('no_rekening'),
				'invoice' => $_dataInvoice['upload_invoice']['file_name'],
	            'created_by' => $this->session->userdata('id_eo'),
	            'created_date' => date('Y-m-d H:i:s')
			);
	        $query = $this->DashboardModel->tambahInvoice($data);
	        if($query == TRUE){
		   		$this->session->set_flashdata('success', 'Berhasil Mengupload Invoice.');
		    	redirect(site_url('event_organizer/invoice'),'refresh');
	        }else{
		   		$this->session->set_flashdata('danger', 'Invoice gagal di Upload.');
		    	redirect(site_url('event_organizer/add_invoice'),'refresh');
	        }
	    }
	}

    public function UpdateProfile()
    {
    	if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }

		$id_eo = $this->input->post('id_eo');
		$update = array(
			'nama_eo' => $this->input->post('nama_eo'),
			'alamat' => $this->input->post('alamat'),
			'nama_cp' => $this->input->post('nama_cp'),
			'nohp' => $this->input->post('nohp'),
			'updated_date' => date('Y-m-d H:i:s')
		);
		
		$query = $this->DashboardModel->update_profile($update, $id_eo);

		if ($this->input->post('profile') == 'update_profile') {
			if ($query) {
		   		$this->session->set_flashdata('success', 'Berhasil Memperbarui Profile.');
		    	redirect(site_url('event_organizer/profile'),'refresh');
			} else {
		   		$this->session->set_flashdata('danger', 'Gagal Memperbarui Profile.');
		    	redirect(site_url('event_organizer/profile'),'refresh');
			}
		}
    }

    public function Konfirmasi_pembayaran($id_pembayaran)
    {
    	if(empty($this->session->userdata('id_eo'))){
		   	$this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
		    redirect(site_url('login'),'refresh');
	    }

    	$bayar = array(
			'status_pembayaran' => 1
		);

    	$daftar = array(
    		'status' => 1
    	);

    	//get email from user participant
    	// $email = $this->DashboardModel->CheckEmail($id_pembayaran);
    	// get id pendaftaran from from pendaftaran
    	$id_pendaftaran = $this->DashboardModel->CheckIdPendaftaran($id_pembayaran);
    	// get kode event from form pendaftaran
    	$kode_event = $this->DashboardModel->CheckKodeEvents($id_pendaftaran);
    	// get kode event from form pendaftaran
    	// $nama_event = $this->DashboardModel->CheckNamaEvents($id_pendaftaran);
    	// get nama peserta from form pendaftaran
    	// $nama = $this->DashboardModel->CheckNama($id_pendaftaran);
        // update pembayaran
        $query = $this->DashboardModel->UpdateDaftar($id_pendaftaran, $daftar);
        if ($query) {
            $this->DashboardModel->UpdateBayar($id_pembayaran, $bayar);$this->session->set_flashdata('success', 'Berhasil Mengirim Konfirmasi kepada peserta.');
            redirect(site_url('event_organizer/pembayaran/'.$kode_event), 'refresh');
        } else {
             $this->session->set_flashdata('danger', 'Gagal Mengirim konfirmasi Peserta.');
            redirect(site_url('event_organizer/pembayaran/'.$kode_event), 'refresh');
        }

		// $config = array();
		// $config['protocol'] = 'smtp';
		// $config['smtp_host'] = 'ssl://smtp.gmail.com';
		// $config['smtp_port'] = '465';
		// $config['smtp_timeout'] = '30';
		// $config['smtp_user'] = 'afifah200074@gmail.com';
		// $config['smtp_pass'] = '25092000';
		// $config['charset'] = 'utf-8';
		// $config['newline'] = "\r\n";
		// $config['mailtype'] = 'html'; // or text
		// $config['validation'] = TRUE; // bool whether to validate email or not  

		// $this->email->initialize($config);

		//konfigurasi pengiriman
		// $this->load->library('PHPMailer');
  //       $this->load->library('SMTP');

  //       $email_admin = 'panitiaid92@gmail.com';
  //       $nama_admin = 'noreply-Panitia';
  //       $password_admin = 'p4n1t141d';

  //       $mail = new PHPMailer();
  //       $mail->isSMTP();  
  //       $mail->SMTPKeepAlive = true;
  //       $mail->Charset  = 'UTF-8';
  //       $mail->IsHTML(true);
  //      	// $mail->SMTPDebug = 1;
  //       $mail->SMTPAuth = true;
  //       $mail->Host = 'smtp.gmail.com'; 
  //       $mail->Port = 587;
  //       $mail->SMTPSecure = 'ssl';
  //       $mail->Username = $email_admin;
  //       $mail->Password = $password_admin;
  //       $mail->Mailer   = 'smtp';
  //       $mail->WordWrap = 100;

		// $mail->setFrom($email_admin);
  //       $mail->FromName = $nama_admin;
  //       $mail->addAddress($email);
  //       $mail->Subject = 'Konfirmasi Pendaftaran Event '.$nama_event;
		// $message = "terima kasih telah mendaftar di event Panitia.ID, silahkan menunjukkan email ini kepada panitia untuk melakukan daftar ulang event.\n\n Nama Event : ". $kode_event ."\n Nama Peserta: ". $nama ." \n\n semoga event ini dapat bermanfaat dan berguna untuk kita semua.\n\n\n Best Regards,\nPanitia.ID";
		// $mail->Body = $message;
		// if ($mail->send()) {
	 //    	// update status pembayaran
	 //    	$this->DashboardModel->UpdateBayar($id_pembayaran, $bayar);
	 //    	// update status pendaftaran
	 //    	$this->DashboardModel->UpdateDaftar($id_pendaftaran, $daftar);
		//    	$this->session->set_flashdata('success', 'Berhasil Mengirim Email kepada peserta.');
		//     redirect(site_url('event_organizer/pembayaran/'.$kode_event), 'refresh');
		//     // echo $this->email->print_debugger();
		// } else {
		//    	$this->session->set_flashdata('success', 'Gagal Mengirim Email ke Peserta.');
		//     redirect(site_url('event_organizer/pembayaran/'.$kode_event), 'refresh');
		//     // echo $this->email->print_debugger();
		// }
    }

    public function User()
    {
        if(empty($this->session->userdata('id_eo'))){
            $this->session->set_flashdata('danger', 'Silahkan Login Dahulu.');
            redirect(site_url('login'),'refresh');
        }
        $this->load->view('eo/peserta');
    }

    public function get_list_user()
    {

        $list = $this->DaftarUserModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $no = 1;
        foreach ($list as $user) {
            $row = array();
            $row[] = $no++;
            $row[] = $user->NAMA;
            $row[] = $user->NOHP;
            $row[] = $user->EMAIL;
            $row[] = $user->PEKERJAAN;
            $row[] = $user->JENIS_KELAMIN;
            $row[] = $user->JUDUL;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->DaftarUserModel->count_all(),
            "recordsFiltered" => $this->DaftarUserModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

}
