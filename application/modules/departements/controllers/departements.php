<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departements extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('departement_model');
		if(!$this->session->userdata('logged_in'))
		{
			show_404();
			exit;
		}
	}

	function index()
	{
	    $item['source'] =  site_url('departements/grid_data');
	    $data = array(
			'content' => $this->load->view('content', $item, TRUE),
			'script' => $this->load->view('content_js', '', TRUE)
        );
        $this->load->view('template', $data);
	}
    
    function grid_data()
    {
       echo $this->departement_model->grid_data();
    }
	
	function call_form($id)
	{
	    if($id != 0)
        {
            $data = (array) $this->departement_model->get_data($id);
        }
        else
        {
            $data = array(
                'id'=>FALSE,
                'dep_code'=>'',
                'dep_name'=>'',
                'description'=>''
            );
        }
	    $this->load->view('form', $data);
	}
    
    function submit_form()
    {
        $this->form_validation->set_rules('dep_code', 'kode departemen', 'required');
        $this->form_validation->set_rules('dep_name', 'nama departemen', 'required');
        
        if($this->form_validation->run() == FALSE)
        {
            $json = array('status'=>0, 'alert'=>validation_errors());
        }
        else
        {
            $data = array(
                'id'=>$this->input->post('id'),
                'dep_code'=>$this->input->post('dep_code'),
                'dep_name'=>$this->input->post('dep_name'),
                'id_user'=>$this->input->post('id_user'),
                'description'=>$this->input->post('description')
            );
            $this->departement_model->save_data($data);
            $json = array('status'=>1, 'alert'=>'dssdsdsd');   
        }
        echo json_encode($json);
    }
    
    function delete_data($id)
    {
        $this->departement_model->delete_data($id);        
    }
    
}