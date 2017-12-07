<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Queue_model extends CI_Model
{
	function getAll()
	{
		$this->db->select('*');
  	$this->db->from('traQueue2');
		$data = $this->db->get();
		return $data->result();
	}

	function addQueue($data)
	{
	 	$this->db->insert("traQueue2", $data);
		$insertId = $this->db->insert_id();
		return $insertId;
	}

	// ตรวตสอบคิวตามวัน (ไม่ได้ใช้)
	function getByday($date_today)
	{
		$this->db->select('traQueue2.Qid, CONVERT(VARCHAR(8),traQueue2.CheckInDate,108) AS CheckInTime');
		$this->db->select('mstPatient.pk_HN, mstDoctorFacilitator.pk_id AS doctor_id');
		$this->db->select("(SELECT traOPD_main.pk_OPD FROM traOPD_main WHERE traOPD_main.fk_HN = mstPatient.pk_HN AND CONVERT(CHAR(10),traOPD_main.Cure_date,121) = '".$date_today."') AS OPDStatus");
		$this->db->select("ISNULL(mstPatient.TitleName,'') + ' ' + ISNULL(mstPatient.FirstName,'') + ' ' + ISNULL(mstPatient.LastName,'') AS PatientName");
		$this->db->select("ISNULL(mstDoctorFacilitator.Firstname,'ไม่ระบุ') + ' ' + ISNULL(mstDoctorFacilitator.Lastname,'') AS DoctorName");
  	$this->db->from('traQueue2');
		$this->db->join('mstPatient', 'mstPatient.pk_HN = traQueue2.HnNumber');
		$this->db->join('mstDoctorFacilitator', 'mstDoctorFacilitator.pk_id = traQueue2.Service_id','left outer');
		$this->db->where('CONVERT(CHAR(10),traQueue2.CheckInDate,121) =', $date_today);
		$this->db->order_by('traQueue2.CheckInDate','ASC');
		$data = $this->db->get();
		return $data->result();
	}

	function getToday()
	{
		$this->db->select('traQueue2.Qid, CONVERT(VARCHAR(8),traQueue2.CheckInDate,108) AS CheckInTime');
		$this->db->select('mstPatient.pk_HN, traQueue2.Doctor_name, traQueue2.Service_name');
		$this->db->select("ISNULL(mstPatient.TitleName,'') + ' ' + ISNULL(mstPatient.FirstName,'') + ' ' + ISNULL(mstPatient.LastName,'') AS PatientName");
  	$this->db->from('traQueue2');
		$this->db->join('mstPatient', 'mstPatient.pk_HN = traQueue2.HnNumber');
		$this->db->where('CONVERT(CHAR(10),traQueue2.CheckInDate,121) = CAST(CURRENT_TIMESTAMP AS DATE)');
		$this->db->order_by('traQueue2.CheckInDate','ASC');
		$data = $this->db->get();
		return $data->result();
	}

	//ตรวจสอบจำนวนครั้งในการส่งเข้าคิว ป้องกันส่งคิวซำ้
	function countQueueToday($HnNumber){
		$this->db->select("traQueue2.Qid");
		$this->db->from('traQueue2');
		$this->db->where('CONVERT(CHAR(10),traQueue2.CheckInDate,121) = CAST(CURRENT_TIMESTAMP AS DATE)');
		$this->db->where('traQueue2.HnNumber =', $HnNumber);
		$data = $this->db->get();
		return $data->result();
	}

	//ตรวจสอบสถานะ OPD ว่าตรวจเสร็จหรือไม่
	function checkOpdStatus($HnNumber){
		$this->db->select("traOPD_main.pk_OPD");
		$this->db->from('traOPD_main');
		$this->db->where('CONVERT(CHAR(10),traOPD_main.Cure_date,121) = CAST(CURRENT_TIMESTAMP AS DATE)');
		$this->db->where('traOPD_main.fk_HN =', $HnNumber);
		$data = $this->db->get();
		return $data->result();
	}

  // สำหรับ websocket (ส่งข้อมูลแต่ไม่่ได้ใช้)
	function getByID($q_id)
	{
		$this->db->select('traQueue2.Qid, traQueue2.HnNumber, traQueue2.CheckInDate, ');
  	$this->db->from('traQueue2');
		$this->db->where('traQueue2.Qid', $q_id);
		$data = $this->db->get();
		return $data->result();
	}

}
