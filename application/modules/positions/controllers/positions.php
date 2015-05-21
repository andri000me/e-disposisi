<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Positions extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('position_model');
		if(!$this->session->userdata('logged_in'))
		{
			show_404();
			exit;
		}
	}

	function index()
	{
	    $item['source'] =  site_url('positions/grid_data');
	    $data = array(
			'content' => $this->load->view('content', $item, TRUE),
			'script' => $this->load->view('content_js', '', TRUE)
        );
        $this->load->view('template', $data);
	}
    
    function grid_data()
    {
       echo $this->position_model->grid_data();
    }
	
	function call_form($id)
	{
		if($id != 0)
		{
		    $data = (array) $this->position_model->get_data($id);
		}
		else
		{
			$data = array(
                'id'=>FALSE,
                'pos_code'=>'',
                'pos_name'=>'',
                'description'=>''
            );
		}
		$this->load->view('form', $data);
	}
    
    function submit_form()
    {
        $this->form_validation->set_rules('pos_code', 'kode jabatan', 'required');
        $this->form_validation->set_rules('pos_name', 'nama jabatan', 'required');
        
        if($this->form_validation->run() == FALSE)
        {
            $json = array('status'=>0, 'alert'=>validation_errors());
        }
        else
        {
            $data = array(
                'id'=>$this->input->post('id'),
                'pos_code'=>$this->input->post('pos_code'),
                'pos_name'=>$this->input->post('pos_name'),
                'description'=>$this->input->post('description')
            );
            $this->position_model->save_data($data);
            $json = array('status'=>1, 'alert'=>'fdgfgdfgfd');
        }
        echo json_encode($json);
    }
    
}