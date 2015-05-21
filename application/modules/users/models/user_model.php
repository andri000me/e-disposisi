<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    
    function grid_data()
    {
        $this->load->library('datatables');
        $this->datatables->select('A.id, A.nip, A.name, A.gender, B.dep_name, C.pos_name, A.id_level, A.phone, A.email, A.status')
            ->from('users A')
            ->join('departements B', 'A.id_dep=B.id')
            ->join('positions C', 'A.id_pos=C.id')
            ->unset_column('A.id')
            ->edit_column('A.nip', '<a href="#" onclick="call_modal(\'$1\')">$2</a>', 'A.id, A.nip');
        return $this->datatables->generate();
    }
    
    function get_data($id)
	{
		$query = $this->db->get_where('users', array('id'=>$id));
		return $query->row_array();
	}

    function opt_dep()
    {
        $result = $this->db->get('departements');
        
        $data[''] = '-- Pilih Departemen --';
        foreach ($result->result_array() as $row)
        {
            $data[$row['id']] = $row['dep_name'];
        }
        return $data;
        
    }
    
    function opt_pos()
    {
        $result = $this->db->get('positions');
        
        $data[''] = '-- Pilih Jabatan --';
        foreach ($result->result_array() as $row)
        {
            $data[$row['id']] = $row['pos_name'];
        }
        return $data;
        
    }
    
    function save_data($data)
    {
        if(!$data['id'])
        {
            $this->db->insert('users', $data);
        }
        else
        {
            $this->db->update('users', $data, array('id'=>$data['id']));
        }
    }	

}