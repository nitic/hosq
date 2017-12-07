<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apoitment extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("apoitment_model");
		$this->load->model("doctor_model");
		$this->load->helper("date_thai_helper");

		Accesscontrol_helper::is_logged_in();
	}

	function index($today = null)
	{
		$data['doctor_dropdown'] = $this->doctor_model->getAll();


		$data['date_today'] = (empty($today))? date('Y-m-d') : $today;

		//ข้อมูลตารางแพทย์ผู้ตรวจ
		$data['doctor_table'] = $this->getTimetable(0, $data['date_today']);
		//ข้อมูลตารางผู้ช่วยแพทย์
		$data['service_table'] = $this->getTimetable(1, $data['date_today']);
		//ข้อมูลตารางไม่ระบุแพทย์
		$data['nobody_table'] = $this->getTimetable(999, $data['date_today']);


		$data['main_content'] = 'apoitment_view';
		$this->load->view('layouts/template',$data);
	}

	function add()
	{
	 	if (!empty($this->input->post('show_arti_topic'))) {
				$data = array(
							'fk_hn' => $this->input->post('txtHN'),
							'ApoName' => $this->input->post('show_arti_topic'),
							'ApoPhone' => $this->input->post('txtPhone'),
							'ApoDate' => $this->input->post('ReservedDate'),
							'ApoTime' => $this->input->post('Reservedtime'),
							'ApoHour' => $this->input->post('hour'),
							'Doctor_id' => $this->input->post('doctor_id'),
							'Detail' => $this->input->post('create_name')
					);
					$postId = $this->apoitment_model->insert($data);

					if (!empty($postId)) {
					    redirect(base_url().'apoitment/index/'.$this->input->post('ReservedDate'));
					}
	 	  }
	}

	function delete()
	{
			if (!empty($this->input->post('apo_cancle_id'))) {
				 $id = intval($this->input->post('apo_cancle_id'));
				 $this->apoitment_model->deleteByID($id);
				 redirect(base_url().'apoitment/index/'.$this->input->post('cancle_date'));
 			}

	}

	function getTimetable($type, $date)
	{
			$Apo = $this->apoitment_model->getByDate($date);
			$time_table = array();

			if ($type != 999) { // กรณี type: 0 = แพทย์  , 1 = ผู้ช่วยแพทย์
					$doctor_list = $this->doctor_model->getByType($type);
					foreach ($doctor_list as $item) {
							$time_table[$item->pk_id]['DoctorName'] = $item->DoctorName;
							foreach ($Apo as $value) {
										if ($value->Doctor_id == $item->pk_id) {
											 $time_table[$item->pk_id]['Apo'][$value->pk_id]['Time'] = $value->ApoTime;
											 $time_table[$item->pk_id]['Apo'][$value->pk_id]['HN'] = $value->fk_hn;
											 $time_table[$item->pk_id]['Apo'][$value->pk_id]['PatientName'] = $value->Aponame;
											 $time_table[$item->pk_id]['Apo'][$value->pk_id]['MobilePhone'] = $value->ApoPhone;
											 $time_table[$item->pk_id]['Apo'][$value->pk_id]['Hour'] = $value->ApoHour;
											 $time_table[$item->pk_id]['Apo'][$value->pk_id]['Detail'] = $value->Detail;
										}
						 }
					}
			}
			else { // กรณีไม่ระบุชื่อแพทย์และผู้ช่วย
						$time_table[999]['DoctorName'] = 'ไม่ระบุชื่อแพทย์';
						foreach ($Apo as $value) {
									if ($value->Doctor_id == 0) {
										 $time_table[999]['Apo'][$value->pk_id]['Time'] = $value->ApoTime;
										 $time_table[999]['Apo'][$value->pk_id]['HN'] = $value->fk_hn;
										 $time_table[999]['Apo'][$value->pk_id]['PatientName'] = $value->Aponame;
										 $time_table[999]['Apo'][$value->pk_id]['MobilePhone'] = $value->ApoPhone;
										 $time_table[999]['Apo'][$value->pk_id]['Hour'] = $value->ApoHour;
										 $time_table[999]['Apo'][$value->pk_id]['Detail'] = $value->Detail;
									}
					 }
			}

			return $time_table;

		//$posts = $this->post_model->getPosts();
		//echo json_encode(array('posts'=>$posts));
	}



}

?>
