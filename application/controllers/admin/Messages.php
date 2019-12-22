<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('mmessages');
				$this->msec->getsec();
				if ($this->session->userdata("amessages") != 1) {
					$datas['container'] = "admin/denied";
					$this->load->view("./admin/template",$datas);
				}
	}

	public function index()
	{
		$datas['container'] = "admin/message/messages";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Messages";
		$datas['subtitle'] = "Show";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mmessages->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function add()
	{
		$datas['container'] = "admin/message/messagea";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Messages";
		$datas['subtitle'] = "Insert";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$this->load->view("./admin/template",$datas);
	}

	function addProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$status = $this->mfunction->statue($this->input->post('status'));
			$data=array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'phone'=>$this->input->post('phone'),
				'content'=>$this->input->post('content'),
				'created_at'=>$this->mfunction->now(),
				'status'=>$status
			);
			$data = $this->security->xss_clean($data);
			$this->mmessages->save($data);
			$this->mfunction->successAdd();
      redirect('admin/Messages');

		}else {
			$this->mfunction->failedAdd();
      redirect('admin/Messages/add');
		}
	}

	public function ajaxShow()
	{
		$id = intval($_POST['id']);
		$data=array(
			'status'=>0
		);
		$this->mmessages->update($id,$data);
	  $data = $this->mmessages->get_by_id($id);
    echo json_encode($data);
	}

	function update($id)
	{
		$datas['container'] = "admin/message/messageu";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Messages";
		$datas['subtitle'] = "Update";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$check = $this->mmessages->check($id);
			if ($check>0) {
				$datas['data'] = $this->mmessages->get_by_id($id);
				$this->load->view("./admin/template",$datas);
      } else {
				$this->mfunction->failedUpdate();
        redirect('admin/Messages');
			}
	}

	function updateProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$id = $this->input->post('mid');
			$status = $this->mfunction->statue($this->input->post('status'));
			$data=array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'phone'=>$this->input->post('phone'),
				'content'=>$this->input->post('content'),
				'status'=>$status
			);
			$data = $this->security->xss_clean($data);
			$this->mmessages->update($id,$data);
			$this->mfunction->successUpdate();
      redirect('admin/Messages');

		}else {
			$this->mfunction->failedUpdate();
      redirect('admin/Messages/update/'.$id);
		}
	}

	function delete($id)
	{
		$check = $this->mmessages->check($id);
			if ($check>0) {
      	$this->mmessages->delete($id);
        $this->mfunction->successDelete();
        redirect('admin/Messages');
      } else {
				$this->mfunction->failedDelete();
        redirect('admin/Messages');
			}
	}

	function setRules() {
		$this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('phone','Phone','required|max_length[15]');
    $this->form_validation->set_rules('content','Content','required');
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}

}
