<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productd extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('mproductd');
				$this->msec->getsec();
				if ($this->session->userdata("aproduct") != 1) {
					$datas['container'] = "admin/denied";
					$this->load->view("./admin/template",$datas);
				}
	}

	public function index()
	{
		$datas['container'] = "admin/productd/productds";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Productd";
		$datas['subtitle'] = "Show";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['linkaddx'] = $this->mfunction->linkAddX($datas['title']);
		$datas['data'] = $this->mproductd->get_all();
		$this->load->view("./admin/template",$datas);
	}

	function add()
	{
		$datas['container'] = "admin/productd/productda";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Productd";
		$datas['subtitle'] = "Insert";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['linkaddx'] = $this->mfunction->linkAddX($datas['title']);
		$datas['data'] = $this->mproductd->get_all();
		$datas['market'] = $this->mproductd->get_market();
		$datas['products'] = $this->mproductd->get_products();
		$this->load->view("./admin/template",$datas);
	}

	function addProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$status = $this->mfunction->statue($this->input->post('status'));
				$data=array(
					'product_id'=>$this->input->post('product'),
					'market_id'=>$this->input->post('market'),
					'price'=>$this->input->post('price'),
					'date'=>$this->mfunction->dn(),
					'author'=>$this->session->userdata("user_id"),
					'status'=>$status
				);
				$array = array(
					'product_id'=>$this->input->post('product'),
					'market_id'=>$this->input->post('market'),
					'date'=>$this->mfunction->dn()
				);
				$a = $this->mproductd->checkAva($array);
				// echo $a;
				// exit;
				if ($a == 0) {
					$data = $this->security->xss_clean($data);
					$this->mproductd->save($data);
					$this->mfunction->successAdd();
		      		redirect('admin/Productd');
				}else{
					$this->mfunction->failedAdd();
					$this->mfunction->failedAddP();
      				redirect('admin/Productd/add');
				}
		}else {
			$this->mfunction->failedAdd();
      		redirect('admin/Productd/add');
		}
	}

	function addx()
	{
		$datas['container'] = "admin/productd/productdx";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Productd";
		$datas['subtitle'] = "Import Excel";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['linkaddx'] = $this->mfunction->linkAddX($datas['title']);
		$datas['data'] = $this->mproductd->get_all();
		$datas['market'] = $this->mproductd->get_market();
		$datas['products'] = $this->mproductd->get_products();
		$this->load->view("./admin/template",$datas);
	}

	function addxProccess()
	{
		$file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_extension = pathinfo($file_name,PATHINFO_EXTENSION);

    $allowed = array('csv');

		if (!in_array($file_extension,$allowed)) {
			$this->mfunction->failedadd();
			redirect('admin/Productd/addx');
		}else {
			$count=0;
			$fp = fopen($file_tmp,'r') or die("can't open file");
			while($csv_line = fgetcsv($fp,1024))
			{
				$count++;
				if($count == 1){
					continue;
				}//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++){
                $insert_csv = array();
                $insert_csv['product_id'] = $csv_line[0];
								$insert_csv['market_id'] = $csv_line[1];
                $insert_csv['price'] = $csv_line[2];
            }
            $i++;
            $data = array(
                'product_id' => $insert_csv['product_id'],
                'market_id' => $insert_csv['market_id'],
                'price' => $insert_csv['price'],
								'date' => $this->input->post('date'),
								'author' => $this->session->userdata('user_id'),
								'status' => 1
						);
						$array = array(
							'product_id'=>$insert_csv['product_id'],
							'market_id'=>$insert_csv['market_id'],
							'date'=>$this->input->post('date')
						);
						$a = $this->mproductd->checkAva($array);
						if ($a == 0) {
							$data = $this->security->xss_clean($data);
							$this->mproductd->save($data);
							$this->mfunction->successAdd();
						}else{
							$this->mfunction->failedAdd();
							$this->mfunction->failedAddP();
		      				redirect('admin/Productd/addx');
						}
        }
				fclose($fp) or die("can't close file");
				redirect('admin/Productd');
		}
	}

	public function ajaxShow()
	{
		$id = intval($_POST['id']);
	  	$data = $this->mproductd->get_by_id($id);
    	echo json_encode($data);
	}

	function update($id)
	{
		$datas['container'] = "admin/productd/productdu";
		$datas['app'] = $this->mfunction->appName();
		$datas['title'] = "Productd";
		$datas['subtitle'] = "Update";
		$datas['linkadmin'] = $this->mfunction->linkAdmin();
		$datas['linksub'] = $this->mfunction->linkSub($datas['title']);
		$datas['linkdelete'] = $this->mfunction->linkDelete($datas['title']);
		$datas['linkupdate'] = $this->mfunction->linkUpdate($datas['title']);
		$datas['linkadd'] = $this->mfunction->linkAdd($datas['title']);
		$datas['linkaddx'] = $this->mfunction->linkAddX($datas['title']);
		$check = $this->mproductd->check($id);
			if ($check>0) {
				$datas['data'] = $this->mproductd->get_by_id($id);
				$datas['market'] = $this->mproductd->get_market();
				$datas['products'] = $this->mproductd->get_products();
				$this->load->view("./admin/template",$datas);
			} else {
				$this->mfunction->failedUpdate();
				redirect('admin/Productd');
			}
	}

	function updateProccess()
	{
		$this->setRules();
		if ($this->form_validation->run()==true) {
			$id = $this->input->post('pid');
			$status = $this->mfunction->statue($this->input->post('status'));
				$data=array(
					'product_id'=>$this->input->post('product'),
					'market_id'=>$this->input->post('market'),
					'price'=>$this->input->post('price'),
					'status'=>$status
				);
				$data = $this->security->xss_clean($data);
				$this->mproductd->update($id,$data);
				$this->mfunction->successUpdate();
	      		redirect('admin/Productd');
		}else {
			$this->mfunction->failedUpdate();
      		redirect('admin/Productd/update/'.$id);
		}
	}

	function delete($id)
	{
		$check = $this->mproductd->check($id);
		if ($check>0) {
			$this->mproductd->delete($id);
			$this->mfunction->successDelete();
        	redirect('admin/Productd');
      	} else {
			$this->mfunction->failedDelete();
        	redirect('admin/Productd');
		}
	}

	function setRules() {
		$this->form_validation->set_rules('product','Product','required');
		$this->form_validation->set_rules('market','Market','required');
		$this->form_validation->set_rules('price','Price','required');
    	$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}
