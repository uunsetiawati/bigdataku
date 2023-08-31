<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('ssp');
		$this->load->model('peserta_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data()
	{

		// nama table
		$table      = 'tb_data_2018';
		// nama PK
		$primaryKey = 'NO';
		// list field yang mau ditampilkan
		$columns    = array(
			//tabel db(kolom di database) => dt(nama datatable di view)
			array('db' => 'KAB_KOTA_PELATIHAN', 'dt' => 'kabkota'),
			array('db' => 'NAMA_KOPERASI_UKM', 'dt' => 'namakopukm'),
	        array('db' => 'NAMA_PESERTA', 'dt' => 'nama_peserta'),
	        //untuk menampilkan aksi(edit/delete dengan parameter kode mapel)
	        array(
	              'db' => 'NO',
	              'dt' => 'aksi',
	              'formatter' => function($d) {
	               		return anchor('peserta/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-primary" data-placement="top" title="Edit"').' 
	               		'.anchor('peserta/delete/'.$d, '<i class="fa fa-times fa fa-white"></i>', 'class="btn btn-xs btn-danger" onclick="return confirm(\'apa anda yakin untuk menghapus data?\')" data-placement="top" title="Delete"');
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
		$this->templateadmin->load('template/dashboard', 'view_peserta');
	
	}

	function edit() 
	{

	}

	function delete() 
	{

	}
}
