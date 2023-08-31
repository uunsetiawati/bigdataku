<?php

	class Model_saldoawal2 extends CI_Model
	{

		public $table ="tb_test";

		function save()
		{
			$data = array(
				//tabel di database => name di form			
				'id_user'        => $this->input->post('id_user', TRUE),	
				'jenis'          => $this->input->post('jenis', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(
				'nama'          => $this->input->post('nama', TRUE)
			);

			$id	= $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}
		
	}

?>
