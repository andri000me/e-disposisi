<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('logged_in'))
		{
			show_404();
			exit;
		}
	}

	function index()
	{
	    $data = array(
            'content' => $this->load->view('content', '', TRUE)
        );
        $this->load->view('template', $data);
	}
}