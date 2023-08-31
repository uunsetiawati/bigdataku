<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesulitanusaha extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('ssp');
		$this->load->model('kesulitanusaha_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data()
	{

		// nama table
		$table      = 'tb_kesulitan_usaha';
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
	               		return anchor('kesulitanusaha/edit/'.$d, '<i class="icon ion-ios-create"></i>','class="btn btn-xs btn-primary" data-placement="top" title="Edit"');
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
		$this->templateadmin->load('template/dashboard', 'kesulitanusaha/data_kesulitanusaha');
	
	}

	function add()//butuh form validation untuk menghindari no akun yang sama
		{
			$this->form_validation->set_rules('nama', 'Kesulitan Usaha', 'required|is_unique[tb_kesulitan_usaha.nama]', [
				'is_unique' => '%s sudah ada. Silahkan isikan Kesulitan Usaha lainnya',
			]); // Unique Field            

			if ($this->form_validation->run() == FALSE)
			{			
				$this->templateadmin->load('template/dashboard', 'kesulitanusaha/add_kesulitanusaha');			
			}
			else
			{   
				$this->kesulitanusaha_m->save();
				redirect('kesulitanusaha');
			}

		}

	function edit() 
	{
		$this->form_validation->set_rules('nama', 'Kesulitan Usaha', 'required|callback_kesulitanusaha_check'); 
		if ($this->form_validation->run() == FALSE)
		{			
			$id = $this->uri->segment(3);
			$data['kesulitanusaha'] = $this->db->get_where('tb_kesulitan_usaha', array('id' => $id))->row_array();
			$this->templateadmin->load('template/dashboard', 'kesulitanusaha/edit_kesulitanusaha', $data);			
		}
		else
		{   
			$this->kesulitanusaha_m->update();
			redirect('kesulitanusaha');
		}

	}

    function kesulitanusaha_check(){
        $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_kesulitan_usaha WHERE nama = '$post[nama]' AND id != '$post[id]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('kesulitanusaha_check', '{field} ini sudah dipakai');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	

	function delete() 
	{

	}
}