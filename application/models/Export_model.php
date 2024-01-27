<?php defined('BASEPATH') OR die('No direct script access allowed');

class Export_model extends CI_Model {

     public function getAll($kodeunik)
     {
          $this->db->select('*');
          $this->db->from('view_peserta');
          $this->db->where('kodeunik',$kodeunik);
          $this->db->order_by('id','ASC');

          return $this->db->get();
     }

     public function getAllPodcast($kodeunik)
     {
          $this->db->select('*');
          $this->db->from('view_peserta_podcast');
          $this->db->where('kodeunik',$kodeunik);
          $this->db->order_by('no_urut','ASC');

          return $this->db->get();
     }

     public function getAllTp()
     {
          $this->db->select('*');
          $this->db->from('view_tpall');
          return $this->db->get();
     }

     public function getAllNarsum()
     {
          $this->db->select('*');
          $this->db->from('tb_data_narsum');
          return $this->db->get();
     }

}