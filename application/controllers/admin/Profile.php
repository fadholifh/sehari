<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('musers');
		$this->msec->getsec();
	}

	function update($id)
	{
		$datas['container'] = "admin/profile/profile";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Users";
		$datas['subtitle'] = "Update";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['data'] = $this->musers->get_by_id($id);
		$datas['level'] = $this->musers->get_level();
		$this->load->view("./admin/template",$datas);
	}

	function updateProccess()
	{
		$id = $this->input->post('uid');
		$this->setRuless();
		if ($this->form_validation->run()==true) {
			$id = $this->input->post('uid');
			$p = $this->input->post('password');
			$em = $this->input->post('email');
			$password = hash('sha512', $this->msec->salt().$p);
			$status = $this->mfunction->statue($this->input->post('status'));
			if (empty($p)) {
				if(empty($_FILES['avatar']['name'])){
					$data=array(
						'name'=>$this->input->post('name'),
						'email'=>$this->input->post('email'),
						'updated_at'=>$this->mfunction->now(),
						'status'=>$status
					);
					$e = $this->musers->checkAva($this->input->post('email'));
					if ($e == 0) {
							$data = $this->security->xss_clean($data);
							$this->musers->update($id,$data);
							$this->mfunction->successUpdate();
				      		redirect('admin/Profile/update/'.$id);
						}else{
							$query = $this->db->query("SELECT * FROM user WHERE email = '$em'");
							$duser = $query->row();
							if ($duser->user_id == $id && $duser->email == $this->input->post('email')) {
								$data = $this->security->xss_clean($data);
								$this->musers->update($id,$data);
								$this->mfunction->successUpdate();
					      		redirect('admin/Profile/update/'.$id);
							}else{
								$this->mfunction->failedUpdate();
		      					redirect('admin/Profile/update/'.$id);
							}
						}

		      	}else{
		      		$newname 						= "avatar-".$this->mfunction->seo($this->input->post('name'));
	      			$config['file_name']           	= $newname;
		      		$config['upload_path']          = './assets/images/avatar/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 1024;
	                $config['max_width']            = 1024;
					$config['max_height']           = 768;

					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('avatar'))
	                {
						echo $this->upload->display_errors();
						exit;
	                }else{
						$data=array(
							'name'=>$this->input->post('name'),
							'email'=>$this->input->post('email'),
							'avatar'=>$this->upload->file_name,
							'updated_at'=>$this->mfunction->now(),
							'status'=>$status
						);
						$e = $this->musers->checkAva($this->input->post('email'));
						if ($e == 0) {
							$data = $this->security->xss_clean($data);
							$this->musers->update($id,$data);
							$this->mfunction->successUpdate();
				      		redirect('admin/Profile/update/'.$id);
						}else{
							$query = $this->db->query("SELECT * FROM user WHERE email = '$em'");
							$duser = $query->row();
							if ($duser->user_id == $id && $duser->email == $this->input->post('email')) {
								$data = $this->security->xss_clean($data);
								$this->musers->update($id,$data);
								$this->mfunction->successUpdate();
					      		redirect('admin/Profile/update/'.$id);
							}else{
								$this->mfunction->failedUpdate();
		      					redirect('admin/Profile/update/'.$id);
							}
						}
					}
		      	}
			}else{
				if(empty($_FILES['avatar']['name'])){
					$data=array(
						'name'=>$this->input->post('name'),
						'email'=>$this->input->post('email'),
						'password'=>$password,
						'updated_at'=>$this->mfunction->now(),
						'status'=>$status
					);
					$e = $this->musers->checkAva($this->input->post('email'));
					if ($e == 0) {
							$data = $this->security->xss_clean($data);
							$this->musers->update($id,$data);
							$this->mfunction->successUpdate();
				      		redirect('admin/Profile/update/'.$id);
						}else{
							$query = $this->db->query("SELECT * FROM user WHERE email = '$em'");
							$duser = $query->row();
							if ($duser->user_id == $id && $duser->email == $this->input->post('email')) {
								$data = $this->security->xss_clean($data);
								$this->musers->update($id,$data);
								$this->mfunction->successUpdate();
					      		redirect('admin/Profile/update/'.$id);
							}else{
								$this->mfunction->failedUpdate();
		      					redirect('admin/Profile/update/'.$id);
							}
						}

		      	}else{
		      		$newname 						= "avatar-".$this->mfunction->seo($this->input->post('name'));
	      			$config['file_name']           	= $newname;
		      		$config['upload_path']          = './assets/images/avatar/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 1024;
	                $config['max_width']            = 1024;
					$config['max_height']           = 768;

					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('avatar'))
	                {
						echo $this->upload->display_errors();
						exit;
	                }else{
						$data=array(
							'name'=>$this->input->post('name'),
							'email'=>$this->input->post('email'),
							'password'=>$password,
							'avatar'=>$this->upload->file_name,
							'updated_at'=>$this->mfunction->now(),
							'status'=>$status
						);
						$e = $this->musers->checkAva($this->input->post('email'));
						if ($e == 0) {
							$data = $this->security->xss_clean($data);
							$this->musers->update($id,$data);
							$this->mfunction->successUpdate();
				      		redirect('admin/Profile/update/'.$id);
						}else{
							$query = $this->db->query("SELECT * FROM user WHERE email = '$em'");
							$duser = $query->row();
							if ($duser->user_id == $id && $duser->email == $this->input->post('email')) {
								$data = $this->security->xss_clean($data);
								$this->musers->update($id,$data);
								$this->mfunction->successUpdate();
					      		redirect('admin/Profile/update/'.$id);
							}else{
								$this->mfunction->failedUpdate();
		      					redirect('admin/Profile/update/'.$id);
							}
						}
					}
		      	}
			}


		}else {
			$this->mfunction->failedUpdate();
      		redirect('admin/Profile/update/'.$id);
		}
	}

	function setRuless() {
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','email','required|valid_email');
    	$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}

}
