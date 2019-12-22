<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class muploadimg extends CI_Model {

  public $table = 'media';
  public $id = 'media_id';
  public $order = 'DESC';

  function save($input) {
    $this->db->insert($this->table, $input);
    return $this->db->insert_id();
  }

}
