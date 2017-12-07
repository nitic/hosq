<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_model extends CI_Model
{
	function getAll()
	{
		// Active : 1 = ทำงาน , 0 =ไม่ทำงาน
		$this->db->select("pk_id, ISNULL(Title,'') + ISNULL(Firstname,'') + ' ' + ISNULL(Lastname,'') AS DoctorName");
  	$this->db->from('mstDoctorFacilitator');
		$this->db->where('Active', '1');
		$data = $this->db->get();
		return $data->result();
	}

	function getByType($type)
	{
		// type: 0 = แพทย์, 1 = ผู้ช่วย
		$this->db->select("pk_id, ISNULL(Title,'') + ISNULL(Firstname,'') + ' ' + ISNULL(Lastname,'') AS DoctorName");
		$this->db->from('mstDoctorFacilitator');
		$this->db->where('Type', $type);
		$this->db->where('Active', '1');
		$this->db->order_by('ordering');
		$data = $this->db->get();
		return $data->result();
	}


}
