<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("usersystem_model");
		$this->load->helper('psupassport');
	}

	function index()
	{
		$data['main_content'] = 'login_view';
		$this->load->view('login_view');
	}

	function login1(){
				$data = $this->usersystem_model->getByUsername('niti.c');
				echo "<pre>";
				print_r($data);
	}

	public function login()
	{
		if(!empty($this->input->post())){

		    $ldap = psu_restful_authenticate($this->input->post('login_username'),$this->input->post('login_password'));
				 if($ldap) {
							if($ldap->auth_status === "Authentication OK"){

									$data = $this->usersystem_model->getByUsername($ldap->accountname);

									if (!empty($data)){
											foreach ($data as $value) {
												  $this->session->set_userdata('AccountName', $value->Username);
													$this->session->set_userdata('FullName', $value->RealName);
													$this->session->set_userdata('Role', $value->role);
											}
											  redirect('queue', 'refresh');
								  }
									else{
								    	  redirect('welcome/index/access_denied', 'refresh');
								    }
								}
						}
				else{
						header("Location: ".base_url().'welcome/index/login_error');
						exit();
					}
		}
	}

	public function logout()
	{
		 $this->session->unset_userdata('AccountName');
		 $this->session->unset_userdata('FullName');
		 $this->session->unset_userdata('Role');

     session_destroy();
     redirect('welcome/index', 'refresh');
	}
}

?>
