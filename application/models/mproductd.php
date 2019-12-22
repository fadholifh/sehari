<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproductd extends CI_Model {

  public $table = 'product_detail';
  public $id = 'pd_id';
  public $order = 'DESC';

  function check($id){
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->num_rows();
  }

  function checkAva($where){
    $this->db->where($where);
    return $this->db->get($this->table)->num_rows();
  }

  function get_all() {
    $this->db->select('product_detail.*, product.name, product.unit, product.img, market.name as market, user.name as author');
    $this->db->from($this->table);
    $this->db->join('user', 'user.user_id = product_detail.author');
    $this->db->join('market', 'market.market_id = product_detail.market_id');
    $this->db->join('product', 'product.product_id = product_detail.product_id');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get()->result();
  }

  function get_by_id($id) {
    $this->db->select('product_detail.*, product.*, market.name as market, user.name as author');
    $this->db->from($this->table);
    $this->db->join('user', 'user.user_id = product_detail.author');
    $this->db->join('market', 'market.market_id = product_detail.market_id');
    $this->db->join('product', 'product.product_id = product_detail.product_id');
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

  function get_market() {
    $this->db->where('status', 1);
    return $this->db->get('market')->result();
  }

  function get_products() {
    $this->db->where('status', 1);
    return $this->db->get('product')->result();
  }

}
