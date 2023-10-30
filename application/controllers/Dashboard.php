<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		// $this->load->view('view_home');
		$query = $this->db->get_where('view_peserta', array('jenis_pelatihan' => 'OFFLINE'))->result();
		$queryonline=$this->db->get_where('view_peserta', array('jenis_pelatihan' => 'ONLINE'))->result();
		$querywebinar=$this->db->get_where('view_peserta', array('jenis_pelatihan' => 'WEBINAR'))->result();
		$offline=count($query);
		$online=count($queryonline);
		$data['offline']=count($query);
		$data['online']=count($queryonline);
		$data['total']=$offline+$online;
		$data['webinar']=count($querywebinar);

		// echo $data;

		$this->templateadmin->load('template/dashboard', 'view_dashboard',$data);
	
	}
}
