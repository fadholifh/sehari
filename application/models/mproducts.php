<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproducts extends CI_Model {

  public $table = 'product';
  public $id = 'product_id';
  public $order = 'DESC';

  function check($id){
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->num_rows();
  }

  function get_all() {
    $this->db->select('product.*,user.name as author');
    $this->db->from($this->table);
    $this->db->join('user', 'user.user_id = product.author');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get()->result();
  }

  function get_by_id($id) {
    $this->db->select('product.*,user.name as author');
    $this->db->from($this->table);
    $this->db->join('user', 'user.user_id = product.author');
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
