<?php

	class Sertifikasi_m extends CI_Model
	{

		public $table ="tb_sertifikasi";

		function save()
		{
			// date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
			// $now = date('Y-m-d H:i:s');
			$data = array(				
				//tabel di database => name di form				
				'nama'   			=> $this->input->post('nama', TRUE),
				'created'			=> $this->input->post('now', TRUE)				
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(
				'nama'   			=> $this->input->post('nama', TRUE),
				'modified'			=> $this->input->post('now', TRUE)
			);

			$id	= $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}

		
	}

?>
