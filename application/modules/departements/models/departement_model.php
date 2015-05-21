<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departement_model extends CI_Model {
    
    function grid_data() 
    {
        $this->load->library('datatables');
        $this->datatables->select('A.id, A.dep_code, A.dep_name, B.nip, B.name, A.description')
            ->from('departements A')
            ->join('users B', 'A.id_user = B.id', 'left')
            ->unset_column('A.id')
            ->edit_column('A.dep_code', '<a href="#" onclick="call_modal(\'$1\')">$2</a>', 'A.id, A.dep_code');
        return $this->datatables->generate();
    }

    function get_data($id)
	{
		$query = $this->db->get_where('departements', array('id'=>$id));
		return $query->row_array();
	}
    
    function save_data($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('departements', $data);
        }
        else
        {
            $this->db->update('departements', $data, array('id'=>$data['id']));
        }
    }
    
    function delete_data($id)
    {
        $this->db->delete('departements', array('id', $id));
    }
	
}