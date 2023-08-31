<?php

	class Test_m extends CI_Model
	{

		public $table ="tb_test";

		function save()
		{
			$data = array(
				//tabel di database => name di form				
				'no_akun'          => $this->input->post('no_akun', TRUE),
				'id_user'          => $this->input->post('id_user', TRUE),
				'id_akun'          => $this->input->post('jenis', TRUE),
				'nama_akun'        => $this->input->post('nama_akun', TRUE),
				'saldo'            => $this->input->post('saldo', TRUE),
				'tahun'            => $this->input->post('tahun', TRUE)
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
