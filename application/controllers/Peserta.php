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

	function data($kodeunik)
	{
		check_not_login();

		// nama table
		$table      = 'view_peserta';
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
	        array(
	              'db' => 'id',
	              'dt' => 'aksi',
	              'formatter' => function($d) {
	               		return anchor('peserta/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-primary" data-placement="top" title="Edit"');
	            }
	        )
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

	public function indexx()
	{
		// $this->load->view('view_peserta');
		$this->templateadmin->load('template/dashboard', 'peserta/data_peserta');
	
	}
	public function viewdatapeserta()
	{
		check_not_login();
		// $this->load->view('view_peserta');
		$kodeunik=$this->uri->segment(3);
		$data['peserta']=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();
		$this->templateadmin->load('template/dashboard', 'peserta/data_peserta',$data);
	
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
			$data['izin'] = $this->db->get('tb_izin_usaha')->result();
			$data['masalah'] = $this->db->get('tb_permasalahan')->result();
			$data['kebutuhan'] = $this->db->get('tb_kebutuhan_diklat')->result();
			$data['sertifikasi'] = $this->db->get('tb_sertifikasi')->result();
			$datapelatihan=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
			if($datapelatihan > 0){
				$this->templateadmin->load('template/dashboard_p', 'peserta/add_peserta',$data);	
			}else{
				echo 'Tidak ada pelatihan/pendaftaran pelatihan sudah memenuhi kuota';
			}
			
						
		}
		else
		{   
			
			// $checkbox = $this->input->post('sosmed_usaha');
			// $sosmed=implode(',',$checkbox);

			$uploadFoto = $this->upload_foto();
			$uploadKtp = $this->upload_ktp();

			// if($uploadFoto && $uploadKtp){
			// 	$data = [
			// 		'foto' => $uploadFoto,
        	// 		'ktp'  => $uploadKtp
			// 	];
			// 	$this->peserta_m->save($data);
			// }
							
			
			$this->peserta_m->save($uploadFoto,$uploadKtp);
			
			// redirect('peserta');
			echo "sukses";
		}
	}	

	function upload_foto()
		{
			$kodeunik = $this->uri->segment(3);
			//validasi foto yang di upload
			$config['upload_path']          = './uploads/peserta/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 3000;
			$config['file_name'] 			= 'FOTOPESERTA'.'-'.$kodeunik.'-'.time();
            $this->load->library('upload', $config);

            //proses upload
            $this->upload->do_upload('foto');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_ktp()
		{
			$kodeunik = $this->uri->segment(3);
			//validasi foto yang di upload
			$config2['upload_path']          = './uploads/ktp/';
            $config2['allowed_types']        = 'gif|jpg|png|jpeg';
            $config2['max_size']             = 3000;
			$config2['file_name'] 			= 'KTPPESERTA'.'-'.$kodeunik.'-'.time();
            // $this->load->library('upload', $config2);
			$this->upload->initialize($config2);

            //proses upload
            $this->upload->do_upload('foto_ktp');
            $upload = $this->upload->data();
            return $upload['file_name'];
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
		if ($this->form_validation->run() == FALSE)
		{		
			$id = $this->uri->segment(3);	
			$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE id = $id");
			if ($query->num_rows() > 0){
				$row = $query->row();
				$data['pelatihan'] = $this->db->get_where('tb_data_pelatihan', array('id' => $row->id_pelatihan))->row_array();
			}
			
			$data['peserta'] = $this->db->get_where('tb_data_peserta', array('id' => $id))->row_array();
			$this->templateadmin->load('template/dashboard', 'peserta/edit_peserta', $data);			
		}
		else
		{   
			$this->peserta_m->update();
			redirect('peserta/viewdatapeserta');
		}

	}

	function delete() 
	{

	}
}
