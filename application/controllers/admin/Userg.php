<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userg extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('muserg');
				$this->msec->getsec();
				if ($this->session->userdata("alevel") != 1) {
					$datas['container'] = "admin/denied";
					$this->load->view("./admin/template",$datas);
				}
	}

	public function index()
	{
		$datas['container'] = "admin/userg/usergs";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Userg";
		$datas['subtitle'] = "Show";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->muserg->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function add()
	{
		$datas['container'] = "admin/userg/userga";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Userg";
		$datas['subtitle'] = "Insert";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->muserg->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function addProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$data=array(
				'name'=>$this->input->post('name'),
				'market'=>$this->mfunction->statue($this->input->post('market')),
				'news'=>$this->mfunction->statue($this->input->post('news')),
				'pages'=>$this->mfunction->statue($this->input->post('pages')),
				'messages'=>$this->mfunction->statue($this->input->post('messages')),
				'product'=>$this->mfunction->statue($this->input->post('product')),
				'user'=>$this->mfunction->statue($this->input->post('user')),
				'level'=>$this->mfunction->statue($this->input->post('userg')),
				'created_at'=>$this->mfunction->now(),
				'updated_at'=>$this->mfunction->now(),
				'status'=>$this->mfunction->statue($this->input->post('status'))
			);
			$data = $this->security->xss_clean($data);
			$this->muserg->save($data);
			$this->mfunction->successAdd();
      redirect('admin/Userg');

		}else {
			$this->mfunction->failedAdd();
      redirect('admin/Userg/add');
		}
	}

	public function ajaxShow()
	{
		$id = intval($_POST['id']);
	  $data = $this->muserg->get_by_id($id);
    echo json_encode($data);
	}

	function update($id)
	{
		$datas['container'] = "admin/userg/usergu";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Userg";
		$datas['subtitle'] = "Update";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->muserg->get_by_id($id);
		$this->load->view("./admin/template",$datas);
	}

	function updateProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$id = $this->input->post('uid');
			$data=array(
				'name'=>$this->input->post('name'),
				'market'=>$this->mfunction->statue($this->input->post('market')),
				'news'=>$this->mfunction->statue($this->input->post('news')),
				'pages'=>$this->mfunction->statue($this->input->post('pages')),
				'messages'=>$this->mfunction->statue($this->input->post('messages')),
				'product'=>$this->mfunction->statue($this->input->post('product')),
				'user'=>$this->mfunction->statue($this->input->post('user')),
				'level'=>$this->mfunction->statue($this->input->post('userg')),
				'updated_at'=>$this->mfunction->now(),
				'status'=>$this->mfunction->statue($this->input->post('status'))
			);
			$data = $this->security->xss_clean($data);
			$this->muserg->update($id,$data);
			$this->mfunction->successUpdate();
      redirect('admin/Userg');

		}else {
			$this->mfunction->failedUpdate();
      redirect('admin/Userg/update/'.$id);
		}
	}

	function delete($id)
	{
		$check = $this->muserg->check($id);
			if ($check>0) {
      	$this->muserg->delete($id);
        $this->mfunction->successDelete();
        redirect('admin/Userg');
      } else {
				$this->mfunction->failedDelete();
        redirect('admin/Userg');
			}
	}

	function setRules() {
		$this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}
