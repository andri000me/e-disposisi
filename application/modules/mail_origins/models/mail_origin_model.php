<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_origin_model extends CI_Model {
    
    function grid_data()
    {
        $this->load->library('datatables');
        $this->datatables->select('id, origin_code, origin_name, description')
            ->from('mail_origins')
            ->unset_column('id')
            ->edit_column('origin_code', '<a href="#" onclick="call_modal(\'$1\')">$2</a>', 'id, origin_code');
        return $this->datatables->generate();
    }

	function get_data($id)
	{
		$query = $this->db->get_where('mail_origins', array('id'=>$id));
		return $query->row_array();
	}
    
    function save_data($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('mail_origins', $data);
        }
        else
        {
            $this->db->update('mail_origins', $data, array('id'=>$data['id']));
        }
    }
	
}