<?php defined('BASEPATH') OR die('No direct script access allowed');

class Export_model extends CI_Model {

     public function getAll($kodeunik)
     {
          $this->db->select('*');
          $this->db->from('view_peserta');
          $this->db->where('kodeunik',$kodeunik);
          $this->db->order_by('no_urut','ASC');

          return $this->db->get();
     }

}