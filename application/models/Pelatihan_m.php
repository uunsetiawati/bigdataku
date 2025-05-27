<?php

	class Pelatihan_m extends CI_Model
	{

		public $table ="tb_data_pelatihan";

		function save()
		{
			// date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
			// $now = date('Y-m-d H:i:s');
			$data = array(				
				//tabel di database => name di form
				'kodeunik'			=> date("Ymdhi"),				
				'program'   		=> $this->input->post('program', TRUE),
				'kegiatan'   		=> $this->input->post('kegiatan', TRUE),
				'subkegiatan'   	=> $this->input->post('subkegiatan', TRUE),
				'divisi'   			=> $this->input->post('divisi', TRUE),				
				'judul_pelatihan'   => $this->input->post('judul', TRUE),
				'alamat_pelatihan'  => $this->input->post('alamat', TRUE),
				'jenis_pelatihan'   => $this->input->post('jenis', TRUE),
				'kota'				=> $this->input->post('kota', TRUE),
				'tgl_mulai'        	=> $this->input->post('awal', TRUE),
				'tgl_akhir'			=> $this->input->post('akhir', TRUE),
				'sasaran'			=> $this->input->post('sasaran', TRUE),
				'status'			=> $this->input->post('status', TRUE),
				'created'			=> $this->input->post('now', TRUE)				
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(
				'divisi'   			=> $this->input->post('divisi', TRUE),
				'program'   		=> $this->input->post('program', TRUE),
				'kegiatan'   		=> $this->input->post('kegiatan', TRUE),
				'subkegiatan'   	=> $this->input->post('subkegiatan', TRUE),
				'judul_pelatihan'   => $this->input->post('judul', TRUE),
				'alamat_pelatihan'  => $this->input->post('alamat', TRUE),
				'kota'				=> $this->input->post('kota', TRUE),
				'jenis_pelatihan'   => $this->input->post('jenis', TRUE),				
				'tgl_mulai'        	=> $this->input->post('awal', TRUE),
				'tgl_akhir'			=> $this->input->post('akhir', TRUE),
				'sasaran'			=> $this->input->post('sasaran', TRUE),
				'status'			=> $this->input->post('status', TRUE),
				'modified'			=> $this->input->post('now', TRUE)
			);

			$id	= $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}

		function upload_sk($sk)
		{
			$data = array(
				'id_pelatihan'   	=> $this->input->post('id_pelatihan', TRUE),
				'kodeunik'   		=> $this->input->post('kodeunik', TRUE),
				'sk'   				=> $sk,
				'created'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->insert('tb_data_laporan', $data);
		}

		function update_sk($kodeunik,$sk)
		{
			$data = array(
				'sk'   				=> $sk,
				'modified'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->where('kodeunik', $kodeunik);
			$this->db->update('tb_data_laporan', $data);
		}

		function upload_tor($tor)
		{
			$data = array(
				'id_pelatihan'   	=> $this->input->post('id_pelatihan', TRUE),
				'kodeunik'   		=> $this->input->post('kodeunik', TRUE),
				'tor'   			=> $tor,
				'created'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->insert('tb_data_laporan', $data);
		}

		function update_tor($kodeunik,$tor)
		{
			$data = array(
				'tor'   			=> $tor,
				'modified'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->where('kodeunik', $kodeunik);
			$this->db->update('tb_data_laporan', $data);
		}

		function upload_laporan($laporan)
		{
			$data = array(
				'id_pelatihan'   	=> $this->input->post('id_pelatihan', TRUE),
				'kodeunik'   		=> $this->input->post('kodeunik', TRUE),
				'laporan'   		=> $laporan,
				'created'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->insert('tb_data_laporan', $data);
		}

		function update_laporan($kodeunik,$laporan)
		{
			$data = array(
				'laporan'   		=> $laporan,
				'modified'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->where('kodeunik', $kodeunik);
			$this->db->update('tb_data_laporan', $data);
		}

		function upload_undangan($undangan)
		{
			$data = array(
				'id_pelatihan'   	=> $this->input->post('id_pelatihan', TRUE),
				'kodeunik'   		=> $this->input->post('kodeunik', TRUE),
				'undangan'   		=> $undangan,
				'created'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->insert('tb_data_laporan', $data);
		}

		function update_undangan($kodeunik,$undangan)
		{
			$data = array(
				'undangan'   		=> $undangan,
				'modified'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->where('kodeunik', $kodeunik);
			$this->db->update('tb_data_laporan', $data);
		}
		
		function upload_jadwal($jadwal)
		{
			$data = array(
				'id_pelatihan'   	=> $this->input->post('id_pelatihan', TRUE),
				'kodeunik'   		=> $this->input->post('kodeunik', TRUE),
				'jadwal'   			=> $jadwal,
				'created'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->insert('tb_data_laporan', $data);
		}

		function update_jadwal($kodeunik,$jadwal)
		{
			$data = array(
				'jadwal'   			=> $jadwal,
				'modified'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->where('kodeunik', $kodeunik);
			$this->db->update('tb_data_laporan', $data);
		}
		// Fungsi untuk mengambil data laporan berdasarkan kodeunik
		public function get_laporan_by_id($id) 
		{
			// Query untuk mengambil data laporan berdasarkan kodeunik
			$this->db->select('id, sk, tor'); // Pilih kolom yang ingin diambil, sesuaikan dengan kebutuhan
			$this->db->from('tb_data_laporan'); // Ganti dengan nama tabel yang sesuai
			$this->db->where('id', $id);
			$query = $this->db->get();
	
			// Mengembalikan hasil query dalam bentuk array
			if ($query->num_rows() > 0) {
				return $query->row_array(); // Mengembalikan satu baris data dalam bentuk array
			} else {
				return null; // Mengembalikan null jika data tidak ditemukan
			}
		}
		public function get_laporan_by_kodeunik($kodeunik) {
			// Query untuk mengambil data laporan berdasarkan kodeunik
			$this->db->select('*'); // Pilih kolom yang ingin diambil, sesuaikan dengan kebutuhan
			$this->db->from('tb_data_laporan'); // Ganti dengan nama tabel yang sesuai
			$this->db->where('kodeunik', $kodeunik);
			$query = $this->db->get();
	
			// Mengembalikan hasil query dalam bentuk array
			if ($query->num_rows() > 0) {
				return $query->row_array(); // Mengembalikan satu baris data dalam bentuk array
			} else {
				return null; // Mengembalikan null jika data tidak ditemukan
			}
		}
		
		function update_laporan_filename($kodeunik, $outputFileName)
		{
			$data = array(
				'fullversion'   		=> $outputFileName,
				'modified'			=> $this->input->post('now', TRUE)		
				
			);	
			$this->db->where('kodeunik', $kodeunik);
			$this->db->update('tb_data_laporan', $data);
		}

		function test()
		{
		// $data = array(
		// 	//tabel di database => name di form
			
			
		// 	//'semester_aktif'  = $this->input->post('semester_aktif', TRUE)
		// );
		// $id = $this->input->post('id');
		// $this->db->where('id', $id);
		// $this->db->update($this->table, $data);


		$data = array(
			'nama'       => $this->input->post('nama', TRUE),
			'kota'   => $this->input->post('kota', TRUE)
		);

		$id	= $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);


		}		

		public function uploadtData($data)
		{
			$this->db->insert('tb_data_peserta_fix', $data); // Sesuaikan 'nama_tabel' dengan nama tabel database Anda
		}

		public function uploadtDataKoperasi($data)
		{
			$this->db->insert('tb_peserta_koperasi', $data); // Sesuaikan 'nama_tabel' dengan nama tabel database Anda
		}

		public function uploadtDataUkm($data)
		{
			$this->db->insert('tb_peserta_ukm', $data); // Sesuaikan 'nama_tabel' dengan nama tabel database Anda
		}

		public function uploadtDataRapat($data)
		{
			$this->db->insert('tb_peserta_rapat', $data); // Sesuaikan 'nama_tabel' dengan nama tabel database Anda
		}
	}

?>
