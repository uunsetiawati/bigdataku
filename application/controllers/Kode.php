<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('ssp');
		$this->load->model('kode_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data()
	{

		// nama table
		$table      = 'tb_kodekegiatan';
		// nama PK
		$primaryKey = 'id';
		// list field yang mau ditampilkan
		$columns    = array(
			//tabel db(kolom di database) => dt(nama datatable di view)
			array('db' => 'kode', 'dt' => 'kode'),
			array('db' => 'uraian', 'dt' 	=> 'uraian'),
	        //untuk menampilkan aksi(edit/delete dengan parameter kode mapel)
	        array(
	              'db' => 'id',
	              'dt' => 'aksi',
	              'formatter' => function($d) {
	               		return anchor('kode/edit/'.$d, '<i class="icon ion-ios-create"></i>','class="btn btn-xs btn-primary" data-placement="top" title="Edit"');
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
		$this->templateadmin->load('template/dashboard', 'kode/data_kode');
	
	}

	function add()//butuh form validation untuk menghindari no akun yang sama
		{
			$this->form_validation->set_rules('kode', 'Kode Pelatihan', 'required|is_unique[tb_kodekegiatan.kode]', [
				'is_unique' => '%s sudah ada. Silahkan isikan Kode Kegiatan lainnya',
			]); // Unique Field

            // $this->form_validation->set_rules('kode', 'Kode Pelatihan', 'required|callback_no_check'); // Unique Field

			// $this->form_validation->set_rules('kode', 'Kode Pelatihan', 'required'); // Unique Field

			$this->form_validation->set_rules('uraian', 'Keterangan', 'required'); // Unique Field

			if ($this->form_validation->run() == FALSE)
			{			
				$this->templateadmin->load('template/dashboard', 'kode/add_kode');			
			}
			else
			{   
				$this->kode_m->save();
				redirect('kode');
			}

		}

	function edit() 
	{
		$this->form_validation->set_rules('kode', 'Kode Kegiatan', 'required|callback_kode_check'); // Unique Field
		// $this->form_validation->set_rules('kode', 'Kode Pelatihan', 'required|is_unique[tb_kodekegiatan.kode]', [
		// 	'is_unique' => '%s sudah ada. Silahkan isikan Kode Kegiatan lainnya',
		// ]);

		$this->form_validation->set_rules('uraian', 'Uraian', 'required'); // Unique Field

		if ($this->form_validation->run() == FALSE)
		{			
			$id = $this->uri->segment(3);
			$data['kode'] = $this->db->get_where('tb_kodekegiatan', array('id' => $id))->row_array();
			$this->templateadmin->load('template/dashboard', 'kode/edit_kode', $data);			
		}
		else
		{   
			$this->kode_m->update();
			redirect('kode');
		}

	}

    function kode_check(){
        $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
        // $query = $this->db->query("SELECT * FROM tb_kodekegiatan WHERE no_akun = '$post[no_akun]' AND tahun = '$post[tahun]' AND id_user = '$id_user' AND id != '$post[id]'");
		$query = $this->db->query("SELECT * FROM tb_kodekegiatan WHERE kode = '$post[kode]' AND id != '$post[id]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('kode_check', '{field} ini sudah dipakai');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	

	function delete() 
	{

	}
}