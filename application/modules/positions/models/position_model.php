<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Position_model extends CI_Model {
    
    function grid_data()
    {
        $this->load->library('datatables');
        $this->datatables->select('id, pos_code, pos_name, description')
            ->from('positions')
            ->unset_column('id')
            ->edit_column('pos_code', '<a href="#" onclick="call_modal(\'$1\')">$2</a>', 'id, pos_code');
        return $this->datatables->generate();
    }

	function get_data($id)
	{
		$query = $this->db->get_where('positions', array('id'=>$id));
		return $query->row_array();
	}
    
    function save_data($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('positions', $data);
        }
        else
        {
            $this->db->update('positions', $data, array('id'=>$data['id']));
        }
    }
	
}