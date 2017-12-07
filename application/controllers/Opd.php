<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Opd extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("opd_model");
		$this->load->model("therapy_model");
		$this->load->model("medicine_model");
		$this->load->helper("date_thai_helper");

		Accesscontrol_helper::is_logged_in();
	}

	function index()
	{
		$data['main_content'] = 'opd_view';

		$this->load->view('layouts/template',$data);
		//$this->load->view('search_patient_view', $data);
	}

	function getOpdByDate($OPD_Date){
		 // $data = $this->opd_model->getByday('2017-09-19');
			$data = $this->opd_model->getByday($OPD_Date);

			//echo "<pre>";
			//print_r($data);
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
	}

	public function modal_detail($opd_id)
	{
		  $data['opd_main'] = $this->opd_model->getById($opd_id);
		  $data['opd_therapy'] = $this->therapy_model->getById($opd_id);
      $data['opd_medicine'] = $this->medicine_model->getById($opd_id);

			$this->load->view('opd_detail_view', $data);
	}


}

?>
