<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdash extends CI_Model {

  function total_user() {
        $this->db->from("user");
        return $this->db->count_all_results();
  }
  function total_userg() {
        $this->db->from("level");
        return $this->db->count_all_results();
  }
  function total_products() {
        $this->db->from("product");
        return $this->db->count_all_results();
  }
  function total_productd() {
        $this->db->from("product_detail");
        return $this->db->count_all_results();
  }
  function total_page() {
        $this->db->from("page");
        return $this->db->count_all_results();
  }
  function total_news() {
        $this->db->from("news");
        return $this->db->count_all_results();
  }
  function total_message() {
        $this->db->from("message");
        return $this->db->count_all_results();
  }
  function total_market() {
        $this->db->from("market");
        return $this->db->count_all_results();
  }
}
