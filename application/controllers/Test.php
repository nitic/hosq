<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("doctor_model");
		$this->load->model("queue_model");
		$this->load->model("patient_model");
	}

	function index()
	{
		$data['main_content'] = 'login_view';

		//$this->load->view('layouts/template',$data);
		$this->load->view('login_view');
	}

	function get($q){
				$q = iconv("UTF-8", "TIS-620", urldecode($q));
				$data = $this->patient_model->getByKeyword($q);
				if (count($data) > 0) {
					 		foreach ($data as $rows) {
			 				   $id = $rows->pk_HN;
								 $name = $rows->FirstName.' '.$rows->LastName;
								 $name = str_replace("'", "'", $name);
								 $display_name = preg_replace("/(" . urldecode($q) . ")/i", "<b>$1</b>", $name);
		 						 echo "<li onselect=\"this.setText('$name').setValue('$id');\">$display_name</li>";
					 		}
				}
	}
}

?>
