<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("patient_model");
		$this->load->model("queue_model");

		Accesscontrol_helper::is_logged_in();
	}


	function getOnePatinetByHN($HN_number)
	{
		$data = $this->patient_model->getByHN($HN_number);
		header('Content-type: application/json');
		echo json_encode($data);
	}

	function search($q){
				$q = iconv("UTF-8", "TIS-620", urldecode($q));
				$data = $this->patient_model->getByKeyword($q);
				if (count($data) > 0) {
					 		foreach ($data as $rows) {
			 				   $id = $rows->pk_HN;
								 $name = $rows->FirstName.' '.$rows->LastName;
								 $name = str_replace("'", "'", $name);
								 $display_name = preg_replace("/(" . urldecode($q) . ")/i", "<b>$1</b>", $name);
		 						 echo "<li onselect=\"this.setText('$name').setValue('$id'); set_hn_results('$id');\">$display_name</li>";
					 		}
				}
	}

	function searchForReserved($q){
				$q = iconv("UTF-8", "TIS-620", urldecode($q));
				$data = $this->patient_model->getByKeyword($q);
				if (count($data) > 0) {
					 		foreach ($data as $rows) {
			 				   $id = $rows->pk_HN;
								 $name = $rows->FirstName.' '.$rows->LastName;
								 $mobilePhone = preg_replace('/\D+/', '', $rows->MobilePhone);
								 $name = str_replace("'", "'", $name);
								 $display_name = preg_replace("/(" . urldecode($q) . ")/i", "<b>$1</b>", $name);
		 						 echo "<li onselect=\"this.setText('$name').setValue('$id'); show_results('$mobilePhone');\">$display_name</li>";
					 		}
				}
	}

}

?>
