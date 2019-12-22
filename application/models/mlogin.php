<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	public $table = 'user';
  public $id = 'user_id';
  public $order = 'ASC';

	public function getlog($table,$where)
	{
    return $this->db->get_where($table,$where);
	}
  public function getUser($email)
  {
		$this->db->where('email',$email);
    return $this->db->get($this->table)->row();
  }

	function update($id,$email,$input){
    $this->db->where($this->id, $id);
		$this->db->where('email', $email);
    $this->db->update($this->table,$input);
  }

	public function getUs($where)
	{
		$this->db->where('forgot',$where);
    return $this->db->get($this->table)->row();
	}

	function updateF($id,$key,$input){
		$this->db->where($this->id, $id);
		$this->db->where("forgot", $key);
    $this->db->update($this->table,$input);
  }

}
