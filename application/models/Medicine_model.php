<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine_model extends CI_Model
{
  function getById($Opd_Id)
	{
    $this->db->select('mstMedicine.MedCode, mstMedicine.MedName');
    $this->db->select('traOPD_medicine.Amount, traMedicineStore.Unit,traOPD_medicine.TotalPrice, traOPD_medicine.MethodCode');
  	$this->db->from('traOPD_medicine');
		$this->db->join('traMedicineStore', 'traMedicineStore.pk_id = traOPD_medicine.MedicineStoreID');
    $this->db->join('mstMedicine', 'mstMedicine.MedCode = traMedicineStore.fk_MedCode');
		$this->db->where('traOPD_medicine.fk_opd =', $Opd_Id);
		$data = $this->db->get();
		return $data->result();
	}

}
