<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apoitment_model extends CI_Model
{
	function getPosts()
	{
		$this->db->select('postId, postText');
  		$this->db->from('traApoitment');
		$this->db->order_by('postId','DESC');
		$data = $this->db->get();
		return $data->result();
	}

	function insert($postData)
	{
	 	$this->db->insert("traApoitment", $postData);
		$insertId = $this->db->insert_id();
		return $insertId;
	}

	function deleteByID($apo_ID)
	{
		$this->db->delete('traApoitment', array('pk_id' => $apo_ID));
	}

	function getByDate($todaydate)
	{
		$this->db->select('pk_id, fk_hn, Aponame, ApoPhone, ApoDate, ApoTime, ApoHour, Doctor_id, Detail');
  	$this->db->from('traApoitment');
		$this->db->where('ApoDate', $todaydate);
		//$this->db->where('Doctor_id', $doctor_id);
		$data = $this->db->get();
		return $data->result();
	}


	function getByDate1($todaydate)
	{
		/*
		$this->db->select('traApoitment.pk_id AS Aid, traApoitment.fk_hn, traApoitment.Aponame, .traApoitment.ApoPhone, traApoitment.ApoDate, traApoitment.ApoTime');
		$this->db->select('mstDoctorFacilitator.pk_id AS Did, mstDoctorFacilitator.Title, mstDoctorFacilitator.Firstname, mstDoctorFacilitator.Lastname, mstDoctorFacilitator.Type');
  	$this->db->from('traApoitment');
		$this->db->join('mstDoctorFacilitator', 'mstDoctorFacilitator.pk_id = traApoitment.Doctor_id');
		$this->db->where('traApoitment.ApoDate', $todaydate);
		//$this->db->where('Doctor_id', $doctor_id);
		$data = $this->db->get();
		return $data->result();
		*/
	}

}
