<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Therapy_model extends CI_Model
{
  function getById($Opd_Id)
	{
		$this->db->select('traTherapy.fk_therapy_code, mstTherapy.name, traTherapy.Cost, traTherapy.ServiceName, .traTherapy.Time');
  	$this->db->from('traTherapy');
		$this->db->join('mstTherapy', 'mstTherapy.Code = traTherapy.fk_therapy_code');
		$this->db->where('traTherapy.fk_opd =', $Opd_Id);
		$data = $this->db->get();
		return $data->result();
	}

}
