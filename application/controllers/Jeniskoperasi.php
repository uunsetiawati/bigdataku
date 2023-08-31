<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniskoperasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('ssp');
		$this->load->model('jeniskoperasi_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data()
	{

		// nama table
		$table      = 'tb_jenis_koperasi';
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
	               		return anchor('jeniskoperasi/edit/'.$d, '<i class="icon ion-ios-create"></i>','class="btn btn-xs btn-primary" data-placement="top" title="Edit"');
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
		$this->templateadmin->load('template/dashboard', 'jeniskoperasi/data_jeniskoperasi');
	
	}

	function add()//butuh form validation untuk menghindari no akun yang sama
		{
			$this->form_validation->set_rules('nama', 'Jenis Koperasi', 'required|is_unique[tb_jenis_koperasi.nama]', [
				'is_unique' => '%s sudah ada. Silahkan isikan Jenis Koperasi lainnya',
			]); // Unique Field            

			if ($this->form_validation->run() == FALSE)
			{			
				$this->templateadmin->load('template/dashboard', 'jeniskoperasi/add_jeniskoperasi');			
			}
			else
			{   
				$this->jeniskoperasi_m->save();
				redirect('jeniskoperasi');
			}

		}

	function edit() 
	{
		$this->form_validation->set_rules('nama', 'Jenis Koperasi', 'required|callback_jeniskoperasi_check'); 
		if ($this->form_validation->run() == FALSE)
		{			
			$id = $this->uri->segment(3);
			$data['jeniskoperasi'] = $this->db->get_where('tb_jenis_koperasi', array('id' => $id))->row_array();
			$this->templateadmin->load('template/dashboard', 'jeniskoperasi/edit_jeniskoperasi', $data);			
		}
		else
		{   
			$this->jeniskoperasi_m->update();
			redirect('jeniskoperasi');
		}

	}

    function jeniskoperasi_check(){
        $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_jenis_koperasi WHERE nama = '$post[nama]' AND id != '$post[id]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('jeniskoperasi_check', '{field} ini sudah dipakai');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	

	function delete() 
	{

	}
}