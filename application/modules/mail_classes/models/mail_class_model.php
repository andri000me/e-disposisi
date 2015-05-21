<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_class_model extends CI_Model {
    
    function grid_data()
    {
        $this->load->library('datatables');
        $this->datatables->select('id, class_code, class_name, description')
            ->from('mail_classes')
            ->unset_column('id')
            ->edit_column('class_code', '<a href="#" onclick="call_modal(\'$1\')">$2</a>', 'id, class_code');
        return $this->datatables->generate();
    }

	function get_data($id)
	{
		$query = $this->db->get_where('mail_classes', array('id'=>$id));
		return $query->row_array();
	}
    
    function save_data($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('mail_classes', $data);
        }
        else
        {
            $this->db->update('mail_classes', $data, array('id'=>$data['id']));
        }
    }
    
    function delete_data($id)
    {
        $this->db->delete('mail_classes', array('id', $id));
    }
	
}