<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Queue extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("queue_model");
		$this->load->model("patient_model");
		$this->load->model("doctor_model");

		Accesscontrol_helper::is_logged_in();
	}


	function index()
	{
		//ดึงข้อมูลแพทย์ แสดงใน dropdown
		$data['doctor_dropdown'] = $this->doctor_model->getByType(0);

		//ดึงข้อมูลผู้ช่วยแพทย์ แสดงใน dropdown
		$data['service_dropdown'] = $this->doctor_model->getAll();


		$data['main_content'] = 'queue_view';
		$this->load->view('layouts/template',$data);
	}

	function getall(){
				$data = $this->queue_model->getToday();
				foreach ($data as $key => $value) {
						 $data[$key]->OPDStatus = count($this->queue_model->checkOpdStatus($value->pk_HN));
				}
				//echo "<pre>";
				//print_r($data);
				header("Content-Type: application/json");
				echo json_encode($data);
				exit;
	}

	function checkYouInQueueToday($HN_Number){
				$data = $this->queue_model->countQueueToday($HN_Number);
				echo count($data);
				exit;
	}

	/**
	 * This function add post into DB
	 */
	function add()
 	{
		//ตรวจสอบตัวเลือกว่าเลือก เวลาปัจจุบัน หรือ เลือกระบุเวลา
 		$queuetime = ($this->input->post('qtime') == 'now')? date('H:i:s') : $this->input->post('qtime');

		//จัดการฟอร์มเมตวันและเวลาให้อยู่ในรูป '20170824 10:30:02'
 		$queue_datetime = date('Ymd', strtotime($this->input->post('qdate')))." ".$queuetime;

 		$data = array(
        'HnNumber' => $this->input->post('HN_Number'),
				'Doctor_name' => $this->input->post('doctor_name'),
        'Service_name' => $this->input->post('service_name'),
 				'CheckInDate' => $queue_datetime
      );

 		 $id = $this->queue_model->addQueue($data);
     $QueueData = $this->queue_model->getById($id);
 		//print_r($this->input->post());

		if ($id > 0) {echo json_encode(array('status' => 'success', 'postData'=>$QueueData[0]));}
		else {echo json_encode(array('status' => 'error'));}

 		//echo json_encode(array('status' => 'success', 'postData'=>$QueueData[0]));
 	}
}

?>
