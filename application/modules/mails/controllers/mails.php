<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mails extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('mail_model');
		if(!$this->session->userdata('logged_in'))
		{
			show_404();
			exit;
		}
	}

	function index()
	{
	    $data = array(
			'content' => $this->load->view('content', '', TRUE),
			'script' => $this->load->view('content_js', '', TRUE)
        );
        $this->load->view('template', $data);
	}
	
	function call_form($id)
	{
		/* if($id != 0)
		{
			
			$this->load->view('form');
		}
		else
		{
			$this->load->view('form');
		} */
		$this->load->view('form');
	}
}