<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$query = $this->db->get_where('view_peserta', array('jenis_pelatihan' => 'OFFLINE'))->result();
		$queryonline=$this->db->get_where('view_peserta', array('jenis_pelatihan' => 'ONLINE'))->result();
		$querywebinar=$this->db->get_where('view_peserta', array('jenis_pelatihan' => 'WEBINAR'))->result();
		$offline=count($query);
		$online=count($queryonline);
		$data['offline']=count($query);
		$data['online']=count($queryonline);
		$data['total']=$offline+$online;
		$data['webinar']=count($querywebinar);
		$this->load->view('view_home',$data);
	}
}
