<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpages extends CI_Model {

  public $table = 'page';
  public $id = 'page_id';
  public $order = 'DESC';

  function check($id){
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->num_rows();
  }

  function get_all() {
    $this->db->select('page.*, user.name as author');
    $this->db->from($this->table);
    $this->db->join('user', 'user.user_id = page.author');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get()->result();
  }

  function get_by_id($id) {
    $this->db->select('page.*, user.name as author');
    $this->db->from($this->table);
    $this->db->join('user', 'user.user_id = page.author');
    $this->db->where($this->id, $id);
    return $this->db->get()->row();
  }

  function save($input) {
    $this->db->insert($this->table, $input);
    return $this->db->insert_id();
  }

  function update($id,$input){
    $this->db->where($this->id, $id);
    $this->db->update($this->table,$input);
  }

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }
  
}
