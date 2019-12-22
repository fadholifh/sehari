<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mnews');
				$this->msec->getsec();
				if ($this->session->userdata("anews") != 1) {
					$datas['container'] = "admin/denied";
					$this->load->view("./admin/template",$datas);
				}
	}
	public function index()
	{
		$datas['container'] = "admin/news/newss";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "News";
		$datas['subtitle'] = "Show";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mnews->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function add()
	{
		$datas['container'] = "admin/news/newsa";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "News";
		$datas['subtitle'] = "Insert";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mnews->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function addProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$status = $this->mfunction->statue($this->input->post('status'));
			if(empty($_FILES['img']['name'])){
				$data=array(
					'title'=>$this->input->post('title'),
					'content'=>$this->input->post('content'),
					'img'=>"default/img.png",
					'created_at'=>$this->mfunction->now(),
					'updated_at'=>$this->mfunction->now(),
					'author'=>$this->session->userdata("user_id"),
					'status'=>$status
				);
				$data = $this->security->xss_clean($data);
				$this->mnews->save($data);
				$this->mfunction->successAdd();
	      		redirect('admin/News');
	      	}else{
	      		$newname 						= "news-".$this->mfunction->seo($this->input->post('title'));
	      		$config['file_name']           	= $newname;
	      		$config['upload_path']          = './assets/images/news/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;
                $config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('img'))
                {
					echo $this->upload->display_errors();
					exit;
                }else{
					$data=array(
						'title'=>$this->input->post('title'),
						'content'=>$this->input->post('content'),
						'img'=>$this->upload->file_name,
						'created_at'=>$this->mfunction->now(),
						'updated_at'=>$this->mfunction->now(),
						'author'=>$this->session->userdata("user_id"),
						'status'=>$status
					);
					$data = $this->security->xss_clean($data);
					$this->mnews->save($data);
					$this->mfunction->successAdd();
				  	redirect('admin/News');
				}
	      	}

		}else {
			$this->mfunction->failedAdd();
      		redirect('admin/News/add');
		}
	}

	public function ajaxShow()
	{
		$id = intval($_POST['id']);
	  	$data = $this->mnews->get_by_id($id);
    	echo json_encode($data);
	}

	function update($id)
	{
		$datas['container'] = "admin/news/newsu";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "News";
		$datas['subtitle'] = "Update";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$check = $this->mnews->check($id);
			if ($check>0) {
				$datas['data'] = $this->mnews->get_by_id($id);
				$this->load->view("./admin/template",$datas);
			} else {
				$this->mfunction->failedUpdate();
				redirect('admin/News');
			}
	}

	function updateProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$id = $this->input->post('nid');
			$status = $this->mfunction->statue($this->input->post('status'));
			if(empty($_FILES['img']['name'])){
				$data=array(
					'title'=>$this->input->post('title'),
					'content'=>$this->input->post('content'),
					'updated_at'=>$this->mfunction->now(),
					'status'=>$status
				);
				$data = $this->security->xss_clean($data);
				$this->mnews->update($id,$data);
				$this->mfunction->successUpdate();
	      		redirect('admin/News');
	      	}else{
	      		$newname 						= "news-".$this->mfunction->seo($this->input->post('title'));
	      		$config['file_name']           	= $newname;
	      		$config['upload_path']          = './assets/images/news/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;
                $config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('img'))
                {
					echo $this->upload->display_errors();
					exit;
                }else{
					$data=array(
						'title'=>$this->input->post('title'),
						'content'=>$this->input->post('content'),
						'img'=>$this->upload->file_name,
						'updated_at'=>$this->mfunction->now(),
						'status'=>$status
					);
					$data = $this->security->xss_clean($data);
					$this->mnews->update($id,$data);
					$this->mfunction->successUpdate();
				  	redirect('admin/News');
				}
	      	}

		}else {
			$this->mfunction->failedUpdate();
      		edirect('admin/News/update/'.$id);
		}
	}

	function delete($id)
	{
		$check = $this->mnews->check($id);
		if ($check>0) {
			$show = $this->mnews->get_by_id($id);
			if ($show->img != "default/img.png" ) {
				unlink('assets/images/news/'.$show->img);
			}
			$this->mnews->delete($id);
			$this->mfunction->successDelete();
        	redirect('admin/News');
      	} else {
			$this->mfunction->failedDelete();
        	redirect('admin/News');
		}
	}

	function setRules() {
		$this->form_validation->set_rules('title','Title','required');
    	$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}
