<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('ssp');
		$this->load->model('sertifikasi_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data()
	{

		// nama table
		$table      = 'tb_sertifikasi';
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
	               		return anchor('sertifikasi/edit/'.$d, '<i class="icon ion-ios-create"></i>','class="btn btn-xs btn-primary" data-placement="top" title="Edit"');
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
		$this->templateadmin->load('template/dashboard', 'sertifikasi/data_sertifikasi');
	
	}

	function add()//butuh form validation untuk menghindari no akun yang sama
		{
			$this->form_validation->set_rules('nama', 'Sertifikasi', 'required|is_unique[tb_sertifikasi.nama]', [
				'is_unique' => '%s sudah ada. Silahkan isikan Sertifikasi lainnya',
			]); // Unique Field

            // $this->form_validation->set_rules('kode', 'Kode Pelatihan', 'required|callback_no_check'); // Unique Field

			// $this->form_validation->set_rules('kode', 'Kode Pelatihan', 'required'); // Unique Field

			// $this->form_validation->set_rules('uraian', 'Keterangan', 'required'); // Unique Field

			if ($this->form_validation->run() == FALSE)
			{			
				$this->templateadmin->load('template/dashboard', 'sertifikasi/add_sertifikasi');			
			}
			else
			{   
				$this->sertifikasi_m->save();
				redirect('sertifikasi');
			}

		}

	function edit() 
	{
		$this->form_validation->set_rules('nama', 'Sertifikasi', 'required|callback_sertifikasi_check'); 
		if ($this->form_validation->run() == FALSE)
		{			
			$id = $this->uri->segment(3);
			$data['sertifikasi'] = $this->db->get_where('tb_sertifikasi', array('id' => $id))->row_array();
			$this->templateadmin->load('template/dashboard', 'sertifikasi/edit_sertifikasi', $data);			
		}
		else
		{   
			$this->sertifikasi_m->update();
			redirect('sertifikasi');
		}

	}

    function sertifikasi_check(){
        $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_sertifikasi WHERE nama = '$post[nama]' AND id != '$post[id]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('sertifikasi_check', '{field} ini sudah dipakai');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	

	function delete() 
	{

	}
}