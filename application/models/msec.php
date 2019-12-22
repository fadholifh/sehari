<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msec extends CI_Model {

	public function getsec()
	{
    $email =  $this->session->userdata('email');
    if(empty($email)){
      $this->session->sess_destroy();
      redirect('login');
    }
	}

	public function salt()
	{
		return '&3h@12i';
	}
}
