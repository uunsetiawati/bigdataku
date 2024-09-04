<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use setasign\Fpdi\Fpdi;

class Pelatihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('ssp');
		$this->load->model('pelatihan_m');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
	}

	function data()
	{

		// nama table
		$table      = 'view_pelatihan';
		// nama PK
		$primaryKey = 'id';
		// list field yang mau ditampilkan
		$columns    = array(
			//tabel db(kolom di database) => dt(nama datatable di view)
			array('db' => 'id', 'dt' => 'id'),
			array('db' => 'judul_pelatihan', 'dt' => 'judul'),
			array('db' => 'program', 'dt' 	=> 'program'),
			array('db' => 'divisi', 'dt' 	=> 'divisi'),
			array('db' => 'name', 'dt' 	=> 'alamat'),
	        array('db' => 'sasaran', 'dt' => 'sasaran'),
			array('db' => 'tgl_mulai', 'dt' => 'tanggalmulai'),
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

					$data['pelatihan'] = $this->db->get_where('view_pelatihan', array('kodeunik' => $d))->row_array();
					// Check if the result is not empty
					if (!empty($data['pelatihan'])) {
						$sasaran = $data['pelatihan']['sasaran'];
			
						if ($sasaran == 'UKM') {
							return anchor('peserta/add_peserta/'.$d, '<i class="icon ion-ios-share"></i>', 'class="btn btn-xs btn-primary" target="_blank" id="text-copy" onclick="copyText()" data-placement="top" title="Share Form"');
						} elseif ($sasaran == 'SAFARI PODCAST') {
							return anchor('peserta/add_peserta_podcast/'.$d, '<i class="icon ion-ios-share"></i>', 'class="btn btn-xs btn-primary" target="_blank" id="text-copy" onclick="copyText()" data-placement="top" title="Share Form"');
						} elseif ($sasaran == 'KOPERASI') {
							return anchor('peserta/add_peserta/'.$d, '<i class="icon ion-ios-share"></i>', 'class="btn btn-xs btn-primary" target="_blank" id="text-copy" onclick="copyText()" data-placement="top" title="Share Form"');
						}
					}
			
					// Default case (return an empty string or another default value)
					return '';

						 
			  }
		  	),
			  array(
				'db' => 'kodeunik',
				'dt' => 'lihat',
				'formatter' => function($d) {
						 return anchor('peserta/viewdatapeserta/'.$d, '<i class="icon ion-ios-people"></i>','class="btn btn-xs btn-warning" data-placement="top" title="Lihat Peserta"');
			  }
		  	),
			  array(
				'db' => 'kodeunik',
				'dt' => 'narsum',
				'formatter' => function($d) {
						 return anchor('narasumber/viewdatanarsum/'.$d, '<i class="icon ion-ios-person"></i>','class="btn btn-xs btn-danger" data-placement="top" title="Narasumber"');
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
		$this->templateadmin->load('template/dashboard', 'pelatihan/data_pelatihan');
	
	}

	function add()//butuh form validation untuk menghindari no akun yang sama
		{
			// $this->form_validation->set_rules('no_akun', 'No Akun', 'required|is_unique[tbl_saldoawaldetail.no_akun]', [
			// 	'is_unique' => '%s sudah ada. Silahkan isikan Nomor Akun lainnya',
			// ]); // Unique Field

			$this->form_validation->set_rules('judul', 'Judul', 'required'); // Unique Field
			$this->form_validation->set_rules('alamat', 'Alamat', 'required'); // Unique Field
			$this->form_validation->set_rules('kota', 'Kab/Kota', 'required'); // Unique Field			
			$this->form_validation->set_rules('program', 'Program Kode Anggaran', 'required'); // Unique Field
			$this->form_validation->set_rules('kegiatan', 'Kegiatan Kode Anggaran', 'required'); // Unique Field
			$this->form_validation->set_rules('subkegiatan', 'Sub Kegaitan Kode Anggaran', 'required'); // Unique Field

			if ($this->form_validation->run() == FALSE)
			{			
				$this->templateadmin->load('template/dashboard', 'pelatihan/add_pelatihan');			
			}
			else
			{   
				$this->pelatihan_m->save();
				redirect('pelatihan');
			}

			// if (isset($_POST['submit'])) {
			// 	$this->model_saldoawaldetail->save();
			// 	redirect('saldoawaldetail');
			// } else {
			// 	$this->template->load('template', 'saldoawaldetail/add');
			// }
		}

	function edit() 
	{

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

	function edit2()
		{
			
			// if ($this->form_validation->run() == FALSE)
			// {			
			// 	$id     = $this->uri->segment(3);
			// 	$data['test']  = $this->db->get_where('tb_test', array('id' => $id))->row_array();
			// 	$this->templateadmin->load('template/dashboard', 'pelatihan/test', $data);				


			// }
			// else
			// {   
			// 	$this->pelatihan_m->test();
			// 	redirect('dashboard');
			// }

			
			// if (isset($_POST['submit'])) {
			// 	$this->pelatihan_m->test();
			// 	redirect('dashboard');
			//   } else {
			// 	$id     = $this->uri->segment(3);
			// 	$data['saldoawal']  = $this->db->get_where('tb_test', array('id' => $id))->row_array();
			// 	$this->template->load('template/dashboard', 'pelatihan/test', $data);
			//   }


			// if ($this->form_validation->run() == FALSE)
			
			// 	{			
			// 		$id 		= $this->uri->segment(3);
			// 		$data['guru'] 	= $this->db->get_where('tb_test', array('id' => $id))->row_array();
			// 		$this->template->load('template/dashboard', 'pelatihan/test', $data);				
			// 	}
			// 	else
			// 	{   
			// 		$this->pelatihan_m->test();
			// 		redirect('dashboard');
			// 	}
			// }

			if ($this->form_validation->run() == FALSE)
			{			
				$id 		= $this->uri->segment(3);
				$data['saldoawal'] 	= $this->db->get_where('tb_test', array('id' => $id))->row_array();
				$this->load->view('pelatihan/test', $data);				
			}
			else
			{   
				$this->pelatihan_m->test();
				redirect('dashboard');
			}
			

		}

	function laporan()
		{
			// $this->load->view('view_peserta');
			$kodeunik=$this->uri->segment(3);
			$data['pelatihan']=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();
			$data['laporan']=$this->db->get_where('view_laporan', array('kodeunik' => $kodeunik))->row_array();
			$this->templateadmin->load('template/dashboard', 'laporan/data_laporan',$data);
		}

		function upload_sk($kodeunik)
		{		
			// Get data from URI and form inputs
			// $kodeunik = $this->uri->segment(3);
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik); // Pastikan fungsi ini ada
			if(!empty($laporan)){
				$this->edit_sk($kodeunik);
			}else{
				// File upload configuration
				$config['upload_path']   = './uploads/laporan/sk/'; // Define the path where the file will be stored
				$config['allowed_types'] = 'pdf'; // Only allow PDF files
				$config['max_size']      = 10000; // Set the maximum file size limit (in KB)
				$config['file_name']     = 'SK-' . $kodeunik; // Rename the file to include the unique code
			
				// Initialize upload library with the above configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
			
				// Check if the upload was successful
				if ($this->upload->do_upload('sk')) {
					// Get uploaded data if the upload is successful
					$upload = $this->upload->data();

					// Extract the file name to store in the database
					$file_name = $upload['file_name'];
			
					// Call the model method to save upload details to the database
					$this->pelatihan_m->upload_sk($file_name);
			
					// Redirect to the specified route after a successful upload
					redirect('pelatihan/laporan/' . $kodeunik);
				} else {
					// Display upload errors if the upload fails
					$error = $this->upload->display_errors('<p class="error">', '</p>');
					
					// Load the error view or handle it as per your needs
					echo $error;
				}
			}
		}

		function edit_sk($kodeunik)
		{
			// $kodeunik = $this->input->post('kodeunik');
			// $id_laporan=$this->input->post('id');
			
			// Path upload dan pengaturan file
			$upload_path = './uploads/laporan/sk/';
			$sk = [
				'upload_path'   => $upload_path,
				'allowed_types' => 'pdf',
				'max_size'      => 10000,
				'file_name'     => 'SK-' . $kodeunik,
			];

			// Inisialisasi upload
			$this->load->library('upload', $sk);
			$this->upload->initialize($sk);

			// Ambil data file lama dari database (sesuaikan sesuai field database)
			$laporan = $this->pelatihan_m->get_laporan_by_id($kodeunik); // Pastikan fungsi ini ada
			$file_lama = !empty($laporan['sk']) ? $upload_path . $laporan['sk'] : null;

			// Cek dan hapus file lama jika ada
			if ($file_lama && file_exists($file_lama)) {
				unlink($file_lama);
			}

			// Proses upload file baru
			if ($this->upload->do_upload('sk')) {
				$upload = $this->upload->data();
				$file_name = $upload['file_name']; // Nama file yang diupload

				// Update database dengan file baru
				$this->pelatihan_m->update_sk($kodeunik, $file_name); // Pastikan fungsi update sesuai dengan struktur database Anda

				redirect('pelatihan/laporan/' . $kodeunik);
			} else {
				// Tampilkan pesan kesalahan jika upload gagal
				$error = $this->upload->display_errors();
				echo "Error: " . $error;
			}
		}

		function upload_tor($kodeunik)
		{		

			// Get data from URI and form inputs
			// $kodeunik = $this->uri->segment(3);
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik); // Pastikan fungsi ini ada
			
		
			if(!empty($laporan)){
				$this->edit_tor($kodeunik);
			}else{
				// File upload configuration
				$config['upload_path']   = './uploads/laporan/tor/'; // Define the path where the file will be stored
				$config['allowed_types'] = 'pdf'; // Only allow PDF files
				$config['max_size']      = 10000; // Set the maximum file size limit (in KB)
				$config['file_name']     = 'TOR-' . $kodeunik; // Rename the file to include the unique code
			
				// Initialize upload library with the above configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				// Check if the upload was successful
				if ($this->upload->do_upload('tor')) {
					// Get uploaded data if the upload is successful
					$upload = $this->upload->data();

					// Extract the file name to store in the database
					$file_name = $upload['file_name'];
			
					// Call the model method to save upload details to the database
					$this->pelatihan_m->upload_tor($file_name);
			
					// Redirect to the specified route after a successful upload
					redirect('pelatihan/laporan/' . $kodeunik);
				} else {
					// Display upload errors if the upload fails
					$error = $this->upload->display_errors('<p class="error">', '</p>');
					
					// Load the error view or handle it as per your needs
					echo $error;
				}
			}
		}

		function edit_tor($kodeunik)
		{
			// $kodeunik = $this->input->post('kodeunik');
			$id_laporan=$this->input->post('id');
			
			// Path upload dan pengaturan file
			$upload_path = './uploads/laporan/tor/';
			$tor = [
				'upload_path'   => $upload_path,
				'allowed_types' => 'pdf',
				'max_size'      => 10000,
				'file_name'     => 'TOR-' . $kodeunik,
			];

			// Inisialisasi upload
			$this->load->library('upload', $tor);
			$this->upload->initialize($tor);

			// Ambil data file lama dari database (sesuaikan sesuai field database)
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik); // Pastikan fungsi ini ada
			$file_lama = !empty($laporan['tor']) ? $upload_path . $laporan['tor'] : null;

			// Cek dan hapus file lama jika ada
			if ($file_lama && file_exists($file_lama)) {
				unlink($file_lama);
			}

			// Proses upload file baru
			if ($this->upload->do_upload('tor')) {
				$upload = $this->upload->data();
				$file_name = $upload['file_name']; // Nama file yang diupload

				// Update database dengan file baru
				$this->pelatihan_m->update_tor($kodeunik, $file_name); // Pastikan fungsi update sesuai dengan struktur database Anda

				redirect('pelatihan/laporan/' . $kodeunik);
			} else {
				// Tampilkan pesan kesalahan jika upload gagal
				$error = $this->upload->display_errors();
				echo "Error: " . $error;
			}
		}

		function upload_laporan($kodeunik)
		{		

			// Get data from URI and form inputs
			// $kodeunik = $this->uri->segment(3);
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik); // Pastikan fungsi ini ada
			
		
			if(!empty($laporan)){
				$this->edit_laporan($kodeunik);
			}else{
				// File upload configuration
				$config['upload_path']   = './uploads/laporan/laporan/'; // Define the path where the file will be stored
				$config['allowed_types'] = 'pdf'; // Only allow PDF files
				$config['max_size']      = 10000; // Set the maximum file size limit (in KB)
				$config['file_name']     = 'LAPORAN-' . $kodeunik; // Rename the file to include the unique code
			
				// Initialize upload library with the above configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				// Check if the upload was successful
				if ($this->upload->do_upload('laporan')) {
					// Get uploaded data if the upload is successful
					$upload = $this->upload->data();

					// Extract the file name to store in the database
					$file_name = $upload['file_name'];
			
					// Call the model method to save upload details to the database
					$this->pelatihan_m->upload_laporan($file_name);
			
					// Redirect to the specified route after a successful upload
					redirect('pelatihan/laporan/' . $kodeunik);
				} else {
					// Display upload errors if the upload fails
					$error = $this->upload->display_errors('<p class="error">', '</p>');
					
					// Load the error view or handle it as per your needs
					echo $error;
				}
			}
		}

		function edit_laporan($kodeunik)
		{
			// $kodeunik = $this->input->post('kodeunik');
			$id_laporan=$this->input->post('id');
			
			// Path upload dan pengaturan file
			$upload_path = './uploads/laporan/laporan/';
			$laporan = [
				'upload_path'   => $upload_path,
				'allowed_types' => 'pdf',
				'max_size'      => 10000,
				'file_name'     => 'LAPORAN-' . $kodeunik,
			];

			// Inisialisasi upload
			$this->load->library('upload', $laporan);
			$this->upload->initialize($laporan);

			// Ambil data file lama dari database (sesuaikan sesuai field database)
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik); // Pastikan fungsi ini ada
			$file_lama = !empty($laporan['laporan']) ? $upload_path . $laporan['laporan'] : null;

			// Cek dan hapus file lama jika ada
			if ($file_lama && file_exists($file_lama)) {
				unlink($file_lama);
			}

			// Proses upload file baru
			if ($this->upload->do_upload('laporan')) {
				$upload = $this->upload->data();
				$file_name = $upload['file_name']; // Nama file yang diupload

				// Update database dengan file baru
				$this->pelatihan_m->update_laporan($kodeunik, $file_name); // Pastikan fungsi update sesuai dengan struktur database Anda

				redirect('pelatihan/laporan/' . $kodeunik);
			} else {
				// Tampilkan pesan kesalahan jika upload gagal
				$error = $this->upload->display_errors();
				echo "Error: " . $error;
			}
		}

		function upload_undangan($kodeunik)
		{		

			// Get data from URI and form inputs
			// $kodeunik = $this->uri->segment(3);
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik); // Pastikan fungsi ini ada
					
			if(!empty($laporan)){
				$this->edit_undangan($kodeunik);
			}else{
				// File upload configuration
				$config['upload_path']   = './uploads/laporan/undangan/'; // Define the path where the file will be stored
				$config['allowed_types'] = 'pdf'; // Only allow PDF files
				$config['max_size']      = 10000; // Set the maximum file size limit (in KB)
				$config['file_name']     = 'UNDANGAN-' . $kodeunik; // Rename the file to include the unique code
			
				// Initialize upload library with the above configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				// Check if the upload was successful
				if ($this->upload->do_upload('undangan')) {
					// Get uploaded data if the upload is successful
					$upload = $this->upload->data();

					// Extract the file name to store in the database
					$file_name = $upload['file_name'];
			
					// Call the model method to save upload details to the database
					$this->pelatihan_m->upload_undangan($file_name);
			
					// Redirect to the specified route after a successful upload
					redirect('pelatihan/laporan/' . $kodeunik);
				} else {
					// Display upload errors if the upload fails
					$error = $this->upload->display_errors('<p class="error">', '</p>');
					
					// Load the error view or handle it as per your needs
					echo $error;
				}
			}
		}

		function edit_undangan($kodeunik)
		{
			// $kodeunik = $this->input->post('kodeunik');
			$id_laporan=$this->input->post('id');
			
			// Path upload dan pengaturan file
			$upload_path = './uploads/laporan/undangan/';
			$undangan = [
				'upload_path'   => $upload_path,
				'allowed_types' => 'pdf',
				'max_size'      => 10000,
				'file_name'     => 'UNDANGAN-' . $kodeunik,
			];

			// Inisialisasi upload
			$this->load->library('upload', $undangan);
			$this->upload->initialize($undangan);

			// Ambil data file lama dari database (sesuaikan sesuai field database)
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik); // Pastikan fungsi ini ada
			$file_lama = !empty($laporan['undangan']) ? $upload_path . $laporan['undangan'] : null;

			// Cek dan hapus file lama jika ada
			if ($file_lama && file_exists($file_lama)) {
				unlink($file_lama);
			}

			// Proses upload file baru
			if ($this->upload->do_upload('undangan')) {
				$upload = $this->upload->data();
				$file_name = $upload['file_name']; // Nama file yang diupload

				// Update database dengan file baru
				$this->pelatihan_m->update_undangan($kodeunik, $file_name); // Pastikan fungsi update sesuai dengan struktur database Anda

				redirect('pelatihan/laporan/' . $kodeunik);
			} else {
				// Tampilkan pesan kesalahan jika upload gagal
				$error = $this->upload->display_errors();
				echo "Error: " . $error;
			}
		}

		function upload_jadwal($kodeunik)
		{		

			// Get data from URI and form inputs
			// $kodeunik = $this->uri->segment(3);
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik); // Pastikan fungsi ini ada
					
			if(!empty($laporan)){
				$this->edit_jadwal($kodeunik);
			}else{
				// File upload configuration
				$config['upload_path']   = './uploads/laporan/jadwal/'; // Define the path where the file will be stored
				$config['allowed_types'] = 'pdf'; // Only allow PDF files
				$config['max_size']      = 10000; // Set the maximum file size limit (in KB)
				$config['file_name']     = 'JADWAL-' . $kodeunik; // Rename the file to include the unique code
			
				// Initialize upload library with the above configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				// Check if the upload was successful
				if ($this->upload->do_upload('jadwal')) {
					// Get uploaded data if the upload is successful
					$upload = $this->upload->data();

					// Extract the file name to store in the database
					$file_name = $upload['file_name'];
			
					// Call the model method to save upload details to the database
					$this->pelatihan_m->upload_jadwal($file_name);
			
					// Redirect to the specified route after a successful upload
					redirect('pelatihan/laporan/' . $kodeunik);
				} else {
					// Display upload errors if the upload fails
					$error = $this->upload->display_errors('<p class="error">', '</p>');
					
					// Load the error view or handle it as per your needs
					echo $error;
				}
			}
		}

		function edit_jadwal($kodeunik)
		{
			// $kodeunik = $this->input->post('kodeunik');
			$id_laporan=$this->input->post('id');
			
			// Path upload dan pengaturan file
			$upload_path = './uploads/laporan/jadwal/';
			$jadwal = [
				'upload_path'   => $upload_path,
				'allowed_types' => 'pdf',
				'max_size'      => 10000,
				'file_name'     => 'JADWAL-' . $kodeunik,
			];

			// Inisialisasi upload
			$this->load->library('upload', $jadwal);
			$this->upload->initialize($jadwal);

			// Ambil data file lama dari database (sesuaikan sesuai field database)
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik); // Pastikan fungsi ini ada
			$file_lama = !empty($laporan['jadwal']) ? $upload_path . $laporan['jadwal'] : null;

			// Cek dan hapus file lama jika ada
			if ($file_lama && file_exists($file_lama)) {
				unlink($file_lama);
			}

			// Proses upload file baru
			if ($this->upload->do_upload('jadwal')) {
				$upload = $this->upload->data();
				$file_name = $upload['file_name']; // Nama file yang diupload

				// Update database dengan file baru
				$this->pelatihan_m->update_jadwal($kodeunik, $file_name); // Pastikan fungsi update sesuai dengan struktur database Anda

				redirect('pelatihan/laporan/' . $kodeunik);
			} else {
				// Tampilkan pesan kesalahan jika upload gagal
				$error = $this->upload->display_errors();
				echo "Error: " . $error;
			}
		}

		function downloadfull($kodeunik)
		{
			// Daftar file PDF yang ingin digabungkan
			$laporan = $this->pelatihan_m->get_laporan_by_kodeunik($kodeunik);
			// $upload_path = './uploads/laporan/';

			$file_sk = './uploads/laporan/sk/' . $laporan['sk'];
			$file_tor = './uploads/laporan/tor/' . $laporan['tor'];
			$file_laporan = './uploads/laporan/laporan/' . $laporan['laporan'];
			$file_undangan = './uploads/laporan/undangan/' . $laporan['undangan'];
			$file_jadwal = './uploads/laporan/jadwal/' . $laporan['jadwal'];
			$pdfFiles = [
				$file_sk,      // Path ke file SK
				$file_tor,     // Path ke file TOR
				$file_laporan,  // Path ke file LAPORAN
				$file_undangan,  // Path ke file UNDANGAN
				$file_jadwal  // Path ke file JADWAL
			];

			// Inisialisasi FPDI
			$pdf = new FPDI();

			// Loop melalui setiap file dan tambahkan halaman ke dokumen baru
			foreach ($pdfFiles as $file) {
				// Cek apakah file ada
				if (file_exists($file)) {
					$pageCount = $pdf->setSourceFile($file);
					for ($i = 1; $i <= $pageCount; $i++) {
						$templateId = $pdf->importPage($i);
						$size = $pdf->getTemplateSize($templateId);
						$pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
						$pdf->useTemplate($templateId);
					}
				} else {
					echo "File {$file} tidak ditemukan.";
					return;
				}
			}

			// $file_lama = !empty($laporan['fullversion']) ? $upload_path . $laporan['fullversion'] : null;

			// // Cek dan hapus file lama jika ada
			// if ($file_lama && file_exists($file_lama)) {
			// 	unlink($file_lama);
			// }

			// Set nama file yang akan disimpan
			$outputFileName = 'LAPORAN-' . $kodeunik . '.pdf';
			$outputFilePath = './uploads/laporan/' . $outputFileName;

			// Output PDF yang sudah digabungkan dan simpan ke file
			$pdf->Output('F', $outputFilePath);

			// Simpan nama file ke database
			$this->pelatihan_m->update_laporan_filename($kodeunik, $outputFileName);

			// Set headers untuk menampilkan PDF langsung di tab baru
			header('Content-Type: application/pdf');
			header('Content-Disposition: inline; filename="' . $outputFileName . '"');

			// Output PDF yang sudah digabungkan langsung ke browser
			readfile($outputFilePath);
		}



		

	function delete() 
	{

	}
}