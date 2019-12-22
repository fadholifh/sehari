<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('mpages');
				$this->msec->getsec();
				if ($this->session->userdata("apages") != 1) {
					$datas['container'] = "admin/denied";
					$this->load->view("./admin/template",$datas);
				}
	}

	public function index()
	{
		$datas['container'] = "admin/page/pages";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Pages";
		$datas['subtitle'] = "Show";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mpages->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function add()
	{
		$datas['container'] = "admin/page/pagea";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Pages";
		$datas['subtitle'] = "Insert";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mpages->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function addProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$status = $this->mfunction->statue($this->input->post('status'));
			$data=array(
				'title'=>$this->input->post('title'),
				'content'=>$this->input->post('content'),
				'created_at'=>$this->mfunction->now(),
				'updated_at'=>$this->mfunction->now(),
				'author'=>$this->session->userdata("user_id"),
				'status'=>$status
			);
			$data = $this->security->xss_clean($data);
			$this->mpages->save($data);
			$this->mfunction->successAdd();
      redirect('admin/Pages');

		}else {
			$this->mfunction->failedAdd();
      redirect('admin/Pages/add');
		}
	}

	public function ajaxShow()
	{
		$id = intval($_POST['id']);
	  	$data = $this->mpages->get_by_id($id);
    	echo json_encode($data);
	}

	function update($id)
	{
		$datas['container'] = "admin/page/pageu";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Pages";
		$datas['subtitle'] = "Update";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$check = $this->mpages->check($id);
			if ($check>0) {
				$datas['data'] = $this->mpages->get_by_id($id);
				$this->load->view("./admin/template",$datas);
			} else {
				$this->mfunction->failedUpdate();
				redirect('admin/Pages');
			}
	}

	function updateProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$id = $this->input->post('pid');
			$status = $this->mfunction->statue($this->input->post('status'));
			$data=array(
				'title'=>$this->input->post('title'),
				'content'=>$this->input->post('content'),
				'updated_at'=>$this->mfunction->now(),
				'status'=>$status
			);
			$data = $this->security->xss_clean($data);
			$this->mpages->update($id,$data);
			$this->mfunction->successUpdate();
      		redirect('admin/Pages');

		}else {
			$this->mfunction->failedUpdate();
      		edirect('admin/Pages/update/'.$id);
		}
	}

	function delete($id)
	{
		$check = $this->mpages->check($id);
		if ($check>0) {
			$this->mpages->delete($id);
			$this->mfunction->successDelete();
        	redirect('admin/Pages');
      	} else {
			$this->mfunction->failedDelete();
        	redirect('admin/Pages');
		}
	}

	function setRules() {
		$this->form_validation->set_rules('title','Title','required');
    	$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}
