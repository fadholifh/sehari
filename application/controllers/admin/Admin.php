<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('mdash');
				$this->msec->getsec();
	}

	public function index()
	{
    $datas['container'] = "admin/dashboard";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Dashboard";
		$datas['subtitle'] = "Dashboard";
		$datas['tuser'] = $this->mdash->total_user();
		$datas['tuserg'] = $this->mdash->total_userg();
		$datas['tmarket'] = $this->mdash->total_market();
		$datas['tmessage'] = $this->mdash->total_message();
		$datas['tnews'] = $this->mdash->total_news();
		$datas['tpage'] = $this->mdash->total_page();
		$datas['tproducts'] = $this->mdash->total_products();
		$datas['tproductd'] = $this->mdash->total_productd();
		$this->load->view("./admin/template",$datas);
	}
}
