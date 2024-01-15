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
		// $query = $this->db->get_where('view_peserta', array('jenis_pelatihan' => 'OFFLINE'))->result();
		$offline = $this->db->get('view_home_offline')->num_rows();
		$online=$this->db->get('view_home_online')->num_rows();
		$webinar=$this->db->get('view_home_webinar')->num_rows();
		$data['offline']=$offline;
		$data['online']=$online;
		$data['total']=$offline+$online;
		$data['webinar']=$webinar;

		// echo $data;

		$this->templateadmin->load('template/dashboard', 'view_dashboard',$data);
	
	}
}
