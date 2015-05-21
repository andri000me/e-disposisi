<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('user_model');
		if(!$this->session->userdata('logged_in'))
		{
			show_404();
			exit;
		}
	}

    function index()
    {
        $item['source'] =  site_url('users/grid_data');
        $data = array(
            'content' => $this->load->view('content', $item, TRUE),
            'script' => $this->load->view('content_js', '', TRUE)
        );
        $this->load->view('template', $data);
    }
    
    function grid_data()
    {
        echo $this->user_model->grid_data();
    }
	
	function call_form($id)
	{
		if($id != 0)
		{
			$data = (array) $this->user_model->get_data($id);
		}
		else
		{
            $data = array(
                'id'=>FALSE,
                'nip'=>'',
                'name'=>'',
                'id_dep'=>'',
                'id_pos'=>'',
                'gender'=>'',
                'phone'=>'',
                'email'=>'',
                'id_level'=>'',
                'password'=>'',
                'status'=>1
            );
		}
        $data['opt_dep'] = $this->user_model->opt_dep();
        $data['opt_pos'] = $this->user_model->opt_pos();
		$this->load->view('form', $data);
	}
    
    function submit_form()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('name', 'nama pegawai', 'required');
        
        if($this->form_validation->run() == FALSE)
        {
            $json = array('status'=>0, 'alert'=>validation_errors());
        }
        else
        {
            $data = array(
                'id'=>$this->input->post('id'),
                'nip'=>$this->input->post('nip'),
                'name'=>$this->input->post('name'),
                'id_dep'=>$this->input->post('id_dep'),
                'id_pos'=>$this->input->post('id_pos'),
                'gender'=>$this->input->post('gender'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'id_level'=>$this->input->post('id_level'),
                'password'=>$this->input->post('password'),
                'status'=>$this->input->post('status'),
            );
            $this->user_model->save_data($data);
            $json = array('status'=>1, 'alert'=>'fdgfgdfgfd');
        }
        echo json_encode($json);
    }

}