<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musers extends CI_Model {

  public $table = 'user';
  public $id = 'user_id';
  public $order = 'ASC';

  function check($id){
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->num_rows();
  }

  function checkAva($email){
    $this->db->where('email',$email);
    return $this->db->get($this->table)->num_rows();
  }

  function get_all() {
    $this->db->select('user.*,level.name as userg');
    $this->db->from($this->table);
    $this->db->join('level', 'user.level = level.level_id');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get()->result();
  }

  function get_by_id($id) {
    $this->db->select('user.*,level.name as userg');
    $this->db->from($this->table);
    $this->db->join('level', 'user.level = level.level_id');
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

  function get_level() {
    $this->db->where('status', 1);
    return $this->db->get('level')->result();
  }

}
