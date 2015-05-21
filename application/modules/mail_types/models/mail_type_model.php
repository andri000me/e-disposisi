<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_type_model extends CI_Model {
    
    function grid_data()
    {
        $this->load->library('datatables');
        $this->datatables->select('id, type_code, type_name, description')
            ->from('mail_types')
            ->unset_column('id')
            ->edit_column('type_code', '<a href="#" onclick="call_modal(\'$1\')">$2</a>', 'id, type_code');
        return $this->datatables->generate();
    }

	function get_data($id)
	{
		$query = $this->db->get_where('mail_types', array('id'=>$id));
		return $query->row_array();
	}
    
    function save_data($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('mail_types', $data);
        }
        else
        {
            $this->db->update('mail_types', $data, array('id'=>$data['id']));
        }
    }
	
}