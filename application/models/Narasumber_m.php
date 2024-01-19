<?php

	class Narasumber_m extends CI_Model
	{

		public $table ="tb_data_narsum";

		function save($ktp,$npwp,$cv,$materi,$spt,$rekening)
		{
			// date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
			// $now = date('Y-m-d H:i:s');
			$data = array(				
				//tabel di database => name di form
				'kodeunik'          => $this->input->post('kodeunik', TRUE),				
				'nama'   			=> $this->input->post('nama', TRUE),
				'instansi'   		=> $this->input->post('instansi', TRUE),
				'materi_judul'   	=> $this->input->post('materi_judul', TRUE),
				'nik'   			=> $this->input->post('nik', TRUE),				
				'jk'   				=> $this->input->post('jk', TRUE),
				'hp'  				=> $this->input->post('hp', TRUE),
				'jpl'   			=> $this->input->post('jpl', TRUE),
				'jenis'				=> $this->input->post('jenis', TRUE),
				'ktp'        	    => $ktp,
				'npwp'				=> $npwp,
				'cv'				=> $cv,
				'materi'			=> $materi,
				'spt'				=> $spt,
				'rekening'			=> $rekening,
				'created'			=> $this->input->post('now', TRUE)				
			);
			$this->db->insert($this->table, $data);
		}

		function simpan($materi,$spt)
		{
			// date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
			// $now = date('Y-m-d H:i:s');
			$data = array(				
				//tabel di database => name di form
				'kodeunik'          => $this->input->post('kodeunik', TRUE),				
				'nama'   			=> $this->input->post('nama', TRUE),
				'instansi'   		=> $this->input->post('instansi', TRUE),
				'materi_judul'   	=> $this->input->post('materi_judul', TRUE),
				'nik'   			=> $this->input->post('nik', TRUE),				
				'jk'   				=> $this->input->post('jk', TRUE),
				'hp'  				=> $this->input->post('hp', TRUE),
				'jpl'   			=> $this->input->post('jpl', TRUE),
				'jenis'				=> $this->input->post('jenis', TRUE),
				'ktp'        	    => $this->input->post('ktp', TRUE),
				'npwp'				=> $this->input->post('npwp', TRUE),
				'cv'				=> $this->input->post('cv', TRUE),
				'materi'			=> $materi,
				'spt'				=> $spt,
				'rekening'			=> $this->input->post('rekening', TRUE),
				'created'			=> $this->input->post('now', TRUE)				
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(				
				//tabel di database => name di form
				// 'kodeunik'          => $this->input->post('kodeunik', TRUE),				
				'nama'   			=> $this->input->post('nama', TRUE),
				'instansi'   		=> $this->input->post('instansi', TRUE),
				'materi_judul'   	=> $this->input->post('materi_judul', TRUE),
				// 'nik'   			=> $this->input->post('nik', TRUE),				
				'jk'   				=> $this->input->post('jk', TRUE),
				'hp'  				=> $this->input->post('hp', TRUE),
				// 'jpl'   			=> $this->input->post('jpl', TRUE),
				// 'jenis'				=> $this->input->post('jenis', TRUE),
				// 'ktp'        	    => $ktp,
				// 'npwp'				=> $npwp,
				// 'cv'				=> $cv,
				// 'materi'			=> $materi,
				// 'spt'				=> $spt,
				// 'rekening'			=> $rekening,
				'modified'			=> $this->input->post('now', TRUE)				
			);

			$id	= $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
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

		public function search_data($nik) {
			$this->db->like('nik', $nik); // Ganti 'field_yang_dicari' dengan nama field yang ingin Anda cari
			$query = $this->db->get('tb_data_narsum'); // Ganti 'nama_tabel' dengan nama tabel database yang sesuai
			return $query->result();
		}
		
	}

?>
