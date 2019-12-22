<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mfunction extends CI_Model {

  public function selected($cond1,$cond2){
    if ($cond1 == $cond2) { return 'selected="selected"'; }
  }

  public function now() {
    return date("Y-m-d H:i:s");
  }

  public function dn() {
    return date("Y-m-d");
  }

	public function errorLogin()
	{
    echo $this->session->set_flashdata('failed','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-times-circle sign"></i><strong>Error!</strong> Username OR Password Wrong! </div>');
	}

  public function errorForgot($i)
  {
    echo $this->session->set_flashdata('failed','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-times-circle sign"></i><strong>Error!'.$i.'</strong> Not Sent! </div>');
  }

  public function emailSent(){
    $this->session->set_flashdata('emailSent','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle sign"></i><strong>Success!'.$i.'</strong> Email has sent! </div>');
  }

  public function successReset(){
    $this->session->set_flashdata('successreset','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle sign"></i><strong>Success!'.$i.'</strong> Password was reset! </div>');
  }

  public function successAdd(){
    $this->session->set_flashdata('successadd','<div id="not-success-add"></div>');
  }

  public function failedAdd(){
    $this->session->set_flashdata('failedadd','<div id="not-danger-add"></div>');
  }

  public function failedAddP(){
    $this->session->set_flashdata('failedaddp','<div id="not-danger-addp"></div>');
  }

  public function successUpdate(){
    $this->session->set_flashdata('successupdate','<div id="not-success-update"></div>');
  }

  public function failedUpdate(){
    $this->session->set_flashdata('failedupdate','<div id="not-danger-update"></div>');
  }

  public function successDelete(){
    $this->session->set_flashdata('successdelete','<div id="not-success-delete"></div>');
  }

  public function failedDelete(){
    $this->session->set_flashdata('faileddelete','<div id="not-danger-delete"></div>');
  }

  public function addMessageSuccess(){
    $output = array(
      'title' => 'Success',
      'text' => 'Success add data.',
      'class_name' => 'success'
    );
    echo json_encode($output);
  }

  public function addMessageFailed(){
    $output = array(
      'title' => 'Failed!',
      'text' => 'Failed add data.',
      'class_name' => 'danger'
    );
    echo json_encode($output);
  }

  public function addMessageFailedP(){
    $output = array(
      'title' => 'Failed!',
      'text' => 'Failed add data. <br/>Data exixst <i>(Not Unique)</i> or data cannot be null).',
      'class_name' => 'warning'
    );
    echo json_encode($output);
  }

  public function updateMessageSuccess(){
    $output = array(
      'title' => 'Success',
      'text' => 'Success update data.',
      'class_name' => 'success'
    );
    echo json_encode($output);
  }

  public function updateMessageFailed(){
    $output = array(
      'title' => 'Failed!',
      'text' => 'Failed update data.',
      'class_name' => 'danger'
    );
    echo json_encode($output);
  }

  public function deleteMessageSuccess(){
    $output = array(
      'title' => 'Success',
      'text' => 'Success delete data.',
      'class_name' => 'success'
    );
    echo json_encode($output);
  }

  public function deleteMessageFailed(){
    $output = array(
      'title' => 'Failed!',
      'text' => 'Failed delete data. Record not found!',
      'class_name' => 'danger'
    );
    echo json_encode($output);
  }

  public function status($stat){
    if ($stat == 1) {
        echo "Active";
      }else {
        echo "Non active";
      }
  }

  public function statur($stat){
    if ($stat == 1) {
          echo "Unread";
      }else {
        echo "Read";
      }
  }

  public function statue($sta){
    if (!empty($sta)) {
        return 1;
      }else {
        return 0;
      }
  }

  public function limContent($con){
    return substr($con,0,25)."...";
  }

  public function checked($cond){
    if ($cond == 1) { echo 'checked="checked"';}
  }

  public function appName(){
    return "Sehari";
  }

  public function tMarket(){
    return "Market";
  }

  public function tMessages(){
    return "Messages";
  }

  public function tNews(){
    return "News";
  }

  public function tPages(){
    return "Pages";
  }

  public function tProducts(){
    return "Products";
  }

  public function tProductd(){
    return "Productd";
  }

  public function tUsers(){
    return "Users";
  }

  public function tUserg(){
    return "Userg";
  }

  public function linkAdd($control){
    return base_url('admin/'.$control.'/add');
  }

  public function linkAddX($control){
    return base_url('admin/'.$control.'/addx');
  }

  public function linkUpdate($control){
    return base_url('admin/'.$control.'/update/');
  }

  public function linkDelete($control){
    return base_url('admin/'.$control.'/delete/');
  }

  public function linkAdmin(){
    return base_url('admin/Admin');
  }

  public function linkSub($sub){
    return base_url('admin/'.$sub);
  }

  function check($stat){
    if ($stat == 1) {
      return '<i class="fa fa-check"></i>';
    } else {
      return '<i class="fa fa-times">';
    }
  }

  function seo($s) {
    $c = array(' ');
    $d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');
    $s = str_replace($d, '', $s);
    $s = strtolower(str_replace($c, '-', $s));
    return $s;
  }

  function sql($str) {
    $rms = array("'", "`", "=", '"', "@", "<", ">", "*");
    $str = str_replace($rms, '', $str);
    $str = stripcslashes($str);
    $str = htmlspecialchars($str);

    return $str;
  }

}
