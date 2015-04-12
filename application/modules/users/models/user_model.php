<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Controller {

	function get_data($id)
	{
		$query = $this->db->get_where('users', array('id'=>$id));
		return $query->row_array();
	}
	
}