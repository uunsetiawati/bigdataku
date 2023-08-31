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
				'divisi'   			=> $this->input->post('divisi', TRUE),
				'judul_pelatihan'   => $this->input->post('judul', TRUE),
				'alamat_pelatihan'  => $this->input->post('alamat', TRUE),
				'jenis_pelatihan'   => $this->input->post('jenis', TRUE),
				'kota'				=> $this->input->post('kota', TRUE),
				'tgl_mulai'        	=> $this->input->post('awal', TRUE),
				'tgl_akhir'			=> $this->input->post('akhir', TRUE),
				'status'			=> $this->input->post('status', TRUE),
				'created'			=> $this->input->post('now', TRUE)				
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(
				'divisi'   			=> $this->input->post('divisi', TRUE),
				'judul_pelatihan'   => $this->input->post('judul', TRUE),
				'alamat_pelatihan'  => $this->input->post('alamat', TRUE),
				'kota'				=> $this->input->post('kota', TRUE),
				'jenis_pelatihan'   => $this->input->post('jenis', TRUE),				
				'tgl_mulai'        	=> $this->input->post('awal', TRUE),
				'tgl_akhir'			=> $this->input->post('akhir', TRUE),
				'status'			=> $this->input->post('status', TRUE),
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
		
	}

?>
