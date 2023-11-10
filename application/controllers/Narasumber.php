<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Narasumber extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->library('ssp');
		$this->load->model('narasumber_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data($kodeunik)
	{
		check_not_login();

		// nama table
		$table      = 'view_narasumber';
		// nama PK
		$primaryKey = 'id';
		// list field yang mau ditampilkan
		$columns    = array(
			//tabel db(kolom di database) => dt(nama datatable di view)
			array('db' => 'id', 'dt' => 'id'),
			array('db' => 'nama', 'dt' => 'nama'),
			array('db' => 'judul', 'dt' 	=> 'judul'),
	        //untuk menampilkan aksi(edit/delete dengan parameter kode mapel)
	        array(
	              'db' => 'id',
	              'dt' => 'aksi',
	              'formatter' => function($d) {
	               		return anchor('pelatihan/edit/'.$d, '<i class="icon ion-ios-create"></i>','class="btn btn-xs btn-success" data-placement="top" title="Edit"');
	            }
	        ),
			array(
				'db' => 'kodeunik',
				'dt' => 'share',
				'formatter' => function($d) {
						 return anchor('peserta/add_peserta/'.$d, '<i class="icon ion-ios-share"></i>','class="btn btn-xs btn-primary" id="text-copy" onclick="copyText()" data-placement="top" title="Share Form"');
			  }
		  	),
			  array(
				'db' => 'kodeunik',
				'dt' => 'lihat',
				'formatter' => function($d) {
						 return anchor('peserta/viewdatapeserta/'.$d, '<i class="icon ion-ios-eye"></i>','class="btn btn-xs btn-warning" data-placement="top" title="Lihat Peserta"');
			  }
		  	)
	    );

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

	public function index()	
	{
		check_not_login();
		// $this->load->view('view_peserta');
		$this->templateadmin->load('template/dashboard', 'narasumber/data_narasumber');
	
	}

	public function viewdatanarsum()
	{
		check_not_login();
		// $this->load->view('view_peserta');
		$kodeunik=$this->uri->segment(3);
		$data['narsum']=$this->db->get_where('tb_data_narsum', array('kodeunik' => $kodeunik))->row_array();
		$data['pelatihan']=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();
		$this->templateadmin->load('template/dashboard', 'narasumber/data_narasumber',$data);
	
	}

	function add($kodeunik)//butuh form validation untuk menghindari nik yang sama
		{
			// check_not_login();
			$this->form_validation->set_rules('nik', 'NIK', 'required|callback_nik_check|min_length[16]|max_length[16]', [
				'is_unique' => '%s sudah terdaftar',
			]); // Unique Field 

			$this->form_validation->set_rules('hp', 'NO HP', 'required|min_length[10]|max_length[13]'); // Unique Field 

			$this->form_validation->set_rules('materi', 'MATERI', 'callback_validate_materi2'); // penamaan callback, calback_nama fungsi

			$this->form_validation->set_rules('spt', 'SPT', 'callback_validate_spt'); // penamaan callback, calback_nama fungsi

			if ($this->form_validation->run() == FALSE)
			{			
				$datapelatihan=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();

				if($datapelatihan > 0){

					$data['narsum'] = $this->db->get('tb_data_narsum')->row_array();
					
					$this->templateadmin->load('template/dashboard_p', 'narasumber/add_narasumber',$data);
						
				}else{
					$this->templateadmin->load('template/dashboard_p', 'narasumber/noevent');
				}
							
			}
			else
			{   
				$uploadMateri = $this->upload_materi2();
				$uploadSpt = $this->upload_spt();
				$this->narasumber_m->simpan($uploadMateri,$uploadSpt);
				// redirect('narasumber/viewdatanarsum/'.$kodeunik);
				// echo "SUKSES MENGISI DATA NARASUMBER";
				$data['pelatihan'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
				$this->templateadmin->load('template/dashboard_p', 'narasumber/thankyou',$data);
			}
		}

	function add2($kodeunik)//butuh form validation untuk menghindari nik yang sama
	{
		// check_not_login();
		$this->form_validation->set_rules('nik', 'NIK', 'required|callback_nik_check|min_length[16]|max_length[16]', [
			'is_unique' => '%s sudah terdaftar',
		]); // Unique Field 
		$this->form_validation->set_rules('hp', 'NO HP', 'required|min_length[10]|max_length[13]'); // Unique Field 
		$this->form_validation->set_rules('ktp', 'KTP', 'callback_validate_ktp'); // penamaan callback, calback_nama fungsi

		$this->form_validation->set_rules('npwp', 'NPWP', 'callback_validate_npwp'); // penamaan callback, calback_nama fungsi

		$this->form_validation->set_rules('cv', 'CV', 'callback_validate_cv'); // penamaan callback, calback_nama fungsi

		$this->form_validation->set_rules('materi', 'MATERI', 'callback_validate_materi'); // penamaan callback, calback_nama fungsi

		$this->form_validation->set_rules('spt', 'SPT', 'callback_validate_spt'); // penamaan callback, calback_nama fungsi
		$this->form_validation->set_rules('rekening', 'Rekening', 'callback_validate_rekening'); // penamaan callback, calback_nama fungsi

		// $this->form_validation->set_rules('file', '', 'callback_file_check');

		if ($this->form_validation->run() == FALSE)
		{			
			$datapelatihan=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();

			if($datapelatihan > 0){

				$data['narsum'] = $this->db->get('tb_data_narsum')->row_array();
				$data['nik']=$this->input->post('nik');
				$this->templateadmin->load('template/dashboard_p', 'narasumber/add_narasumber2',$data);
					
			}else{
				// echo 'Tidak ada pelatihan tersebut';
				$this->templateadmin->load('template/dashboard_p', 'narasumber/noevent');
			}
						
		}
		else
		{   
			$uploadKtp = $this->upload_ktp();
			$uploadNpwp = $this->upload_npwp();
			$uploadCv = $this->upload_cv();
			$uploadMateri = $this->upload_materi();
			$uploadSpt = $this->upload_spt();
			$uploadRekening = $this->upload_rekening();
			$this->narasumber_m->save($uploadKtp,$uploadNpwp,$uploadCv,$uploadMateri,$uploadSpt,$uploadRekening);
			// redirect('narasumber/viewdatanarsum/'.$kodeunik);
			// echo "SUKSES MENGISI DATA NARASUMBER";
			$data['pelatihan'] = $this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik,'status'=>'1'))->row_array();
			$this->templateadmin->load('template/dashboard_p', 'narasumber/thankyou',$data);
		}
	}

	function upload_ktp()
		{
			$kodeunik = $this->uri->segment(3);
			$nik=$this->input->post('nik');

			//validasi foto yang di upload
			$ktp['upload_path']          = './uploads/narasumber/ktp/';
            $ktp['allowed_types']        = 'gif|jpg|png|jpeg';
            $ktp['max_size']             = 3000;
			$ktp['file_name'] 			= $kodeunik.'-'.$nik;
            $this->load->library('upload', $ktp);

			// if (!$this->upload->do_upload('ktp')) {
			// 	// Pengungahan gagal, ambil pesan kesalahan
			// 	$data['error'] = $this->upload->display_errors();
			// } else {
			// 	// Pengungahan berhasil
			// 	$upload = $this->upload->data();
            // 	return $upload['file_name'];
			// }

            //proses upload
            $this->upload->do_upload('ktp');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_npwp()
		{
			$kodeunik = $this->uri->segment(3);
			$nik=$this->input->post('nik');
			//validasi foto yang di upload
			$config2['upload_path']          = './uploads/narasumber/npwp/';
            $config2['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $config2['max_size']             = 3000;
			$config2['file_name'] 			 = $kodeunik.'-'.$nik;
            // $this->load->library('upload', $config2);
			$this->upload->initialize($config2);

            //proses upload
            $this->upload->do_upload('npwp');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_cv()
		{
			$kodeunik = $this->uri->segment(3);
			$nik=$this->input->post('nik');
			//validasi foto yang di upload
			$cv['upload_path']          = './uploads/narasumber/cv/';
            $cv['allowed_types']        = 'pdf';
            $cv['max_size']             = 3000;
			$cv['file_name'] 			= $kodeunik.'-'.$nik;
            // $this->load->library('upload', $config2);
			$this->upload->initialize($cv);

            //proses upload
            $this->upload->do_upload('cv');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_materi()
		{
			$kodeunik = $this->uri->segment(3);
			$nik=$this->input->post('nik');
			//validasi foto yang di upload
			$materi['upload_path']          = './uploads/narasumber/materi/';
            $materi['allowed_types']        = 'pdf|ppt|pptx';
            $materi['max_size']             = 10000;
			$materi['file_name'] 			= $kodeunik.'-'.$nik;
            // $this->load->library('upload', $config2);
			$this->upload->initialize($materi);

            //proses upload
            $this->upload->do_upload('materi');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_materi2()
		{
			$kodeunik = $this->uri->segment(3);
			$nik=$this->input->post('nik');
			//validasi foto yang di upload
			$materi['upload_path']          = './uploads/narasumber/materi/';
            $materi['allowed_types']        = 'pdf|ppt|pptx';
            $materi['max_size']             = 10000;
			$materi['file_name'] 			= $kodeunik.'-'.$nik;
            $this->load->library('upload', $materi);
			// $this->upload->initialize($materi);

            //proses upload
            $this->upload->do_upload('materi');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_spt()
		{
			$kodeunik = $this->uri->segment(3);
			$nik=$this->input->post('nik');
			//validasi foto yang di upload
			$spt['upload_path']          = './uploads/narasumber/spt/';
            $spt['allowed_types']        = 'pdf|doc|docx';
            $spt['max_size']             = 3000;
			$spt['file_name'] 			= $kodeunik.'-'.$nik;
            // $this->load->library('upload', $config2);
			$this->upload->initialize($spt);

            //proses upload
            $this->upload->do_upload('spt');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_rekening()
		{
			$kodeunik = $this->uri->segment(3);
			$nik=$this->input->post('nik');
			//validasi foto yang di upload
			$rekening['upload_path']          = './uploads/narasumber/rekening/';
            $rekening['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $rekening['max_size']             = 3000;
			$rekening['file_name'] 			= $kodeunik.'-'.$nik;
            // $this->load->library('upload', $config2);
			$this->upload->initialize($rekening);

            //proses upload
            $this->upload->do_upload('rekening');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	
		public function file_check($str){
			$allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$mime = get_mime_by_extension($_FILES['file']['name']);
			if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
				return false;
			}
		}


	//method validate image yang nantinya akan di panggil dalam validasi form menggunakan callback
    public function validate_image()
    {
        $check = TRUE;
        if ((!isset($_FILES['FileUpload'])) || $_FILES['FileUpload']['size'] == 0) {
            $this->form_validation->set_message('validate_image', 'The {field} field is required');
            $check = FALSE;
        } else if (isset($_FILES['FileUpload']) && $_FILES['FileUpload']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["FileUpload"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['FileUpload']['tmp_name']);
            $type = $_FILES['FileUpload']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['FileUpload']['tmp_name']) > 2097152) {
                $this->form_validation->set_message('validate_image', 'The Image file size shoud not exceed 2MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image', "Invalid file extension {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

	public function validate_ktp()
    {
        $check = TRUE;
        if ((!isset($_FILES['ktp'])) || $_FILES['ktp']['size'] == 0) {
            $this->form_validation->set_message('validate_ktp', '{field} wajib diisi');
            $check = FALSE;
        } else if (isset($_FILES['ktp']) && $_FILES['ktp']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $extension = pathinfo($_FILES["ktp"]["name"], PATHINFO_EXTENSION);
			$allowedTypes = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$detectedType = get_mime_by_extension($_FILES['ktp']['name']);
            $type = $_FILES['ktp']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_ktp', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['ktp']['tmp_name']) > 3097152) {
                $this->form_validation->set_message('validate_ktp', 'Ukuran gambar tidak boleh lebih dari 3MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_ktp', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi jpg|jpeg|png");
                $check = FALSE;
            }
        }
        return $check;
    }

	public function validate_npwp()
    {
        $check = TRUE;
        if ((!isset($_FILES['npwp'])) || $_FILES['npwp']['size'] == 0) {
            $this->form_validation->set_message('validate_npwp', '{field} wajib diisi');
            $check = FALSE;
        } else if (isset($_FILES['npwp']) && $_FILES['npwp']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf","JPG", "JPEG", "GIF", "PNG", "PDF");
            $extension = pathinfo($_FILES["npwp"]["name"], PATHINFO_EXTENSION);
			$allowedTypes = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$detectedType = get_mime_by_extension($_FILES['npwp']['name']);
            $type = $_FILES['npwp']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_npwp', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['npwp']['tmp_name']) > 3097152) {
                $this->form_validation->set_message('validate_npwp', 'Ukuran gambar tidak boleh lebih dari 3MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_npwp', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi jpg|jpeg|png");
                $check = FALSE;
            }
        }
        return $check;
    }

	public function validate_cv()
    {
        $check = TRUE;
        if ((!isset($_FILES['cv'])) || $_FILES['cv']['size'] == 0) {
            $this->form_validation->set_message('validate_cv', '{field} wajib diisi');
            $check = FALSE;
        } else if (isset($_FILES['cv']) && $_FILES['cv']['size'] != 0) {
            $allowedExts = array("pdf", "PDF");
            $extension = pathinfo($_FILES["cv"]["name"], PATHINFO_EXTENSION);
			$allowedTypes = array('application/pdf');
			$detectedType = get_mime_by_extension($_FILES['cv']['name']);
            $type = $_FILES['cv']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_cv', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['cv']['tmp_name']) > 3097152) {
                $this->form_validation->set_message('validate_cv', 'Ukuran gambar tidak boleh lebih dari 3MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_cv', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf");
                $check = FALSE;
            }
        }
        return $check;
    }

	public function validate_materi()
    {
        $check = TRUE;
        if ((!isset($_FILES['materi'])) || $_FILES['materi']['size'] == 0) {
            $this->form_validation->set_message('validate_materi', '{field} wajib diisi');
            $check = FALSE;
        } else if (isset($_FILES['materi']) && $_FILES['materi']['size'] != 0) {
            $allowedExts = array("pdf", "ppt", "pptx", "PPT", "PDF", "PPT", "PPTX");
            $extension = pathinfo($_FILES["materi"]["name"], PATHINFO_EXTENSION);
			$allowedTypes = array('application/pdf','application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.presentationml.presentation');
			$detectedType = get_mime_by_extension($_FILES['materi']['name']);
            $type = $_FILES['materi']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_materi', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['materi']['tmp_name']) > 10097152) {
                $this->form_validation->set_message('validate_materi', 'Ukuran file tidak boleh lebih dari 10MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_materi', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf|ppt|pptx");
                $check = FALSE;
            }
        }
        return $check;
    }

	public function validate_materi2()
    {
        $check = TRUE;
        if ((!isset($_FILES['materi'])) || $_FILES['materi']['size'] == 0) {
            $this->form_validation->set_message('validate_materi2', '{field} wajib diisi');
            $check = FALSE;
        } else if (isset($_FILES['materi']) && $_FILES['materi']['size'] != 0) {
            $allowedExts = array("pdf", "ppt", "pptx", "PPT", "PDF", "PPT", "PPTX");
            $extension = pathinfo($_FILES["materi"]["name"], PATHINFO_EXTENSION);
			$allowedTypes = array('application/pdf','application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.presentationml.presentation');
			$detectedType = get_mime_by_extension($_FILES['materi']['name']);
            $type = $_FILES['materi']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_materi2', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['materi']['tmp_name']) > 10097152) {
                $this->form_validation->set_message('validate_materi2', 'Ukuran file tidak boleh lebih dari 10MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_materi2', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf|ppt|pptx");
                $check = FALSE;
            }
        }
        return $check;
    }

	public function validate_spt()
    {
        $check = TRUE;
        if ((!isset($_FILES['spt'])) || $_FILES['spt']['size'] == 0) {
            $this->form_validation->set_message('validate_spt', '{field} wajib diisi');
            $check = FALSE;
        } else if (isset($_FILES['spt']) && $_FILES['spt']['size'] != 0) {
            $allowedExts = array("pdf", "doc", "docx", "PDF", "DOC", "DOCX");
            $extension = pathinfo($_FILES["spt"]["name"], PATHINFO_EXTENSION);
			$allowedTypes = array('application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			$detectedType = get_mime_by_extension($_FILES['spt']['name']);
            $type = $_FILES['spt']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_spt', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['spt']['tmp_name']) > 3097152) {
                $this->form_validation->set_message('validate_spt', 'Ukuran file tidak boleh lebih dari 3MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_spt', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf|doc|docx");
                $check = FALSE;
            }
        }
        return $check;
    }

	public function validate_rekening()
    {
        $check = TRUE;
        if ((!isset($_FILES['rekening'])) || $_FILES['rekening']['size'] == 0) {
            $this->form_validation->set_message('validate_rekening', '{field} wajib diisi');
            $check = FALSE;
        } else if (isset($_FILES['rekening']) && $_FILES['rekening']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf","JPG", "JPEG", "GIF", "PNG", "PDF");
            $extension = pathinfo($_FILES["rekening"]["name"], PATHINFO_EXTENSION);
			$allowedTypes = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$detectedType = get_mime_by_extension($_FILES['rekening']['name']);
            $type = $_FILES['rekening']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_rekening', 'Invalid File Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['rekening']['tmp_name']) > 3097152) {
                $this->form_validation->set_message('validate_rekening', 'Ukuran file tidak boleh lebih dari 3MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_rekening', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi jpg|jpeg|png|pdf");
                $check = FALSE;
            }
        }
        return $check;
    }

	function edit() 
	{
		check_not_login();
		$this->form_validation->set_rules('judul', 'Judul', 'required'); // Unique Field
		$this->form_validation->set_rules('alamat', 'Alamat', 'required'); // Unique Field
		$this->form_validation->set_rules('kota', 'Kab/Kota', 'required'); // Unique Field
		$this->form_validation->set_rules('program', 'Program Kode Anggaran', 'required'); // Unique Field
		$this->form_validation->set_rules('kegiatan', 'Kegiatan Kode Anggaran', 'required'); // Unique Field
		$this->form_validation->set_rules('subkegiatan', 'Sub Kegaitan Kode Anggaran', 'required'); // Unique Field

		if ($this->form_validation->run() == FALSE)
		{			
			$id = $this->uri->segment(3);
			$data['pelatihan'] = $this->db->get_where('view_pelatihan', array('id' => $id))->row_array();
			$this->templateadmin->load('template/dashboard', 'pelatihan/edit_pelatihan', $data);			
		}
		else
		{   
			$this->pelatihan_m->update();
			redirect('pelatihan');
		}


		// if (isset($_POST['submit'])) {
		// 	$this->pelatihan_m->update();
		// 	redirect('pelatihan');
		//   } else {
		// 	$id_guru     = $this->uri->segment(3);
		// 	$data['pelatihan']  = $this->db->get_where('view_pelatihan', array('id' => $id_guru))->row_array();
		// 	$this->templateadmin->load('template/dashboard', 'pelatihan/edit', $data);
		//   }		

	}

	function nik_check(){
        // $id_user= $this->session->userdata('id_user');
        $post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tb_data_narsum WHERE nik = '$post[nik]' AND kodeunik='$post[kodeunik]'");

        if ($query->num_rows() > 0){
            $this->form_validation->set_message('nik_check', '{field} ini sudah terdaftar');
            return FALSE;
        }else {
            return TRUE;
        }
    }

	public function searchindex($kodeunik) {

        $this->templateadmin->load('template/dashboard_p', 'narasumber/search');
		
    }

	public function search($kodeunik) {
        $nik = $this->input->post('nikk'); // Ambil kata kunci dari input form
        // $data['results'] = $this->narasumber_m->search_data($nik)->row_array(); // Ganti 'your_model_name' dengan nama model yang sesuai
		// $data['narsum'] = $this->db->get('tb_data_narsum')->row_array();
		$data['kodeunik'] =$kodeunik;
		$data['nik']=$nik;


        // $this->load->view('search_view', $data); // Tampilkan tampilan hasil pencarian dengan data hasil pencarian
		$narsum=$this->db->get_where('tb_data_narsum', array('nik' => $nik))->row_array();

			if($narsum > 0){
				$data['narsum']=$this->db->get_where('tb_data_narsum', array('nik' => $nik))->row_array();
				$this->templateadmin->load('template/dashboard_p', 'narasumber/add_narasumber',$data);
					
			}else{				
				$this->templateadmin->load('template/dashboard_p', 'narasumber/add_narasumber2',$data);
			}

		
    }

	function delete() 
	{

	}
}