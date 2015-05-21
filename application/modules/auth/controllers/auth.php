<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}
	
	function index()
	{
		if(!$this->session->userdata('logged_in'))
		{
			$this->load->view('login');
		}
		else
		{
			redirect('welcome');
		}		
	}
	
	function login()
	{
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('username', 'NIP', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|md5');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('alert', validation_errors());
			redirect('auth');
		}
		else
		{
			$login_data = $this->auth_model->check_data();
			
			if($login_data)
			{
				$this->session->set_userdata($login_data);
				$this->session->set_flashdata('alert', 'Berhasil! Selamat datang '.$this->session->userdata('name').'.');
				redirect('welcome');
			}
			else
			{
				$this->session->set_flashdata('alert', 'Opps! NIP atau password salah.');
				redirect('auth');
			}
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata(logged_in);
		$this->session->set_flashdata('alert', 'Berhasil! Anda telah logout.');
		redirect('auth');
	}
}