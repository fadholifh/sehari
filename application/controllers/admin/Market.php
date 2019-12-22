<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mmarket');
				$this->msec->getsec();
				if ($this->session->userdata("amarket") != 1) {
					$datas['container'] = "admin/denied";
					$this->load->view("./admin/template",$datas);
				}
	}
	public function index()
	{
		$datas['container'] = "admin/market/markets";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Market";
		$datas['subtitle'] = "Show";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mmarket->get_all();
		$this->load->view("./admin/template",$datas);
	}
	function add()
	{
		$datas['container'] = "admin/market/marketa";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Market";
		$datas['subtitle'] = "Insert";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mmarket->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function addProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$status = $this->mfunction->statue($this->input->post('status'));
			if(empty($_FILES['img']['name'])){
				//no image
				$data=array(
					'name'=>$this->input->post('name'),
					'address'=>$this->input->post('address'),
					'img'=>"default/img.png",
					'created_at'=>$this->mfunction->now(),
					'updated_at'=>$this->mfunction->now(),
					'author'=>$this->session->userdata("user_id"),
					'status'=>$status
				);
				$data = $this->security->xss_clean($data);
				$this->mmarket->save($data);
				$this->mfunction->successAdd();
		  		redirect('admin/Market');
	
			}else {
				$newname 						= "market-".$this->mfunction->seo($this->input->post('name'));
				$config['upload_path']          = './assets/images/market/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;
                $config['max_width']            = 1024;
				$config['max_height']           = 768;
				$config['file_name']           	= $newname;

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('img'))
                {
					echo $this->upload->display_errors();
					exit;
                }else{
					$data=array(
						'name'=>$this->input->post('name'),
						'address'=>$this->input->post('address'),
						'img'=>$this->upload->file_name,
						'created_at'=>$this->mfunction->now(),
						'updated_at'=>$this->mfunction->now(),
						'author'=>$this->session->userdata("user_id"),
						'status'=>$status
					);
					$data = $this->security->xss_clean($data);
					$this->mmarket->save($data);
					$this->mfunction->successAdd();
				  	redirect('admin/Market');
				}
			}

		}else{
			$this->mfunction->failedAdd();
			redirect('admin/Market/add');
		}	
	}

	public function ajaxShow()
	{
		$id = intval($_POST['id']);
	  	$data = $this->mmarket->get_by_id($id);
    	echo json_encode($data);
	}

	function update($id)
	{
		$datas['container'] = "admin/market/marketu";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Market";
		$datas['subtitle'] = "Update";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mmarket->get_by_id($id);
		$check = $this->mmarket->check($id);
			if ($check>0) {
				$datas['data'] = $this->mmarket->get_by_id($id);
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
			$id = $this->input->post('mid');
			$status = $this->mfunction->statue($this->input->post('status'));
			if(empty($_FILES['img']['name'])){
				//no image
				$data=array(
					'name'=>$this->input->post('name'),
					'address'=>$this->input->post('address'),
					'updated_at'=>$this->mfunction->now(),
					'status'=>$status
				);
				$data = $this->security->xss_clean($data);
				$this->mmarket->update($id,$data);
				$this->mfunction->successUpdate();
		  		redirect('admin/Market');
	
			}else {
				$newname 						= "market-".$this->mfunction->seo($this->input->post('name'));
				$config['upload_path']          = './assets/images/market/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;
                $config['max_width']            = 1024;
				$config['max_height']           = 768;
				$config['file_name']           	= $newname;

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('img'))
                {
					echo $this->upload->display_errors();
					exit;
                }else{
					$data=array(
						'name'=>$this->input->post('name'),
						'address'=>$this->input->post('address'),
						'img'=>$this->upload->file_name,
						'updated_at'=>$this->mfunction->now(),
						'status'=>$status
					);
					$data = $this->security->xss_clean($data);
					$this->mmarket->update($id,$data);
					$this->mfunction->successUpdate();
				  	redirect('admin/Market');
				}
			}

		}else {
			$this->mfunction->failedUpdate();
      		edirect('admin/Market/update/'.$id);
		}
	}

	function delete($id)
	{
		$check = $this->mmarket->check($id);
		if ($check>0) {
			$show = $this->mmarket->get_by_id($id);
			if ($show->img != "default/img.png" ) {
				unlink('assets/images/market/'.$show->img);
			}
			$this->mmarket->delete($id);
			$this->mfunction->successDelete();
        	redirect('admin/Market');
      	} else {
			$this->mfunction->failedDelete();
        	redirect('admin/Market');
		}
	}

	function setRules() {
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');
    	$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}
