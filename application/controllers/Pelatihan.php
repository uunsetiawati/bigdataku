<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('ssp');
		$this->load->model('pelatihan_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data()
	{

		// nama table
		$table      = 'view_pelatihan';
		// nama PK
		$primaryKey = 'id';
		// list field yang mau ditampilkan
		$columns    = array(
			//tabel db(kolom di database) => dt(nama datatable di view)
			array('db' => 'id', 'dt' => 'id'),
			array('db' => 'judul_pelatihan', 'dt' => 'judul'),
			array('db' => 'program', 'dt' 	=> 'program'),
			array('db' => 'divisi', 'dt' 	=> 'divisi'),
			array('db' => 'name', 'dt' 	=> 'alamat'),
	        array('db' => 'sasaran', 'dt' => 'sasaran'),
			array('db' => 'tgl_mulai', 'dt' => 'tanggalmulai'),
	        //untuk menampilkan aksi(edit/delete dengan parameter kode mapel)
	        array(
	              'db' => 'id',
	              'dt' => 'aksi',
	              'formatter' => function($d) {
	               		return anchor('pelatihan/edit/'.$d, '<i class="icon ion-ios-create"></i>','class="btn btn-xs btn-success" data-placement="top" title="Edit"');
	            }
	        ),
			array(
				'db' => 'kodeunik',
				'dt' => 'share',
				'formatter' => function($d) {
						 return anchor('peserta/add_peserta/'.$d, '<i class="icon ion-ios-share"></i>','class="btn btn-xs btn-primary" id="text-copy" onclick="copyText()" data-placement="top" title="Share Form"');
			  }
		  	),
			  array(
				'db' => 'kodeunik',
				'dt' => 'lihat',
				'formatter' => function($d) {
						 return anchor('peserta/viewdatapeserta/'.$d, '<i class="icon ion-ios-eye"></i>','class="btn btn-xs btn-warning" data-placement="top" title="Lihat Peserta"');
			  }
		  	)
	    );

		// $where = "id_user='".$this->session->userdata('id_user')."'";
		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
	    );
		
	    // echo json_encode(
	    //  	SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)
	    //  );

	    echo json_encode(
		     	SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		     );

	}

	public function index()
	{
		// $this->load->view('view_peserta');
		$this->templateadmin->load('template/dashboard', 'pelatihan/data_pelatihan');
	
	}

	function add()//butuh form validation untuk menghindari no akun yang sama
		{
			// $this->form_validation->set_rules('no_akun', 'No Akun', 'required|is_unique[tbl_saldoawaldetail.no_akun]', [
			// 	'is_unique' => '%s sudah ada. Silahkan isikan Nomor Akun lainnya',
			// ]); // Unique Field

			$this->form_validation->set_rules('judul', 'Judul', 'required'); // Unique Field
			$this->form_validation->set_rules('alamat', 'Alamat', 'required'); // Unique Field
			$this->form_validation->set_rules('kota', 'Kab/Kota', 'required'); // Unique Field			
			$this->form_validation->set_rules('program', 'Program Kode Anggaran', 'required'); // Unique Field
			$this->form_validation->set_rules('kegiatan', 'Kegiatan Kode Anggaran', 'required'); // Unique Field
			$this->form_validation->set_rules('subkegiatan', 'Sub Kegaitan Kode Anggaran', 'required'); // Unique Field

			if ($this->form_validation->run() == FALSE)
			{			
				$this->templateadmin->load('template/dashboard', 'pelatihan/add_pelatihan');			
			}
			else
			{   
				$this->pelatihan_m->save();
				redirect('pelatihan');
			}

			// if (isset($_POST['submit'])) {
			// 	$this->model_saldoawaldetail->save();
			// 	redirect('saldoawaldetail');
			// } else {
			// 	$this->template->load('template', 'saldoawaldetail/add');
			// }
		}

	function edit() 
	{

		$this->form_validation->set_rules('judul', 'Judul', 'required'); // Unique Field
		$this->form_validation->set_rules('alamat', 'Alamat', 'required'); // Unique Field
		$this->form_validation->set_rules('kota', 'Kab/Kota', 'required'); // Unique Field
		$this->form_validation->set_rules('program', 'Program Kode Anggaran', 'required'); // Unique Field
		$this->form_validation->set_rules('kegiatan', 'Kegiatan Kode Anggaran', 'required'); // Unique Field
		$this->form_validation->set_rules('subkegiatan', 'Sub Kegaitan Kode Anggaran', 'required'); // Unique Field

		if ($this->form_validation->run() == FALSE)
		{			
			$id = $this->uri->segment(3);
			$data['pelatihan'] = $this->db->get_where('view_pelatihan', array('id' => $id))->row_array();
			$this->templateadmin->load('template/dashboard', 'pelatihan/edit_pelatihan', $data);			
		}
		else
		{   
			$this->pelatihan_m->update();
			redirect('pelatihan');
		}


		// if (isset($_POST['submit'])) {
		// 	$this->pelatihan_m->update();
		// 	redirect('pelatihan');
		//   } else {
		// 	$id_guru     = $this->uri->segment(3);
		// 	$data['pelatihan']  = $this->db->get_where('view_pelatihan', array('id' => $id_guru))->row_array();
		// 	$this->templateadmin->load('template/dashboard', 'pelatihan/edit', $data);
		//   }		

	}

	function edit2()
		{
			
			// if ($this->form_validation->run() == FALSE)
			// {			
			// 	$id     = $this->uri->segment(3);
			// 	$data['test']  = $this->db->get_where('tb_test', array('id' => $id))->row_array();
			// 	$this->templateadmin->load('template/dashboard', 'pelatihan/test', $data);				


			// }
			// else
			// {   
			// 	$this->pelatihan_m->test();
			// 	redirect('dashboard');
			// }

			
			// if (isset($_POST['submit'])) {
			// 	$this->pelatihan_m->test();
			// 	redirect('dashboard');
			//   } else {
			// 	$id     = $this->uri->segment(3);
			// 	$data['saldoawal']  = $this->db->get_where('tb_test', array('id' => $id))->row_array();
			// 	$this->template->load('template/dashboard', 'pelatihan/test', $data);
			//   }


			// if ($this->form_validation->run() == FALSE)
			
			// 	{			
			// 		$id 		= $this->uri->segment(3);
			// 		$data['guru'] 	= $this->db->get_where('tb_test', array('id' => $id))->row_array();
			// 		$this->template->load('template/dashboard', 'pelatihan/test', $data);				
			// 	}
			// 	else
			// 	{   
			// 		$this->pelatihan_m->test();
			// 		redirect('dashboard');
			// 	}
			// }

			if ($this->form_validation->run() == FALSE)
			{			
				$id 		= $this->uri->segment(3);
				$data['saldoawal'] 	= $this->db->get_where('tb_test', array('id' => $id))->row_array();
				$this->load->view('pelatihan/test', $data);				
			}
			else
			{   
				$this->pelatihan_m->test();
				redirect('dashboard');
			}
			

		}

	function delete() 
	{

	}
}