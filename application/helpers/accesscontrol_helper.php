<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accesscontrol_helper{
  public static function is_logged_in()
    {
	    $CI =& get_instance();
	    $is_logged_in = $CI->session->userdata('AccountName');
	       if(!isset($is_logged_in) || $is_logged_in != true)
	       {
	          redirect('welcome/index', 'refresh');
	       }
    }
 }
