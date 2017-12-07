<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Opd_model extends CI_Model
{
	function getPosts()
	{
		$this->db->select('*');
  	$this->db->from('traOPD_main');
		$this->db->order_by('postId','DESC');
		$data = $this->db->get();
		return $data->result();
	}

	function getByday($date_today)
	{
		$this->db->select('traOPD_main.pk_OPD, traOPD_main.fk_HN, traOPD_main.Doctor');
		$this->db->select("(SELECT COUNT(traTherapy.pk_therapy) FROM traTherapy WHERE traTherapy.fk_opd = traOPD_main.pk_OPD) AS Therapy");
		$this->db->select("(SELECT COUNT(traOPD_medicine.pk_id) FROM traOPD_medicine WHERE traOPD_medicine.fk_opd = traOPD_main.pk_OPD) AS Medicine");
		$this->db->select("ISNULL(mstPatient.TitleName,'') + ISNULL(mstPatient.FirstName,'') + ' ' + ISNULL(mstPatient.LastName,'') AS PatientName");
  	$this->db->from('traOPD_main');
		$this->db->join('mstPatient', 'mstPatient.pk_HN = traOPD_main.fk_HN');
		$this->db->where('CONVERT(CHAR(10),traOPD_main.Cure_date,121) =', $date_today);
		$this->db->order_by('traOPD_main.pk_OPD');
		$data = $this->db->get();
		return $data->result();
	}


 function getById($Opd_Id)
	{
		$this->db->select('traOPD_main.pk_OPD, traOPD_main.fk_HN, traOPD_main.Cure_date, traOPD_main.Weight, traOPD_main.Height');
		$this->db->select('traOPD_main.Pressure, traOPD_main.Temperature, traOPD_main.Pulse, traOPD_main.Breathe');
		$this->db->select('traOPD_main.Symptom, traOPD_main.SymptomToday, traOPD_main.DiseaseCode, traOPD_main.DiseaseName, traOPD_main.DiseasePresent, traOPD_main.Doctor');
		$this->db->select("ISNULL(mstPatient.TitleName,'') + ISNULL(mstPatient.FirstName,'') + ' ' + ISNULL(mstPatient.LastName,'') AS PatientName");
  	$this->db->from('traOPD_main');
		$this->db->join('mstPatient', 'mstPatient.pk_HN = traOPD_main.fk_HN');
		$this->db->where('traOPD_main.pk_OPD =', $Opd_Id);
		$data = $this->db->get();
		return $data->result();
	}


}
