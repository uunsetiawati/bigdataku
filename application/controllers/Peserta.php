<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->library('ssp');
		$this->load->model('peserta_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data()
	{
		check_not_login();
		// nama table
		$table      = 'tb_data_peserta';
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
		$this->templateadmin->load('template/dashboard', 'peserta/data_peserta');
	
	}

	function add()//butuh form validation untuk menghindari no akun yang sama
	{
		

		$kodeunik = $this->uri->segment(3);		
		if($kodeunik>0)
		{
			$query= $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik, 'status'=>'1'))->row_array();
			if($query>0)
			{
				$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|callback_noktp_check', [
					'is_unique' => '%s sudah terdaftar.',
				]); // Unique Field 
				$this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required|min_length[16]|max_length[16]'); // required
				$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required'); // required 
				$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required'); // required
				$this->form_validation->set_rules('alamat', 'Alamat', 'required'); // required
				$this->form_validation->set_rules('rt', 'RT', 'required'); // requierd
				$this->form_validation->set_rules('rw', 'RW', 'required'); // requierd
				$this->form_validation->set_rules('no_telp', 'No Telp/WA', 'required|min_length[10]|max_length[13]'); // requierd
				if ($this->form_validation->run() == FALSE)
				{			
					$kodeunik = $this->uri->segment(3);
					$data['peserta'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();
					$this->templateadmin->load('template/dashboard', 'peserta/add_peserta',$data);			
				}
				else
				{   
					$this->peserta_m->save();
					// redirect('peserta');
					echo "sukses";
				}
			}else{
				$this->templateadmin->load('template/dashboard', 'view_not_found');
			}

		}else{
			$this->templateadmin->load('template/dashboard', 'view_not_found');
		}

	}	

	function add_peserta($kodeunik)
	{

		$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|callback_noktp_check|min_length[16]|max_length[16]', [
			'is_unique' => '%s sudah terdaftar. Silahkan isikan Pemasaran lainnya',
		]); // Unique Field 
		$this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required'); // required
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required'); // required 
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required'); // required
		$this->form_validation->set_rules('alamat', 'Alamat', 'required'); // required
		$this->form_validation->set_rules('rt', 'RT', 'required'); // required
		$this->form_validation->set_rules('rw', 'RW', 'required'); // required
		$this->form_validation->set_rules('kota', 'Kab/Kota', 'required'); // required
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required'); // required
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required'); // required
		$this->form_validation->set_rules('no_telp', 'No Telp/WA', 'required|min_length[10]|max_length[13]'); // required

		if ($this->form_validation->run() == FALSE)
		{			
			
			// $kodeunik = $this->uri->segment(3);
			$data['peserta'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
			$this->templateadmin->load('template/dashboard', 'peserta/add_peserta',$data);	
						
		}
		else
		{   
			$this->peserta_m->save();
			// redirect('peserta');
			echo "sukses";
		}
	}	

	
	function noktp_check(){
        // $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE no_ktp = '$post[no_ktp]' AND id_pelatihan='$post[id_pel]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('noktp_check', '{field} ini sudah dipakai');
            return FALSE;
        }else {
            return TRUE;
        }
    }


	function edit() 
	{

	}

	function delete() 
	{

	}
}
