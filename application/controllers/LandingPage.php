<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class landingPage extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('LandingPageModel');
        $this->load->model('eo/EventModel');
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
    	$this->load->library('email');
  		$this->load->library('pagination');
    }

	public function index()
	{
	    $data['event'] = $this->EventModel->eventNow();
	    $data['upcoming'] = $this->EventModel->upcoming();
		$this->load->view('index', $data);
	}

	public function event_now()
	{
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
	    if (!$this->session->userdata('id_peserta')) {
			$this->load->view('event_now', $params);
	    } else {
	    	$this->load->view('peserta/event_now', $params);
	    }
	}

	public function upcoming()
	{
		//set params
	    $params = array();
	    //set records per page
	    $limit_page = 16;
	    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
	    $total = $this->EventModel->totalEventsUpcoming();
	    if ($total > 0) 
        {
            // get current page records
            $params['results'] = $this->EventModel->get_current_page_upcoming($limit_page, $page * $limit_page);
             
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
	    if (!$this->session->userdata('id_peserta')) {
		$this->load->view('upcoming', $params);
	    } else {
	    	$this->load->view('peserta/upcoming', $params);
	    }
	}

	// Login Function
	public function login()
	{
		$this->load->view('login');
	}

	public function loginProses()
	{
		$auth = $this->input->post('role');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

        if ($auth == 'eo') {
        	$dataEo = array(
            	'username' => $username,
               	'password' => $password,
 			   	'status' => 1
             );
        	$checkEo = $this->LandingPageModel->checkEo($dataEo);
        	if ($checkEo == FALSE) {
		    	echo "<script>alert('Gagal Melakukan Login, Silahkan Register atau aktifkan akun anda terlebih dahulu.')</script>";
		    	redirect('login', 'refresh');
		    	die();
	        } else {
	        	$user = array(
        			'id_eo' => $checkEo->ID_EO,
	        		'username' => $checkEo->USERNAME,
	        		'nama_eo' => $checkEo->NAMA_EO,
	        		'nama_cp' => $checkEo->NAMA_CP,
	        		'email' => $checkEo->EMAIL
	        	);
	        $this->session->set_userdata($user);
	        redirect(site_url('event_organizer/dashboard'));
	        }
	        

        } elseif($auth == 'peserta') {
        	$data = array(
            	'username' => $username,
               	'password' => $password,
 			   	'status' => 1
             );
        	$checkPeserta = $this->LandingPageModel->checkPeserta($data); 
        	if ($checkPeserta == FALSE) {
        		echo "<script>alert('Gagal Melakukan Login, Silahkan Register atau aktifkan akun anda terlebih dahulu.')</script>";
		    	redirect('login', 'refresh');
		    	die();
        	} else {
        		$user = array(
        			'id_peserta' => $checkPeserta->ID_PESERTA,
        			'username' => $checkPeserta->USERNAME,
        			'nama' => $checkPeserta->NAMA,
        			'email' => $checkPeserta->EMAIL,
	        		'status' => 1
        		);
        	$this->session->set_userdata($user);
        	redirect(site_url('peserta/dashboard') );        
        	}

        }

	}

	// Register Function
	public function register()
	{
		$this->load->view('register');
	}

	public function registerPeserta()
	{
		// parsing data post dari view
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nohp = $this->input->post('nohp');
		$password = md5($this->input->post('password'));

		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_participant.email]');

        $this->form_validation->set_message('is_unique', '%s sudah di gunakan.');
        $this->form_validation->set_message('required', '%s tidak boleh di kosongkan.');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('register');
		} else {
			// memasukkan array
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'nohp' => $nohp,
				'password' => $password,
				'username' => $email,
				'status' => 1,
				'is_deleted' => 0,
			);

			// input data ke database
			$id = $this->LandingPageModel->registerPeserta($data);
			if ($id) {
				echo "<script>alert('Berhasil melakukan registrasi')</script>";
			    redirect('register', 'refresh');
			   	die();
			}
			// $encrypted_id = md5($id);

			// $this->load->library('PHPMailer');
   //          $this->load->library('SMTP');

   //          $email_admin = 'panitiaid92@gmail.com';
   //          $nama_admin = 'noreply-Panitia';
   //          $password_admin = 'p4n1t141d';

   //          $mail = new PHPMailer();
   //          $mail->isSMTP();  
   //          $mail->SMTPKeepAlive = true;
   //          $mail->Charset  = 'UTF-8';
   //          $mail->IsHTML(true);
   //          // $mail->SMTPDebug = 1;
   //          $mail->SMTPAuth = true;
   //          $mail->Host = 'smtp.gmail.com'; 
   //          $mail->Port = 465;
   //          $mail->SMTPSecure = 'ssl';
   //          $mail->Username = $email_admin;
   //          $mail->Password = $password_admin;
   //          $mail->Mailer   = 'smtp';
   //          $mail->WordWrap = 100;       
            
   //          $mail->setFrom($email_admin);
   //          $mail->FromName = $nama_admin;
   //          $mail->addAddress($email);
   //          $mail->Subject          = 'Verifikasi Akun Peserta Panitia.ID '.$nama;
   //          // $mail_data['subject']   = $getmspencakerdata->NamaPencaker;
   //          // $mail_data['induk']     = $getmspencakerdata->NomorIndukPencaker;
   //          // $mail_data['username']  = $getmsuserdata->Username;
   //          // $mail_data['password']  = $getmsuserdata->Password;
   //          // $mail_data['lowongan']  = $lowonganhasil;
   //          $message = "terimakasih telah melakukan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini\n".
		 //      site_url("register/verificationPeserta/$encrypted_id");
   //          $mail->Body = $message;
   //          if ($mail->send()) {
   //             echo "<script>alert('Berhasil melakukan registrasi, silahkan cek email kamu.')</script>";
		 //    	redirect('login', 'refresh');
		 //    	die();
   //         	} else {
   //         	   // echo 'Message could not be sent.';
   //         	   // echo 'Mailer Error: ' . $mail->ErrorInfo;
   //         		echo "<script>alert('Berhasil melakukan registrasi, namun gagal mengirim verifikasi email.')</script>";
		 //    	redirect('register', 'refresh');
		 //   		die();
   //          }

			// //enkripsi id
	  //   	$encrypted_id = md5($id);
		 //    $config = array();
		 //   	$config['protocol'] = 'smtp';
			// $config['smtp_host'] = 'ssl://smtp.gmail.com';
			// $config['smtp_port'] = '465';
			// $config['smtp_timeout'] = '30';
			// $config['smtp_user'] = 'disnaker.depok@gmail.com';
			// $config['smtp_pass'] = '2014umar';
			// $config['charset'] = 'utf-8';
			// $config['newline'] = "\r\n";
			// $config['mailtype'] = 'html'; // or text
			// $config['validation'] = TRUE; // bool whether to validate email or not  

		 //    $this->email->initialize($config);

		 //    //konfigurasi pengiriman
		 //    $this->email->from($config['smtp_user']);
		 //    $this->email->to($email);
		 //    $this->email->subject("Verifikasi Akun Peserta Panitia.ID");
		 //    $this->email->message(
		 //     "terimakasih telah melakukan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini\n".
		 //      site_url("register/verificationPeserta/$encrypted_id")
		 //    );

		 //    if ($this->email->send()) {
		 //    	echo "<script>alert('Berhasil melakukan registrasi, silahkan cek email kamu.')</script>";
		 //    	redirect('login', 'refresh');
		 //    	die();
		 //    	// echo $this->email->print_debugger();
		 //    } else {
		 //    	echo "<script>alert('Berhasil melakukan registrasi, namun gagal mengirim verifikasi email.')</script>";
		 //    	redirect('register', 'refresh');
		 //    	die();
		 //    	// echo $this->email->print_debugger();
		 //    }
		}
	}

	public function registerEo()
	{
		// parsing data post dari view
		$nama_cp = $this->input->post('nama_cp');
		$nama_eo = $this->input->post('nama_eo');
		$email = $this->input->post('email');
		$nohp = $this->input->post('nohp');
		$alamat = $this->input->post('alamat');
		$password = md5($this->input->post('password'));

		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_participant.email]');

        $this->form_validation->set_message('is_unique', '%s sudah di gunakan.');
        $this->form_validation->set_message('required', '%s tidak boleh di kosongkan.');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('register');
		} else {
			// memasukkan array
			$data = array(
				'nama_eo' => $nama_eo,
				'nama_cp' => $nama_cp,
				'email' => $email,
				'nohp' => $nohp,
				'alamat' => $alamat,
				'password' => $password,
				'username' => $email,
				'status' => 1,
				'is_deleted' => 0,
			);

			// input data ke database
			$id = $this->LandingPageModel->registerEo($data);
			if ($id) {
				echo "<script>alert('Berhasil melakukan registrasi')</script>";
			    redirect('register', 'refresh');
			   	die();
			}
			// $encrypted_id = md5($id);

			// $this->load->library('PHPMailer');
   //          $this->load->library('SMTP');

   //          $email_admin = 'panitiaid92@gmail.com';
   //          $nama_admin = 'noreply-Panitia';
   //          $password_admin = 'p4n1t141d';

   //          $mail = new PHPMailer();
   //          $mail->isSMTP();  
   //          $mail->SMTPKeepAlive = true;
   //          $mail->Charset  = 'UTF-8';
   //          $mail->IsHTML(true);
   //          // $mail->SMTPDebug = 1;
   //          $mail->SMTPAuth = true;
   //          $mail->Host = 'smtp.gmail.com'; 
   //          $mail->Port = 465;
   //          $mail->SMTPSecure = 'ssl';
   //          $mail->Username = $email_admin;
   //          $mail->Password = $password_admin;
   //          $mail->Mailer   = 'smtp';
   //          $mail->WordWrap = 100;       
            
   //          $mail->setFrom($email_admin);
   //          $mail->FromName = $nama_admin;
   //          $mail->addAddress($email);
   //          $mail->Subject          = 'Verifikasi Akun EO Panitia.ID '.$nama_eo;
   //          // $mail_data['subject']   = $getmspencakerdata->NamaPencaker;
   //          // $mail_data['induk']     = $getmspencakerdata->NomorIndukPencaker;
   //          // $mail_data['username']  = $getmsuserdata->Username;
   //          // $mail_data['password']  = $getmsuserdata->Password;
   //          // $mail_data['lowongan']  = $lowonganhasil;
   //          $message = "terimakasih telah melakukan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini\n".
		 //      site_url("register/verificationEo/$encrypted_id");
   //          $mail->Body = $message;
   //          if ($mail->send()) {
   //             echo "<script>alert('Berhasil melakukan registrasi, silahkan cek email kamu.')</script>";
		 //    	redirect('login', 'refresh');
		 //    	die();
   //         	} else {
   //         	   // echo 'Message could not be sent.';
   //         	   // echo 'Mailer Error: ' . $mail->ErrorInfo;
   //         	   echo "<script>alert('Berhasil melakukan registrasi, namun gagal mengirim verifikasi email.')</script>";
		 //    	redirect('register', 'refresh');
		 //    	die();
   //          }

			// //enkripsi id
	  //   	$encrypted_id = md5($id);
		 //    $config = array();
		 //  	$config['protocol'] = 'smtp';
			// $config['smtp_host'] = 'ssl://smtp.gmail.com';
			// $config['smtp_port'] = '465';
			// $config['smtp_timeout'] = '30';
			// $config['smtp_user'] = 'disnaker.depok@gmail.com';
			// $config['smtp_pass'] = '2014umar';
			// $config['charset'] = 'utf-8';
			// $config['newline'] = "\r\n";
			// $config['mailtype'] = 'html'; // or text
			// $config['validation'] = TRUE; // bool whether to validate email or not  

		 //    $this->email->initialize($config);

		 //    //konfigurasi pengiriman
		 //    $this->email->from($config['smtp_user']);
		 //    $this->email->to($email);
		 //    $this->email->subject("Verifikasi Akun EO Panitia.ID");
		 //    $this->email->message(
		 //     "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini\n".
		 //      site_url("register/verificationEo/$encrypted_id")
		 //    );

		 //    if ($this->email->send()) {
		 //    	echo "<script>alert('Berhasil melakukan registrasi, silahkan cek email kamu.')</script>";
		 //    	redirect('login', 'refresh');
		 //    	die();
		 //    	// echo $this->email->print_debugger();
		 //    } else {
		 //    	echo "<script>alert('Berhasil melakukan registrasi, namun gagal mengirim verifikasi email.')</script>";
		 //    	redirect('register', 'refresh');
		 //    	die();
		 //    	// echo $this->email->print_debugger();
		 //    }
		}
	}

	public function verificationPeserta($key)
	{
		$this->LandingPageModel->changeActiveStatePeserta($key);
		echo "<script>alert('Selamat kamu telah memverifikasi akun kamu.')</script>";
		redirect('login', 'refresh');
		die();
	}

	public function verificationEo($key)
	{
		$this->LandingPageModel->changeActiveStateEo($key);
		echo "<script>alert('Selamat kamu telah memverifikasi akun kamu.')</script>";
		redirect('login', 'refresh');
		die();
	}

	public function logoutPeserta()
	{
        $this->session->unset_userdata('id_peserta');
        redirect('login','refresh');
	}

	public function logoutEo()
	{
        $this->session->unset_userdata('id_eo');
        redirect('login','refresh');
	}

	public function UpdatePassword()
	{
		if ($this->input->post('pass') == 'peserta') {
			if (empty($this->session->userdata('id_peserta'))) {
				echo "<script>alert('Gagal Melakukan Login, Silahkan Register atau aktifkan akun anda terlebih dahulu.')</script>";
			    redirect('login', 'refresh');
			    die();
			}

			$pw_lama = md5($this->input->post('pw_lama'));

			$id = $this->input->post('id_peserta');

			$data = array(
				'password' => md5($this->input->post('pw_baru')),
			); 

			$checkPw = $this->LandingPageModel->CheckPw($pw_lama, $id);
			if ($checkPw) {
				$updatePw = $this->LandingPageModel->UpdatePw($data, $id_peserta);
				echo "<script>alert('Password anda telah diperbarui.')</script>";
				redirect('peserta/profile', 'refresh');
			    die();
			} else {
				echo "<script>alert('Password Lama yang anda masukkan salah.')</script>";
			    redirect('peserta/profile', 'refresh');
			    die();
			}
		} else {
			if (empty($this->session->userdata('id_eo'))) {
				echo "<script>alert('Gagal Melakukan Login, Silahkan Register atau aktifkan akun anda terlebih dahulu.')</script>";
			    redirect('login', 'refresh');
			    die();
			} 

			$pw_lama = md5($this->input->post('pw_lama'));

			$id = $this->input->post('id_eo');

			$data = array(
				'password' => md5($this->input->post('pw_baru')),
			); 

			$checkPw = $this->LandingPageModel->CheckPw($pw_lama, $id);
			if ($checkPw) {
				$updatePw = $this->LandingPageModel->UpdatePw($data, $id);
				echo "<script>alert('Password anda telah diperbarui.')</script>";
				redirect('event_organizer/profile', 'refresh');
			    die();
			} else {
				echo "<script>alert('Password Lama yang anda masukkan salah.')</script>";
			    redirect('event_organizer/profile', 'refresh');
			    die();
			}
		}
	}
}
