<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tp extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->library('ssp');
		$this->load->model('tp_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}
	public function index()
	{
        $get_prov = $this->db->order_by('name','ASC')->select('*')->from('provinces')->get();
		$data['provinsi'] = $get_prov->result();
		$this->templateadmin->load('template/dashboard_p', 'tp/add_tp',$data);
	}

    function add()//butuh form validation untuk menghindari nik yang sama
		{	
			// check_not_login();
			$this->form_validation->set_rules('nik', 'NIK', 'required|callback_nik_check|min_length[16]|max_length[16]', [
				'is_unique' => '%s sudah terdaftar',
			]); // Unique Field 

			$this->form_validation->set_rules('no_telp', 'NO HP', 'required|min_length[10]|max_length[13]'); // Unique Field 
			$this->form_validation->set_rules('foto', 'FOTO', 'callback_validate_foto');
			$this->form_validation->set_rules('ktp', 'KTP', 'callback_validate_ktp');
            $this->form_validation->set_rules('kk', 'KK(KARTU KELUARGA)', 'callback_validate_kk');
            $this->form_validation->set_rules('skck', 'SKCK', 'callback_validate_skck');
            $this->form_validation->set_rules('ijazah', 'IJAZAH', 'callback_validate_ijazah');
            $this->form_validation->set_rules('rekening', 'REKENING', 'callback_validate_rekening');
            $this->form_validation->set_rules('bpjs', 'BPJS KESEHATAN', 'callback_validate_bpjs');
            $this->form_validation->set_rules('suket_kom', 'SURAT KETERANGAN KOMPUTER', 'callback_validate_suketkom');
            $this->form_validation->set_rules('suket_kerja', 'SURAT KETERANGAN KERJA', 'callback_validate_suketkerja');
            $this->form_validation->set_rules('sertifikat', 'SERTIFIKAT KOMPETENSI', 'callback_validate_sertifikat');
            $this->form_validation->set_rules('pernyataan', 'SURAT PERNYATAAN', 'callback_validate_pernyataan');

			if ($this->form_validation->run() == FALSE)
			{			
				// $datapelatihan=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();

				// if($datapelatihan > 0){
				// 	$data['pelatihan']=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();
				// 	$data['narsum'] = $this->db->get('tb_data_narsum')->row_array();					
				// 	$this->templateadmin->load('template/dashboard_p', 'narasumber/add_narasumber',$data);
						
				// }else{
				// 	$this->templateadmin->load('template/dashboard_p', 'narasumber/noevent');
				// }
                $get_prov = $this->db->order_by('name','ASC')->select('*')->from('provinces')->get();
			    $data['provinsi'] = $get_prov->result();
                $this->templateadmin->load('template/dashboard_p', 'tp/add_tp',$data);
							
			}
			else
			{   
				$uploadFoto = $this->upload_foto();
				$uploadKtp = $this->upload_ktp();
                $uploadKk = $this->upload_kk();
                $uploadSkck = $this->upload_skck();
                $uploadIjazah = $this->upload_ijazah();
                $uploadRekening = $this->upload_rekening();
                $uploadBpjs = $this->upload_bpjs();
                $uploadSuketkom = $this->upload_suketkom();
                $uploadSuketkerja = $this->upload_suketkerja();
                $uploadSertifikat = $this->upload_sertifikat();
                $uploadPernyataan = $this->upload_pernyataan();
				$this->tp_m->save($uploadFoto,$uploadKtp,$uploadKk,$uploadSkck,$uploadIjazah,$uploadRekening,$uploadBpjs,$uploadSuketkom,$uploadSuketkerja,$uploadSertifikat,$uploadPernyataan);
                // $this->tp_m->save();
				// redirect('narasumber/viewdatanarsum/'.$kodeunik);
				// echo "SUKSES MENGISI DATA NARASUMBER";
				$this->templateadmin->load('template/dashboard_p', 'tp/thankyou');
			}
		
		}

    function nik_check()
        {
            // $id_user= $this->session->userdata('id_user');
            $post = $this->input->post(null, TRUE);
            $query = $this->db->query("SELECT * FROM tb_tp WHERE nik = '$post[nik]'");
    
            if ($query->num_rows() > 0){
                $this->form_validation->set_message('nik_check', '{field} ini sudah mengisi form');
                return FALSE;
            }else {
                return TRUE;
            }
        }

    function upload_foto()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');

			//validasi foto yang di upload
			$foto['upload_path']          = './uploads/tp/foto/';
            $foto['allowed_types']        = 'gif|jpg|png|jpeg';
            $foto['max_size']             = 3000;
			$foto['file_name'] 			= $nama.'-'.$nik.'foto';
            $this->load->library('upload', $foto);

            //proses upload
            $this->upload->do_upload('foto');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

    function upload_ktp()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');

			//validasi foto yang di upload
			$ktp['upload_path']          = './uploads/tp/ktp/';
            $ktp['allowed_types']        = 'gif|jpg|png|jpeg';
            $ktp['max_size']             = 3000;
			$ktp['file_name'] 			= $nama.'-'.$nik.'ktp';
            $this->upload->initialize($ktp);

            //proses upload
            $this->upload->do_upload('ktp');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

	function upload_kk()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');
			//validasi foto yang di upload
			$kk['upload_path']          = './uploads/tp/kk/';
            $kk['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $kk['max_size']             = 3000;
			$kk['file_name'] 			 = $nama.'-'.$nik.'kk';
            // $this->load->library('upload', $config2);
			$this->upload->initialize($kk);

            //proses upload
            $this->upload->do_upload('kk');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

        function upload_skck()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');
			//validasi foto yang di upload
			$skck['upload_path']          = './uploads/tp/skck/';
            $skck['allowed_types']        = 'pdf';
            $skck['max_size']             = 3000;
			$skck['file_name'] 			 = $nama.'-'.$nik.'skck';
            // $this->load->library('upload', $config2);
			$this->upload->initialize($skck);

            //proses upload
            $this->upload->do_upload('skck');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

        function upload_ijazah()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');
			//validasi foto yang di upload
			$ijazah['upload_path']          = './uploads/tp/ijazah/';
            $ijazah['allowed_types']        = 'pdf';
            $ijazah['max_size']             = 3000;
			$ijazah['file_name'] 			 = $nama.'-'.$nik.'ijazah';
            // $this->load->library('upload', $config2);
			$this->upload->initialize($ijazah);

            //proses upload
            $this->upload->do_upload('ijazah');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

        function upload_rekening()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');
			//validasi foto yang di upload
			$rekening['upload_path']          = './uploads/tp/rekening/';
            $rekening['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $rekening['max_size']             = 3000;
			$rekening['file_name'] 			 = $nama.'-'.$nik.'rekening';
            // $this->load->library('upload', $config2);
			$this->upload->initialize($rekening);

            //proses upload
            $this->upload->do_upload('rekening');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

        function upload_bpjs()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');
			//validasi foto yang di upload
			$bpjs['upload_path']          = './uploads/tp/bpjs/';
            $bpjs['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $bpjs['max_size']             = 3000;
			$bpjs['file_name'] 			 = $nama.'-'.$nik.'bpjs';
            // $this->load->library('upload', $config2);
			$this->upload->initialize($bpjs);

            //proses upload
            $this->upload->do_upload('bpjs');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

        function upload_suketkom()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');
			//validasi foto yang di upload
			$suketkom['upload_path']          = './uploads/tp/suket_kom/';
            $suketkom['allowed_types']        = 'pdf';
            $suketkom['max_size']             = 3000;
			$suketkom['file_name'] 			 = $nama.'-'.$nik.'suketkom';
            // $this->load->library('upload', $config2);
			$this->upload->initialize($suketkom);

            //proses upload
            $this->upload->do_upload('suket_kom');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

        function upload_suketkerja()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');
			//validasi foto yang di upload
			$suketkerja['upload_path']          = './uploads/tp/suket_kerja/';
            $suketkerja['allowed_types']        = 'pdf';
            $suketkerja['max_size']             = 3000;
			$suketkerja['file_name'] 			 = $nama.'-'.$nik.'suketkerja';
            // $this->load->library('upload', $config2);
			$this->upload->initialize($suketkerja);

            //proses upload
            $this->upload->do_upload('suket_kerja');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

        function upload_sertifikat()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');
            $sertifikat_file_name = NULL;

            // Cek apakah file 'sertifikat' diupload
            if (!empty($_FILES['sertifikat']['name'])) {
			//validasi foto yang di upload
			$sertifikat['upload_path']          = './uploads/tp/sertifikat/';
            $sertifikat['allowed_types']        = 'pdf';
            $sertifikat['max_size']             = 3000;
			$sertifikat['file_name'] 			 = $nama.'-'.$nik.'sertifikat';
            // $this->load->library('upload', $config2);
			$this->upload->initialize($sertifikat);

            //proses upload
            $this->upload->do_upload('sertifikat');
            $upload = $this->upload->data();
            $sertifikat_file_name = $upload['file_name'];
            }
            return $sertifikat_file_name;
		}

        function upload_pernyataan()
		{
			$nik=$this->input->post('nik');
			$nama = $this->input->post('nama');
			//validasi foto yang di upload
			$pernyataan['upload_path']          = './uploads/tp/pernyataan/';
            $pernyataan['allowed_types']        = 'pdf';
            $pernyataan['max_size']             = 3000;
			$pernyataan['file_name'] 			 = $nama.'-'.$nik.'pernyataan';
            // $this->load->library('upload', $config2);
			$this->upload->initialize($pernyataan);

            //proses upload
            $this->upload->do_upload('pernyataan');
            $upload = $this->upload->data();
            return $upload['file_name'];
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
                $detectedType = get_mime_by_extension($_FILES['foto']['name']);
                $type = $_FILES['foto']['type'];
                if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('validate_foto', 'Konten Gambar Tidak Valid!');
                    $check = FALSE;
                }
                if (filesize($_FILES['foto']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_foto', 'Ukuran gambar tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_foto', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi jpg|png|jpeg");
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
                    $this->form_validation->set_message('validate_ktp', 'Konten Gambar Tidak Valid!');
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

    public function validate_kk()
        {
            $check = TRUE;
            if ((!isset($_FILES['kk'])) || $_FILES['kk']['size'] == 0) {
                $this->form_validation->set_message('validate_kk', '{field} wajib diisi');
                $check = FALSE;
            } else if (isset($_FILES['kk']) && $_FILES['kk']['size'] != 0) {
                $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf","JPG", "JPEG", "GIF", "PNG", "PDF");
                $extension = pathinfo($_FILES["kk"]["name"], PATHINFO_EXTENSION);
                $allowedTypes = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
                $detectedType = get_mime_by_extension($_FILES['kk']['name']);
                $type = $_FILES['kk']['type'];
                if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('validate_kk', 'Invalid Image Content!');
                    $check = FALSE;
                }
                if (filesize($_FILES['kk']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_kk', 'Ukuran gambar/file tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_kk', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi jpg|jpeg|png");
                    $check = FALSE;
                }
            }
            return $check;
        }

    public function validate_skck()
        {
            $check = TRUE;
            if ((!isset($_FILES['skck'])) || $_FILES['skck']['size'] == 0) {
                $this->form_validation->set_message('validate_skck', '{field} wajib diisi');
                $check = FALSE;
            } else if (isset($_FILES['skck']) && $_FILES['skck']['size'] != 0) {
                $allowedExts = array("pdf", "PDF");
                $extension = pathinfo($_FILES["skck"]["name"], PATHINFO_EXTENSION);
                $allowedTypes = array('application/pdf');
                $detectedType = get_mime_by_extension($_FILES['skck']['name']);
                $type = $_FILES['skck']['type'];
                if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('validate_skck', 'Invalid Image Content!');
                    $check = FALSE;
                }
                if (filesize($_FILES['skck']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_skck', 'Ukuran file tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_skck', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf");
                    $check = FALSE;
                }
            }
            return $check;
        }

    public function validate_ijazah()
        {
            $check = TRUE;
            if ((!isset($_FILES['ijazah'])) || $_FILES['ijazah']['size'] == 0) {
                $this->form_validation->set_message('validate_ijazah', '{field} wajib diisi');
                $check = FALSE;
            } else if (isset($_FILES['ijazah']) && $_FILES['ijazah']['size'] != 0) {
                $allowedExts = array("pdf", "PDF");
                $extension = pathinfo($_FILES["ijazah"]["name"], PATHINFO_EXTENSION);
                $allowedTypes = array('application/pdf');
                $detectedType = get_mime_by_extension($_FILES['ijazah']['name']);
                $type = $_FILES['ijazah']['type'];
                if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('validate_ijazah', 'Invalid Image Content!');
                    $check = FALSE;
                }
                if (filesize($_FILES['ijazah']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_ijazah', 'Ukuran file tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_ijazah', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf");
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
                    $this->form_validation->set_message('validate_rekening', 'Invalid Image Content!');
                    $check = FALSE;
                }
                if (filesize($_FILES['rekening']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_rekening', 'Ukuran gambar/file tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_rekening', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi jpg|jpeg|png");
                    $check = FALSE;
                }
            }
            return $check;
        }

    public function validate_bpjs()
        {
            $check = TRUE;
            if ((!isset($_FILES['bpjs'])) || $_FILES['bpjs']['size'] == 0) {
                $this->form_validation->set_message('validate_bpjs', '{field} wajib diisi');
                $check = FALSE;
            } else if (isset($_FILES['bpjs']) && $_FILES['bpjs']['size'] != 0) {
                $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf","JPG", "JPEG", "GIF", "PNG", "PDF");
                $extension = pathinfo($_FILES["bpjs"]["name"], PATHINFO_EXTENSION);
                $allowedTypes = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
                $detectedType = get_mime_by_extension($_FILES['bpjs']['name']);
                $type = $_FILES['bpjs']['type'];
                if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('validate_bpjs', 'Invalid Image Content!');
                    $check = FALSE;
                }
                if (filesize($_FILES['bpjs']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_bpjs', 'Ukuran gambar/file tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_bpjs', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi jpg|jpeg|png");
                    $check = FALSE;
                }
            }
            return $check;
        }

    public function validate_suketkom()
        {
            $check = TRUE;
            if ((!isset($_FILES['suket_kom'])) || $_FILES['suket_kom']['size'] == 0) {
                $this->form_validation->set_message('validate_suketkom', '{field} wajib diisi');
                $check = FALSE;
            } else if (isset($_FILES['suket_kom']) && $_FILES['suket_kom']['size'] != 0) {
                $allowedExts = array("pdf", "PDF");
                $extension = pathinfo($_FILES["suket_kom"]["name"], PATHINFO_EXTENSION);
                $allowedTypes = array('application/pdf');
                $detectedType = get_mime_by_extension($_FILES['suket_kom']['name']);
                $type = $_FILES['suket_kom']['type'];
                if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('validate_suketkom', 'Invalid Image Content!');
                    $check = FALSE;
                }
                if (filesize($_FILES['suket_kom']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_suketkom', 'Ukuran file tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_suketkom', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf");
                    $check = FALSE;
                }
            }
            return $check;
        }

    public function validate_suketkerja()
        {
            $check = TRUE;
            if ((!isset($_FILES['suket_kerja'])) || $_FILES['suket_kerja']['size'] == 0) {
                $this->form_validation->set_message('validate_suketkerja', '{field} wajib diisi');
                $check = FALSE;
            } else if (isset($_FILES['suket_kerja']) && $_FILES['suket_kerja']['size'] != 0) {
                $allowedExts = array("pdf", "PDF");
                $extension = pathinfo($_FILES["suket_kerja"]["name"], PATHINFO_EXTENSION);
                $allowedTypes = array('application/pdf');
                $detectedType = get_mime_by_extension($_FILES['suket_kerja']['name']);
                $type = $_FILES['suket_kerja']['type'];
                if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('validate_suketkerja', 'Invalid Image Content!');
                    $check = FALSE;
                }
                if (filesize($_FILES['suket_kerja']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_suketkerja', 'Ukuran file tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_suketkerja', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf");
                    $check = FALSE;
                }
            }
            return $check;
        }

    public function validate_sertifikat()
        {
            $check = TRUE;
            // if ((!isset($_FILES['sertifikat'])) || $_FILES['sertifikat']['size'] == 0) {
            //     $this->form_validation->set_message('validate_sertifikat', '{field} wajib diisi');
            //     $this->input->post('sertifikat')->null;
            //     $check = FALSE;
            if (isset($_FILES['sertifikat']) && $_FILES['sertifikat']['size'] != 0) {
                $allowedExts = array("pdf", "PDF");
                $extension = pathinfo($_FILES["sertifikat"]["name"], PATHINFO_EXTENSION);
                $allowedTypes = array('application/pdf');
                $detectedType = get_mime_by_extension($_FILES['sertifikat']['name']);
                $type = $_FILES['sertifikat']['type'];
                if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('validate_sertifikat', 'Invalid Image Content!');
                    $check = FALSE;
                }
                if (filesize($_FILES['sertifikat']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_sertifikat', 'Ukuran file tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_sertifikat', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf");
                    $check = FALSE;
                }
            }
            return $check;
        }

    public function validate_pernyataan()
        {
            $check = TRUE;
            if ((!isset($_FILES['pernyataan'])) || $_FILES['pernyataan']['size'] == 0) {
                $this->form_validation->set_message('validate_pernyataan', '{field} wajib diisi');
                $check = FALSE;
            } else if (isset($_FILES['pernyataan']) && $_FILES['pernyataan']['size'] != 0) {
                $allowedExts = array("pdf", "PDF");
                $extension = pathinfo($_FILES["pernyataan"]["name"], PATHINFO_EXTENSION);
                $allowedTypes = array('application/pdf');
                $detectedType = get_mime_by_extension($_FILES['pernyataan']['name']);
                $type = $_FILES['pernyataan']['type'];
                if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('validate_pernyataan', 'Invalid Image Content!');
                    $check = FALSE;
                }
                if (filesize($_FILES['pernyataan']['tmp_name']) > 3097152) {
                    $this->form_validation->set_message('validate_pernyataan', 'Ukuran file tidak boleh lebih dari 3MB!');
                    $check = FALSE;
                }
                if (!in_array($extension, $allowedExts)) {
                    $this->form_validation->set_message('validate_pernyataan', "Ekstensi .{$extension} salah , hanya boleh upload dengan ekstensi pdf");
                    $check = FALSE;
                }
            }
            return $check;
        }

function add_ajax_kab($id_prov)
	{
    	$query = $this->db->order_by('name','ASC')->get_where('regencies',array('province_id'=>$id_prov));
    	$data = "<option value=''>- PILIH KABUPATEN -</option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id."'>".$value->name."</option>";
    	}
    	echo $data;
	}
  
	function add_ajax_kec($id_kab)
	{
    	$query = $this->db->order_by('name','ASC')->get_where('districts',array('regency_id'=>$id_kab));
    	$data = "<option value=''> - PILIH KECAMATAN - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id."'>".$value->name."</option>";
    	}
    	echo $data;
	}
  
	function add_ajax_des($id_kec)
	{
    	$query = $this->db->order_by('name','ASC')->get_where('villages',array('district_id'=>$id_kec));
    	$data = "<option value=''> - PILIH KELURAHAN - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id."'>".$value->name."</option>";
    	}
    	echo $data;
	}

        
}
