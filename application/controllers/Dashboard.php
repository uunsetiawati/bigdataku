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
		$this->templateadmin->load('template/dashboard', 'view_dashboard');
	
	}
}
