<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// check_not_login();
        $this->load->model('test_m');
	}

	public function edit()
	{

        if ($this->form_validation->run() == FALSE)
			{			
				$id     = $this->uri->segment(3);
				$data['saldoawal']  = $this->db->get_where('tb_test', array('id' => $id))->row_array();
				$this->load->view('test', $data);
                				
			}
			else
			{   
				$this->test_m->update();
				redirect('dashboard');
			}

		// if (isset($_POST['submit'])) {
		// 		$this->test_m->update();
		// 		redirect('dashboard');
		// 	  } else {
		// 		$id     = $this->uri->segment(3);
		// 		$data['saldoawal']  = $this->db->get_where('tb_test', array('id' => $id))->row_array();
		// 		$this->load->view('test', $data);
		// 	  }

        // $id     = $this->uri->segment(3);
		// 		$query  = $this->db->get_where('tb_test', array('id' => $id))->row_array();
        //         print ($query['nama']);
	}
}
?>
