<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('mproducts');
				$this->msec->getsec();
				if ($this->session->userdata("aproduct") != 1) {
					$datas['container'] = "admin/denied";
					$this->load->view("./admin/template",$datas);
				}
	}

	public function index()
	{
		$datas['container'] = "admin/products/Productss";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Products";
		$datas['subtitle'] = "Show";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mproducts->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function add()
	{
		$datas['container'] = "admin/products/productsa";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Products";
		$datas['subtitle'] = "Insert";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->mproducts->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function addProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$status = $this->mfunction->statue($this->input->post('status'));
			if(empty($_FILES['img']['name'])){
				$data=array(
					'name'=>$this->input->post('name'),
					'unit'=>$this->input->post('unit'),
					'img'=>"default/img.png",
					'created_at'=>$this->mfunction->now(),
					'updated_at'=>$this->mfunction->now(),
					'author'=>$this->session->userdata("user_id"),
					'status'=>$status
				);
				$data = $this->security->xss_clean($data);
				$this->mproducts->save($data);
				$this->mfunction->successAdd();
	      		redirect('admin/products');
	      	}else{
	      		$newname 						= "product-".$this->mfunction->seo($this->input->post('name'));
	      		$config['file_name']           	= $newname;
	      		$config['upload_path']          = './assets/images/product/';
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
						'name'=>$this->input->post('name'),
						'unit'=>$this->input->post('unit'),
						'img'=>$this->upload->file_name,
						'created_at'=>$this->mfunction->now(),
						'updated_at'=>$this->mfunction->now(),
						'author'=>$this->session->userdata("user_id"),
						'status'=>$status
					);
					$data = $this->security->xss_clean($data);
					$this->mproducts->save($data);
					$this->mfunction->successAdd();
				  	redirect('admin/Products');
				}
	      	}

		}else {
			$this->mfunction->failedAdd();
      		redirect('admin/Products/add');
		}
	}

	public function ajaxShow()
	{
		$id = intval($_POST['id']);
	  	$data = $this->mproducts->get_by_id($id);
    	echo json_encode($data);
	}

	function update($id)
	{
		$datas['container'] = "admin/products/Productsu";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Products";
		$datas['subtitle'] = "Update";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$check = $this->mproducts->check($id);
			if ($check>0) {
				$datas['data'] = $this->mproducts->get_by_id($id);
				$this->load->view("./admin/template",$datas);
			} else {
				$this->mfunction->failedUpdate();
				redirect('admin/Products');
			}
	}

	function updateProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$id = $this->input->post('pid');
			$status = $this->mfunction->statue($this->input->post('status'));
			if(empty($_FILES['img']['name'])){
				$data=array(
					'name'=>$this->input->post('name'),
					'unit'=>$this->input->post('unit'),
					'updated_at'=>$this->mfunction->now(),
					'status'=>$status
				);
				$data = $this->security->xss_clean($data);
				$this->mproducts->update($id,$data);
				$this->mfunction->successUpdate();
	      		redirect('admin/Products');
	      	}else{
	      		$newname 						= "product-".$this->mfunction->seo($this->input->post('name'));
	      		$config['file_name']           	= $newname;
	      		$config['upload_path']          = './assets/images/product/';
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
						'name'=>$this->input->post('name'),
						'unit'=>$this->input->post('unit'),
						'img'=>$this->upload->file_name,
						'updated_at'=>$this->mfunction->now(),
						'status'=>$status
					);
					$data = $this->security->xss_clean($data);
					$this->mproducts->update($id,$data);
					$this->mfunction->successUpdate();
				  	redirect('admin/Products');
				}
	      	}

		}else {
			$this->mfunction->failedUpdate();
      		redirect('admin/Products/update/'.$id);
		}
	}

	function delete($id)
	{
		$check = $this->mproducts->check($id);
		if ($check>0) {
			$show = $this->mproducts->get_by_id($id);
			if ($show->img != "default/img.png" ) {
				unlink('assets/images/product/'.$show->img);
			}
			$this->mproducts->delete($id);
			$this->mfunction->successDelete();
        	redirect('admin/Products');
      	} else {
			$this->mfunction->failedDelete();
        	redirect('admin/Products');
		}
	}

	function setRules() {
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('unit','Unit','required');
    	$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}
