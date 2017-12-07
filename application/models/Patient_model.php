<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model
{
	function getAll()
	{
		$this->db->select('*');
  	$this->db->from('mstPatient');
		$data = $this->db->get();
		return $data->result();
	}

	function getByHN($HN_number)
	{
		$this->db->select('pk_HN, TitleName, FirstName, LastName, MobilePhone');
  	$this->db->from('mstPatient');
		$this->db->where('pk_HN', $HN_number);
		$data = $this->db->get();
		return $data->result();
	}

	function getByKeyword($q)
	{
		$q = urldecode($q);
		$this->db->select('pk_HN, TitleName, FirstName, LastName, MobilePhone');
  	$this->db->from('mstPatient');
		$this->db->where("FirstName LIKE N'".$q."%'");
		$this->db->order_by('FirstName');
		$this->db->limit(50);

		$data = $this->db->get();
		return $data->result();
	}



}
