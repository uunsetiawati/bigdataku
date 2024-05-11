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
	        array(
	              'db' => 'id',
	              'dt' => 'aksi',
	              'formatter' => function($d) use ($kodeunik){

					$data['pelatihan'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();
					// Check if the result is not empty
					if (!empty($data['pelatihan'])) {
						$sasaran = $data['pelatihan']['sasaran'];
			
						if ($sasaran == 'UKM' || 'KOPERASI') {
							return anchor('peserta/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-primary" data-placement="top" title="Edit"');
						} elseif ($sasaran == 'SAFARI PODCAST') {
							return anchor('peserta/edit_podcast/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-primary" data-placement="top" title="Edit"');
						}
					}
			
					// Default case (return an empty string or another default value)
					return '';	               		
	            	}
				),
				array(
					'db' => 'id',
					'dt' => 'validasi',
  
						'formatter' => function($d){
							$valid = $this->db->get_where('tb_data_peserta', array('id' => $d))->row_array();
							if(!empty($valid)){
								$validasi=$valid['validasi'];
								if($validasi=='VALID'){
									return anchor('peserta/validasi/'.$d, '<i class="icon ion-ios-checkmark"></i>','class="btn btn-xs btn-success" data-placement="top" title="validasi Peserta" onclick="return confirm(\'Apakah Anda yakin ingin menghapus validasi peserta ini?\')"');
								}elseif($validasi=='TIDAK' || $validasi==' ' || true){
									return anchor('peserta/validasii/'.$d, '<i class="icon ion-ios-close"></i>','class="btn btn-xs btn-danger" data-placement="top" title="validasi Peserta" onclick="return confirm(\'Apakah Anda yakin ingin validasi peserta ini?\')"');
								}
							}
								               		
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
			'is_unique' => '%s sudah terdaftar. Silahkan isikan %S lainnya',
		]); // Unique Field 
		$this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required'); // required
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required'); // required 
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required'); // required
		$this->form_validation->set_rules('alamat', 'Alamat', 'required'); // required
		$this->form_validation->set_rules('rt', 'RT', 'required'); // required
		$this->form_validation->set_rules('rw', 'RW', 'required'); // required
		// $this->form_validation->set_rules('kota', 'Kab/Kota', 'required'); // required
		// $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required'); // required
		// $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required'); // required
		$this->form_validation->set_rules('no_telp', 'No Telp/WA', 'required|min_length[10]|max_length[13]'); // required
		$this->form_validation->set_rules('foto', 'FOTO', 'callback_validate_foto'); // penamaan callback, calback_nama fungsi
		$this->form_validation->set_rules('foto_ktp', 'KTP', 'callback_validate_foto_ktp'); // penamaan callback, calback_nama fungsi

		if ($this->form_validation->run() == FALSE)
		{			
			
			// $kodeunik = $this->uri->segment(3);
			$data['peserta'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
			$data['izin'] = $this->db->get('tb_izin_usaha')->result();
			$data['masalah'] = $this->db->get('tb_permasalahan')->result();
			$data['kebutuhan'] = $this->db->get('tb_kebutuhan_diklat')->result();
			$data['sertifikasi'] = $this->db->get('tb_sertifikasi')->result();
			$get_prov = $this->db->order_by('name','ASC')->select('*')->from('provinces')->get();
			$data['provinsi'] = $get_prov->result();
			$datapelatihan=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
			if($datapelatihan > 0){
				if($datapelatihan['sasaran']=="UKM"){
					$this->templateadmin->load('template/dashboard_p', 'peserta/add_pesertaukm',$data);
				}else if($datapelatihan['sasaran']=="CALON WIRAUSAHA"){
					$this->templateadmin->load('template/dashboard_p', 'peserta/add_pesertacalonwirausaha',$data);
				}else if($datapelatihan['sasaran']=="SAFARI PODCAST"){
				$this->templateadmin->load('template/dashboard_p', 'peserta/add_peserta_podcast',$data);
				}else if($datapelatihan['sasaran']=="KOPERASI"){
					$this->templateadmin->load('template/dashboard_p', 'peserta/add_peserta_koperasi',$data);
				}
					
			}else{
				// echo 'Tidak ada pelatihan/pendaftaran pelatihan sudah memenuhi kuota';
				$this->templateadmin->load('template/dashboard_p', 'peserta/noevent');
				
			}
			
						
		}
		else
		{   
			
			// $checkbox = $this->input->post('sosmed_usaha');
			// $sosmed=implode(',',$checkbox);
			// $peserta=$this->db->where('kodeunik',$kodeunik);
			// $total_peserta=$this->db->count_all_results($peserta)+1;
			// $pesertaukm=$this->db->get_where('tb_data_peserta', array('kodeunik'=>$kodeunik))->row_array();
			// $total_peserta=$this->db->count_all_results($peserta)+1;
			$total_peserta = $this->db->where('kodeunik', $kodeunik)->count_all_results('tb_data_peserta') + 1;

			$uploadFoto = $this->upload_foto();
			$uploadKtp = $this->upload_ktp();

			// if($uploadFoto && $uploadKtp){
			// 	$data = [
			// 		'foto' => $uploadFoto,
        	// 		'ktp'  => $uploadKtp
			// 	];
			// 	$this->peserta_m->save($data);
			// }
							
			
			$this->peserta_m->save($uploadFoto,$uploadKtp,$total_peserta);
			
			// redirect('peserta');
			// echo "sukses";
			$this->thankyou($kodeunik);
		}
	}	

	function add_peserta_podcast($kodeunik)
	{
		$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|callback_noktp_check|min_length[16]|max_length[16]', [
			'is_unique' => '%s sudah terdaftar. Silahkan isikan %S lainnya',
		]); // Unique Field 
		$this->form_validation->set_rules('no_telp', 'Nomor TELP', 'required|callback_notelp_check|min_length[10]|max_length[13]', [
			'is_unique' => '%s sudah terdaftar. Silahkan isikan %S lainnya',
		]); 
		$this->form_validation->set_rules('foto', 'FOTO', 'callback_validate_foto'); // penamaan callback, calback_nama fungsi
		if ($this->form_validation->run() == FALSE)
		{			
			// $kodeunik = $this->uri->segment(3);
			$data['peserta'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
			$data['izin'] = $this->db->get('tb_izin_usaha')->result();
			$data['masalah'] = $this->db->get('tb_permasalahan')->result();
			$data['kebutuhan'] = $this->db->get('tb_kebutuhan_diklat')->result();
			$data['sertifikasi'] = $this->db->get('tb_sertifikasi')->result();
			$get_prov = $this->db->order_by('name','ASC')->select('*')->from('provinces')->get();
			$data['provinsi'] = $get_prov->result();
			$datapelatihan=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
			if($datapelatihan > 0){
				if($datapelatihan['sasaran']=="UKM"){
					$this->templateadmin->load('template/dashboard_p', 'peserta/add_pesertaukm',$data);
				}else if($datapelatihan['sasaran']=="CALON WIRAUSAHA"){
					$this->templateadmin->load('template/dashboard_p', 'peserta/add_pesertacalonwirausaha',$data);
				}else if($datapelatihan['sasaran']=="SAFARI PODCAST"){
				$this->templateadmin->load('template/dashboard_p', 'peserta/add_peserta_podcast',$data);
				}
					
			}else{
				// echo 'Tidak ada pelatihan/pendaftaran pelatihan sudah memenuhi kuota';
				$this->templateadmin->load('template/dashboard_p', 'peserta/noevent');
				
			}	
		}
		else
		{   
			$total_peserta = $this->db->where('kodeunik', $kodeunik)->count_all_results('tb_data_peserta') + 1;
			$uploadFoto = $this->upload_foto_podcast();			
			$this->peserta_m->save_podcast($uploadFoto,$total_peserta);
			$this->thankyou($kodeunik);
		}
	}	

	function add_pesertadewan($kodeunik)
	{

		$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|callback_noktp_check|min_length[16]|max_length[16]', [
			'is_unique' => '%s sudah terdaftar. Silahkan isikan %S lainnya',
		]); // Unique Field 
		$this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required'); // required
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required'); // required 
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required'); // required
		$this->form_validation->set_rules('alamat', 'Alamat', 'required'); // required
		$this->form_validation->set_rules('rt', 'RT', 'required'); // required
		$this->form_validation->set_rules('rw', 'RW', 'required'); // required
		// $this->form_validation->set_rules('kota', 'Kab/Kota', 'required'); // required
		// $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required'); // required
		// $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required'); // required
		$this->form_validation->set_rules('no_telp', 'No Telp/WA', 'required|min_length[10]|max_length[13]'); // required
		$this->form_validation->set_rules('foto', 'FOTO', 'callback_validate_foto'); // penamaan callback, calback_nama fungsi
		$this->form_validation->set_rules('foto_ktp', 'KTP', 'callback_validate_foto_ktp'); // penamaan callback, calback_nama fungsi

		if ($this->form_validation->run() == FALSE)
		{			
			
			// $kodeunik = $this->uri->segment(3);
			$data['peserta'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
			$data['izin'] = $this->db->get('tb_izin_usaha')->result();
			$data['masalah'] = $this->db->get('tb_permasalahan')->result();
			$data['kebutuhan'] = $this->db->get('tb_kebutuhan_diklat')->result();
			$data['sertifikasi'] = $this->db->get('tb_sertifikasi')->result();
			$get_prov = $this->db->order_by('name','ASC')->select('*')->from('provinces')->get();
			$data['provinsi'] = $get_prov->result();
			$datapelatihan=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
			if($datapelatihan > 0){
				if($datapelatihan['sasaran']=="UKM"){
					$this->templateadmin->load('template/dashboard_p', 'peserta/add_pesertacoba',$data);
				}else if($datapelatihan['sasaran']=="CALON WIRAUSAHA"){
					$this->templateadmin->load('template/dashboard_p', 'peserta/add_pesertacalonwirausaha',$data);
				}
					
			}else{
				// echo 'Tidak ada pelatihan/pendaftaran pelatihan sudah memenuhi kuota';
				$this->templateadmin->load('template/dashboard_p', 'peserta/noevent');
				
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
							
			
			$this->peserta_m->savedewan($uploadFoto,$uploadKtp);
			
			// redirect('peserta');
			// echo "sukses";
			$this->thankyou($kodeunik);
		}
	}	

	function upload_foto()
		{
			$kodeunik = $this->uri->segment(3);
			$ktp=$this->input->post('no_ktp');
			$nama = $this->input->post('nama_peserta');
			$total_peserta = $this->db->where('kodeunik', $kodeunik)->count_all_results('tb_data_peserta') + 1;

			//validasi foto yang di upload
			$config['upload_path']          = './uploads/peserta/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 3000;
			$config['file_name'] 			= $total_peserta.'-'.$kodeunik.'-'.$ktp;
            $this->load->library('upload', $config);

            //proses upload
            $this->upload->do_upload('foto');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_foto_podcast()
		{
			$kodeunik = $this->uri->segment(3);
			$telp=$this->input->post('no_telp');
			$total_peserta = $this->db->where('kodeunik', $kodeunik)->count_all_results('tb_data_peserta') + 1;

			//validasi foto yang di upload
			$config['upload_path']          = './uploads/peserta/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 3000;
			$config['file_name'] 			= $total_peserta.'-'.$kodeunik.'-'.$telp;
            $this->load->library('upload', $config);

            //proses upload
            $this->upload->do_upload('foto');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_ktp()
		{
			$kodeunik = $this->uri->segment(3);
			$ktp=$this->input->post('no_ktp');
			$nama = $this->input->post('nama_peserta');
			$total_peserta = $this->db->where('kodeunik', $kodeunik)->count_all_results('tb_data_peserta') + 1;
			//validasi foto yang di upload
			$config2['upload_path']          = './uploads/ktp/';
            $config2['allowed_types']        = 'gif|jpg|png|jpeg';
            $config2['max_size']             = 3000;
			$config2['file_name'] 			 = $total_peserta.'-'.$kodeunik.'-'.$ktp;
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

	function noktp_check_edit(){
        // $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE no_ktp = '$post[no_ktp]' AND id_pelatihan='$post[id_pel]' AND id != '$post[id]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('noktp_check_edit', '{field} ini sudah dipakai');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	function nourut_check_edit(){
        // $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE no_urut = '$post[no_urut]' AND id_pelatihan='$post[id_pel]' AND id != '$post[id]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('nourut_check_edit', '{field} ini sudah dipakai');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	function notelp_check(){
        // $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE no_telp = '$post[no_telp]' AND id_pelatihan='$post[id_pel]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('notelp_check', '{field} ini sudah mengisi');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	function notelp_check_edit(){
        // $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE no_telp = '$post[no_telp]' AND id_pelatihan='$post[id_pel]' AND id != '$post[id]' ");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('notelp_check_edit', '{field} ini sudah mengisi');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	public function validate_foto_ktp()
    {
        $check = TRUE;
        if ((!isset($_FILES['foto_ktp'])) || $_FILES['foto_ktp']['size'] == 0) {
            $this->form_validation->set_message('validate_foto_ktp', '{field} wajib diisi');
            $check = FALSE;
        } else if (isset($_FILES['foto_ktp']) && $_FILES['foto_ktp']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $extension = pathinfo($_FILES["foto_ktp"]["name"], PATHINFO_EXTENSION);
			$allowedTypes = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$detectedType = $_FILES['foto_ktp']['type'];
            $type = $_FILES['foto_ktp']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_foto_ktp', 'Invalid Image Content!');
                $check = FALSE;
            }
            if ($_FILES['foto_ktp']['size'] > 10485760) {
                $this->form_validation->set_message('validate_foto_ktp', 'Ukuran gambar tidak boleh lebih dari 3MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_foto_ktp', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi jpg|jpeg|png");
                $check = FALSE;
            }
        }
        return $check;
    }

	public function validate_foto()
    {
        $check = TRUE;
        if ((!isset($_FILES['foto'])) || $_FILES['foto']['size'] == 0) {
            $this->form_validation->set_message('validate_foto', '{field} wajib diisi');
            $check = FALSE;
        } else if (isset($_FILES['foto']) && $_FILES['foto']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
			$allowedTypes = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$detectedType = $_FILES['foto']['type'];
            $type = $_FILES['foto']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_foto', 'Invalid Image Content!');
                $check = FALSE;
            }
            if ($_FILES['foto']['size'] > 10485760) {
                $this->form_validation->set_message('validate_foto', 'Ukuran gambar tidak boleh lebih dari 3MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_foto', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi jpg|jpeg|png");
                $check = FALSE;
            }
        }
        return $check;
    }


	function edit() 
	{
		check_not_login();
		$this->form_validation->set_rules('no_urut', 'Nomor Urut', 'required|callback_nourut_check_edit', [
			'is_unique' => '%s sudah ada. Silahkan isikan No. Urut lainnya',
		]); // Unique Field 
		$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|callback_noktp_check_edit|min_length[16]|max_length[16]', [
			'is_unique' => '%s sudah terdaftar. Silahkan isikan No. KTP lainnya',
		]); // Unique Field 
		$this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required'); // required
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required'); // required 
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required'); // required
		$this->form_validation->set_rules('alamat', 'Alamat', 'required'); // required
		$this->form_validation->set_rules('rt', 'RT', 'required'); // required
		$this->form_validation->set_rules('rw', 'RW', 'required'); // required
		$this->form_validation->set_rules('no_telp', 'No Telp/WA', 'required|min_length[10]|max_length[13]'); // required
		if ($this->form_validation->run() == FALSE)
		{		
			$id = $this->uri->segment(3);				

			$prov=$this->peserta_m->getProv($id)->result();
			$kab=$this->peserta_m->getKab($id)->result();
			$kec=$this->peserta_m->getKec($id)->result();
			$kel=$this->peserta_m->getKel($id)->result();			
			foreach($prov as $row) {$data['provinsi']= $row->provinsi;}
			foreach($kab as $row) {$data['kabupaten']= $row->kabupaten;}
			foreach($kec as $row) {$data['kecamatan']= $row->kecamatan;}
			foreach($kel as $row) {$data['kelurahan']= $row->kelurahan;}

			$provkopukm=$this->peserta_m->getProvkopukm($id)->result();
			$kabkopukm=$this->peserta_m->getKabkopukm($id)->result();
			$keckopukm=$this->peserta_m->getKeckopukm($id)->result();
			$kelkopukm=$this->peserta_m->getKelkopukm($id)->result();	
			foreach($provkopukm as $row) {$data['provinsikopukm']= $row->provinsi;}
			foreach($kabkopukm as $row) {$data['kabupatenkopukm']= $row->kabupaten;}
			foreach($keckopukm as $row) {$data['kecamatankopukm']= $row->kecamatan;}
			foreach($kelkopukm as $row) {$data['kelurahankopukm']= $row->kelurahan;}

			$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE id = $id");
			if ($query->num_rows() > 0){
				$row = $query->row();
				$pelatihan = $this->db->get_where('tb_data_pelatihan', array('id' => $row->id_pelatihan))->row_array();
				$data['pelatihan'] = $pelatihan; 
				$data['peserta'] = $this->db->get_where('tb_data_peserta', array('id' => $id))->row_array();
				// $pelatihan=$this->db->get_where('tb_data_pelatihan', array('id' => $id))->row_array();
				if($pelatihan['sasaran']=="UKM"){
					$this->templateadmin->load('template/dashboard', 'peserta/edit_peserta_ukm', $data);	
				}else if($pelatihan['sasaran']=="KOPERASI"){
					$this->templateadmin->load('template/dashboard', 'peserta/edit_peserta_koperasi', $data);	
				}else if($pelatihan['sasaran']=="SAFARI PODCAST"){
					$this->templateadmin->load('template/dashboard', 'peserta/edit_peserta_podcast', $data);	
				}
			}

 			
					
			// echo $prov;

		}
		else
		{   
			$kodeunik=$this->input->post('kodeunik');
			$this->peserta_m->update();
			redirect('peserta/viewdatapeserta/'.$kodeunik);
			// echo $kodeunik;
		}

	}

	function edit_podcast() 
	{
		check_not_login();
		$this->form_validation->set_rules('no_urut', 'Nomor Urut', 'required|callback_nourut_check_edit', [
			'is_unique' => '%s sudah ada. Silahkan isikan No. Urut lainnya',
		]); // Unique Field
		$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|callback_noktp_check_edit|min_length[16]|max_length[16]', [
			'is_unique' => '%s sudah terdaftar. Silahkan isikan No. KTP lainnya',
		]); // Unique Field 
		$this->form_validation->set_rules('no_telp', 'No Telp/WA', 'required|callback_notelp_check_edit|min_length[10]|max_length[13]'); // required
		if ($this->form_validation->run() == FALSE)
		{		
			$id = $this->uri->segment(3);	
			$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE id = $id");
			if ($query->num_rows() > 0){
				$row = $query->row();
				$data['pelatihan'] = $this->db->get_where('tb_data_pelatihan', array('id' => $row->id_pelatihan))->row_array();
			}

			$prov=$this->peserta_m->getProv($id)->result();
			$kab=$this->peserta_m->getKab($id)->result();
			$kec=$this->peserta_m->getKec($id)->result();
			$kel=$this->peserta_m->getKel($id)->result();			
			foreach($prov as $row) {$data['provinsi']= $row->provinsi;}
			foreach($kab as $row) {$data['kabupaten']= $row->kabupaten;}
			foreach($kec as $row) {$data['kecamatan']= $row->kecamatan;}
			foreach($kel as $row) {$data['kelurahan']= $row->kelurahan;}

 			$data['peserta'] = $this->db->get_where('tb_data_peserta', array('id' => $id))->row_array();
			$this->templateadmin->load('template/dashboard', 'peserta/edit_peserta_podcast', $data);			
			// echo $prov;

		}
		else
		{   
			$kodeunik=$this->input->post('kodeunik');
			$this->peserta_m->update();
			redirect('peserta/viewdatapeserta/'.$kodeunik);
			// echo $kodeunik;
		}

	}

	function validasi() 
	{
		check_not_login();

		$id = $this->uri->segment(3);

		$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE id = $id");
		$row = $query->row();
		$update = $this->db->query("UPDATE tb_data_peserta SET validasi='TIDAK' WHERE id = $id");	
		
		// if (!empty($id)) {		
		// 	$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE id = $id");
		// 	$row = $query->row();	
		// 	if ($row && ($row->validasi == "TIDAK" || $row->validasi == " ")){
		// 		$update = $this->db->query("UPDATE tb_data_peserta SET validasi='VALID' WHERE id = $id");			
		// 	}elseif($row && ($row->validasi == "VALID")){
		// 		$query = $this->db->query("UPDATE tb_data_peserta SET validasi='TIDAK' WHERE id = $id");				
		// 	}
		// 	redirect('peserta/viewdatapeserta/'.$row->kodeunik);
		// }else {
		// 	echo "ID kosong";
		// }
		redirect('peserta/viewdatapeserta/'.$row->kodeunik);
	}

	function validasii() 
	{
		check_not_login();

		$id = $this->uri->segment(3);
		$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE id = $id");
		$row = $query->row();
		$update = $this->db->query("UPDATE tb_data_peserta SET validasi='VALID' WHERE id = $id");
		
		// if (!empty($id)) {		
		// 	$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE id = $id");
		// 	$row = $query->row();	
		// 	if ($row && ($row->validasi == "TIDAK" || $row->validasi == " ")){
		// 		$update = $this->db->query("UPDATE tb_data_peserta SET validasi='VALID' WHERE id = $id");			
		// 	}elseif($row && ($row->validasi == "VALID")){
		// 		$query = $this->db->query("UPDATE tb_data_peserta SET validasi='TIDAK' WHERE id = $id");				
		// 	}
		// 	redirect('peserta/viewdatapeserta/'.$row->kodeunik);
		// }else {
		// 	echo "ID kosong";
		// }
		redirect('peserta/viewdatapeserta/'.$row->kodeunik);
	}

	function validasiall() 
	{
		check_not_login();

		$id = $this->uri->segment(3);

		$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE id = $id");
		$row = $query->row();
		$kodeunik = $row->kodeunik;
		$update = $this->db->query("UPDATE tb_data_peserta SET validasi='VALID' WHERE kodeunik = $id");	

		redirect('peserta/viewdatapeserta/'.$id);
	}

	function batalvalidasi() 
	{
		check_not_login();

		$id = $this->uri->segment(3);

		$query = $this->db->query("SELECT * FROM tb_data_peserta WHERE id = $id");
		$row = $query->row();
		$kodeunik = $row->kodeunik;
		$update = $this->db->query("UPDATE tb_data_peserta SET validasi='TIDAK' WHERE kodeunik = $id");	

		redirect('peserta/viewdatapeserta/'.$id);
	}

	function thankyou($kodeunik)
	{
		$data['pelatihan'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
		$this->templateadmin->load('template/dashboard_p', 'peserta/thankyou',$data);
	}

	function cek($kodeunik)
	{
		// $data['pelatihan'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
		// $this->templateadmin->load('template/dashboard_p', 'peserta/noevent');

		$peserta=$this->db->get_where('tb_data_peserta', array('kodeunik'=>$kodeunik))->row_array();
			// $total_peserta=$this->db->count_all_results($peserta)+1;
			$total_peserta = $this->db->where('kodeunik', $kodeunik)->count_all_results('tb_data_peserta') + 1;
			echo $total_peserta;
	}

	public function downloadFoto($kodeunik)
	{
		// Load the ZIP library
		$this->load->library('zip');

		// Array of image file paths (change these to your image file paths)
		$queryfoto = $this->db->get_where('tb_data_peserta', array('kodeunik' => $kodeunik))->result();
		
		

		// Populate $imagePaths with image paths
		foreach ($queryfoto as $query) {
		$imagePaths[] = './uploads/peserta/' . $query->foto; // Add image paths to the array
		}	
		

		// Add each image file to the ZIP archive
		foreach ($imagePaths as $image) {
			$this->zip->read_file($image);
		}

		// Name of the ZIP file to be downloaded
		$zipFileName = 'Foto-'.$kodeunik.'.zip';

		// Create the ZIP file
		$this->zip->download($zipFileName);
	}

	public function downloadKtp($kodeunik)
	{
		// Load the ZIP library
		$this->load->library('zip');

		// Array of image file paths (change these to your image file paths)
		$queryfoto = $this->db->get_where('tb_data_peserta', array('kodeunik' => $kodeunik))->result();
		
		

		// Populate $imagePaths with image paths
		foreach ($queryfoto as $query) {
		$imagePaths[] = './uploads/ktp/' . $query->ktp; // Add image paths to the array
		}	
		

		// Add each image file to the ZIP archive
		foreach ($imagePaths as $image) {
			$this->zip->read_file($image);
		}

		// Name of the ZIP file to be downloaded
		$zipFileName = 'KTP-'.$kodeunik.'.zip';

		// Create the ZIP file
		$this->zip->download($zipFileName);
	}

	function add_ajax_kab($id_prov)
	{
    	$query = $this->db->order_by('name','ASC')->get_where('regencies',array('province_id'=>$id_prov));
    	$data = "<option value=''> --PILIH KABUPATEN-- </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id."'>".$value->name."</option>";
    	}
    	echo $data;
	}
  
	function add_ajax_kec($id_kab)
	{
    	$query = $this->db->order_by('name','ASC')->get_where('districts',array('regency_id'=>$id_kab));
    	$data = "<option value=''> --PILIH KECAMATAN-- </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id."'>".$value->name."</option>";
    	}
    	echo $data;
	}
  
	function add_ajax_des($id_kec)
	{
    	$query = $this->db->order_by('name','ASC')->get_where('villages',array('district_id'=>$id_kec));
    	$data = "<option value=''> -- PILIH KELURAHAN -- </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id."'>".$value->name."</option>";
    	}
    	echo $data;
	}


}
