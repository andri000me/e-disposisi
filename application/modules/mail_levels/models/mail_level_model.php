<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_level_model extends CI_Model {
    
    function grid_data()
    {
        $this->load->library('datatables');
        $this->datatables->select('id, level_code, level_name, description')
            ->from('mail_levels')
            ->unset_column('id')
            ->edit_column('level_code', '<a href="#" onclick="call_modal(\'$1\')">$2</a>', 'id, level_code');
        return $this->datatables->generate();
    }

	function get_data($id)
	{
		$query = $this->db->get_where('mail_levels', array('id'=>$id));
		return $query->row_array();
	}
    
    function save_data($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('mail_levels', $data);
        }
        else
        {
            $this->db->update('mail_levels', $data, array('id'=>$data['id']));
        }
    }
	
}