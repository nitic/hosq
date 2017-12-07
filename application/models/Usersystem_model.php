<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usersystem_model extends CI_Model
{
	function getByUsername($username)
	{
		$this->db->select("Username, role, RealName");
		$this->db->from('mstUserSystem');
		$this->db->where('Username', $username);
		$data = $this->db->get();
		return $data->result();
	}

}
