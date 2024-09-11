<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_p extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->library('ssp');
		$this->load->model('peserta_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

public function viewdatapeserta_p()
	{
		// check_not_login();
		// $this->load->view('view_peserta');
		$kodeunik=$this->uri->segment(3);
		$data['peserta']=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();
		$this->templateadmin->load('template/dashboard_p', 'peserta/data_peserta_p',$data);
	
	}

function data($kodeunik)
	{
		// check_not_login();

		// nama table
		$table      = 'view_peserta2';
		// nama PK
		$primaryKey = 'id';
		// list field yang mau ditampilkan
		$columns    = array(
			//tabel db(kolom di database) => dt(nama datatable di view)
			array('db' => 'no_urut', 'dt' => 'no_urut'),
			array('db' => 'nama_peserta', 'dt' => 'nama_peserta'),
			array('db' => 'no_ktp', 'dt' => 'nik'),
			array('db' => 'kabupaten', 'dt' => 'kabupaten'),
	        array('db' => 'no_telp', 'dt' => 'no_telp'),
	        //untuk menampilkan aksi(edit/delete dengan parameter kode mapel)
	       
	    );
		// $kodeunik ="202310040949";
		// $where = "kodeunik='".$this->session->userdata('id_user')."'";
		$where = "kodeunik='".$kodeunik."'";
		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
	    );
		
	    echo json_encode(
	     	SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)
	     );

	    // echo json_encode(
		//      	SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		//      );

	}

}