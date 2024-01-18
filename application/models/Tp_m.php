<?php

	class Tp_m extends CI_Model
	{

		public $table ="tb_tp";

		// function save()
		// {
		function save($foto,$ktp,$kk,$skck,$ijazah,$rekening,$bpjs,$suket_kom,$suket_kerja,$sertifikat,$pernyataan)
		{
			// date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
			// $now = date('Y-m-d H:i:s');
			$data = array(				
				//tabel di database => name di form
				'nama'   			=> $this->input->post('nama', TRUE),
				'nik'		   		=> $this->input->post('nik', TRUE),
				'tempat_lahir'   	=> $this->input->post('tempat_lahir', TRUE),
				'tgl_lahir'   		=> $this->input->post('tgl_lahir', TRUE),				
				'jk'   				=> $this->input->post('jk', TRUE),
				'email'  			=> $this->input->post('email', TRUE),
				'no_telp'   		=> $this->input->post('no_telp', TRUE),
				'alamat'			=> $this->input->post('alamat', TRUE),
				'rt'				=> $this->input->post('rt', TRUE),
				'rw'				=> $this->input->post('rw', TRUE),
				'prov'				=> $this->input->post('prov', TRUE),
				'kabkota'			=> $this->input->post('kabkota', TRUE),
				'kec'				=> $this->input->post('kec', TRUE),
				'kel'				=> $this->input->post('kel', TRUE),
				'pendidikan'		=> $this->input->post('pendidikan', TRUE),
				'jenis_tp'			=> $this->input->post('jenis_tp', TRUE),
				'no_rekening'		=> $this->input->post('no_rekening', TRUE),
				'no_bpjs'			=> $this->input->post('no_bpjs', TRUE),
				'wilayah_kerja'		=> $this->input->post('wilayah_kerja', TRUE),
				'foto'        	    => $foto,
				'ktp'        	    => $ktp,
				'kk'				=> $kk,
				'skck'				=> $skck,
				'ijazah'			=> $ijazah,
				'rekening'			=> $rekening,
				'bpjs'				=> $bpjs,
				'suket_kom'			=> $suket_kom,
				'suket_kerja'		=> $suket_kerja,
				'sertifikat'		=> $sertifikat,
				'pernyataan'		=> $pernyataan,
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
				'nama'				=> $this->input->post('nama', TRUE),
				'wilayah_kerja'		=> $this->input->post('wilayah_kerja', TRUE),				
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
