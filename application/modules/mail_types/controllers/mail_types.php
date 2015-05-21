<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_types extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('mail_type_model');
		if(!$this->session->userdata('logged_in'))
		{
			show_404();
			exit;
		}
	}

	function index()
	{
	    $item['source'] =  site_url('mail_types/grid_data');
	    $data = array(
			'content' => $this->load->view('content', $item, TRUE),
			'script' => $this->load->view('content_js', '', TRUE)
        );
        $this->load->view('template', $data);
	}
    
    function grid_data()
    {
       echo $this->mail_type_model->grid_data();
    }
	
	function call_form($id)
	{
		if($id != 0)
		{
		    $data = (array) $this->mail_type_model->get_data($id);
		}
		else
		{
			$data = array(
                'id'=>FALSE,
                'type_code'=>'',
                'type_name'=>'',
                'description'=>''
            );
		}
		$this->load->view('form', $data);
	}
    
    function submit_form()
    {
        $this->form_validation->set_rules('type_code', 'kode jenis', 'required');
        $this->form_validation->set_rules('type_name', 'nama jenis', 'required');
        
        if($this->form_validation->run() == FALSE)
        {
            $json = array('status'=>0, 'alert'=>validation_errors());
        }
        else
        {
            $data = array(
                'id'=>$this->input->post('id'),
                'type_code'=>$this->input->post('type_code'),
                'type_name'=>$this->input->post('type_name'),
                'description'=>$this->input->post('description')
            );
            $this->mail_type_model->save_data($data);
            $json = array('status'=>1, 'alert'=>'fdgfgdfgfd');
        }
        echo json_encode($json);
    }
    
}