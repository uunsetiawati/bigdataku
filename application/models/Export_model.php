<?php defined('BASEPATH') OR die('No direct script access allowed');

class Export_model extends CI_Model {

     public function getAll()
     {
          $this->db->select('*');
          $this->db->from('tb_data_peserta');

          return $this->db->get();
     }

}