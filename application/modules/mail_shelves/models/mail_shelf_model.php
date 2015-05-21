<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_shelf_model extends CI_Model {
    
    function grid_data()
    {
        $this->load->library('datatables');
        $this->datatables->select('id, shelf_code, shelf_name, description')
            ->from('mail_shelves')
            ->unset_column('id')
            ->edit_column('shelf_code', '<a href="#" onclick="call_modal(\'$1\')">$2</a>', 'id, shelf_code');
        return $this->datatables->generate();
    }

	function get_data($id)
	{
		$query = $this->db->get_where('mail_shelves', array('id'=>$id));
		return $query->row_array();
	}
    
    function save_data($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('mail_shelves', $data);
        }
        else
        {
            $this->db->update('mail_shelves', $data, array('id'=>$data['id']));
        }
    }
	
}