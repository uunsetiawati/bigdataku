<?php

	class Saldoawal2 extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			//checkAksesModule();
			$this->load->library('ssp');
			$this->load->model('model_saldoawal2');
			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
		}		

		function edit()
		{

			$this->form_validation->set_rules('nama', 'Jenis Saldo', 'required'); 
				
			

			if ($this->form_validation->run() == FALSE)
			{			
				$id 		= $this->uri->segment(3);
				$data['saldoawal'] 	= $this->db->get_where('tb_test', array('id' => $id))->row_array();
				// $this->template->load('template', 'saldoawal/edit2', $data);	
				$this->load->view('pelatihan/edit2', $data);			
			}
			else
			{   
				$this->model_saldoawal2->update();
				redirect('dashboard');
			}
		}

	}

?>