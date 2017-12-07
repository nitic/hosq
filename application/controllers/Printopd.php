<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Printopd extends CI_Controller {

	function __construct() {
		parent::__construct();
		//$this->load->model("doctor_model");
		//$this->load->model("queue_model");
		//$this->load->model("patient_model");
		$this->load->library("mpdf");
	}

	function index()
	{
		$html = 'test';
		$this->mpdf = new mPDF('utf-8', 'A4');
    $this->mpdf->SetAutoFont();

    $this->mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

    $this->mpdf->defaultheaderfontsize = 8;	// in pts
    $this->mpdf->defaultheaderfontstyle = '';	// blank, B, I, or BI
    $this->mpdf->defaultheaderline = 1; 	// 1 to include line below header/above footer

    $this->mpdf->defaultfooterfontsize = 8;	// in pts
    $this->mpdf->defaultfooterfontstyle = '';	// blank, B, I, or BI
    $this->mpdf->defaultfooterline = 1; 	// 1 to include line below header/above footer


    $this->mpdf->SetHeader('{DATE j-m-Y}|{PAGENO}/{nb}| FMIS Report');
    $this->mpdf->SetFooter('{PAGENO}');	// defines footer for Odd and Even Pages - placed at Outer margin

    $this->mpdf->WriteHTML($html);
		$this->mpdf->Output();
	}
}

?>
