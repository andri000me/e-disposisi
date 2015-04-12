<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	function check_data()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		//$this->db->select('nip, name');
		$result = $this->db->get_where('users', array('nip'=>$username, 'password'=>$password));
		if($result->num_rows() > 0)
		{
			$sess_ = array_merge(array('logged_in'=>TRUE), $result->row_array());
			return $sess_;
		}
		else
		{
			return FALSE;
		}
	}
}