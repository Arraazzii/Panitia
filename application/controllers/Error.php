<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Error extends CI_Controller
{

	public function PageNotFound()
	{
		$this->load->view('errors/html/error_404');
	}
}