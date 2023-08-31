<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('ssp');
		$this->load->model('klasifikasi_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data()
	{

		// nama table
		$table      = 'tb_klasifikasi_usaha';
		// nama PK
		$primaryKey = 'id';
		// list field yang mau ditampilkan
		$columns    = array(
			//tabel db(kolom di database) => dt(nama datatable di view)
			array('db' => 'nama', 'dt' => 'nama'),
	        //untuk menampilkan aksi(edit/delete dengan parameter kode mapel)
	        array(
	              'db' => 'id',
	              'dt' => 'aksi',
	              'formatter' => function($d) {
	               		return anchor('klasifikasi/edit/'.$d, '<i class="icon ion-ios-create"></i>','class="btn btn-xs btn-primary" data-placement="top" title="Edit"');
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
		$this->templateadmin->load('template/dashboard', 'klasifikasi/data_klasifikasi');
	
	}

	function add()//butuh form validation untuk menghindari no akun yang sama
		{
			$this->form_validation->set_rules('nama', 'Klasifikasi', 'required|is_unique[tb_klasifikasi_usaha.nama]', [
				'is_unique' => '%s sudah ada. Silahkan isikan Klasifikasi Usaha lainnya',
			]); // Unique Field            

			if ($this->form_validation->run() == FALSE)
			{			
				$this->templateadmin->load('template/dashboard', 'klasifikasi/add_klasifikasi');			
			}
			else
			{   
				$this->klasifikasi_m->save();
				redirect('klasifikasi');
			}

		}

	function edit() 
	{
		$this->form_validation->set_rules('nama', 'Klasifikasi Usaha', 'required|callback_klasifikasi_check'); 
		if ($this->form_validation->run() == FALSE)
		{			
			$id = $this->uri->segment(3);
			$data['klasifikasi'] = $this->db->get_where('tb_klasifikasi_usaha', array('id' => $id))->row_array();
			$this->templateadmin->load('template/dashboard', 'klasifikasi/edit_klasifikasi', $data);			
		}
		else
		{   
			$this->klasifikasi_m->update();
			redirect('klasifikasi');
		}

	}

    function klasifikasi_check(){
        $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_klasifikasi_usaha WHERE nama = '$post[nama]' AND id != '$post[id]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('klasifikasi_check', '{field} ini sudah dipakai');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	

	function delete() 
	{

	}
}