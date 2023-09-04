<?php

	class Peserta_m extends CI_Model
	{

		public $table ="tb_data_peserta";

		function save()
		{
			$data = array(
				//tabel di database => name di form				
				'id_pelatihan'          => $this->input->post('id_pel', TRUE),
				'no_ktp'          		=> $this->input->post('no_ktp', TRUE),
				'nama_peserta'        	=> $this->input->post('nama_peserta', TRUE),
				'tempat_lahir'          => $this->input->post('tempat_lahir', TRUE),
				'tgl_lahir'            	=> $this->input->post('tgl_lahir', TRUE),
				'jk'            		=> $this->input->post('jk', TRUE),
				'status'            	=> $this->input->post('status', TRUE),
				'pendidikan'            => $this->input->post('pendidikan', TRUE),
				'agama'            		=> $this->input->post('agama', TRUE),
				'alamat'           		=> $this->input->post('alamat', TRUE),
				'rt'            		=> $this->input->post('rt', TRUE),
				'rw'            		=> $this->input->post('rw', TRUE),
				'provinsi'            	=> $this->input->post('provinsi', TRUE),
				'kabupaten'            	=> $this->input->post('kota', TRUE),
				'kecamatan'            	=> $this->input->post('kecamatan', TRUE),
				'kelurahan'            	=> $this->input->post('kelurahan', TRUE),
				'no_telp'            	=> $this->input->post('no_telp', TRUE),
				'jenis_peserta'			=> $this->input->post('jenis_peserta', TRUE),
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				'nama_kop'				=> $this->input->post('nama_kop', TRUE),
				'nik_koperasi'			=> $this->input->post('nik_koperasi', TRUE),
				'no_badan_hukum'		=> $this->input->post('no_badan_hukum', TRUE),
				'alamat_koperasi'		=> $this->input->post('alamat_koperasi', TRUE),
				'prov_koperasi'			=> $this->input->post('prov_koperasi', TRUE),
				'kota_koperasi'			=> $this->input->post('kota_koperasi', TRUE),
				'kec_koperasi'			=> $this->input->post('kec_koperasi', TRUE),
				'kel_koperasi'			=> $this->input->post('kel_koperasi', TRUE),
				'jml_anggota'			=> $this->input->post('jml_anggota', TRUE),
				'anggota_l'				=> $this->input->post('anggota_l', TRUE),
				'anggota_p'				=> $this->input->post('anggota_p', TRUE),
				'bentuk_koperasi'		=> $this->input->post('bentuk_koperasi', TRUE),
				'jenis_koperasi'		=> $this->input->post('jenis_koperasi', TRUE),
				'kelompok_koperasi'		=> $this->input->post('kelompok_koperasi', TRUE),
				'sektor_usaha'			=> $this->input->post('sektor_usaha', TRUE),
				'jenis_produk'			=> $this->input->post('jenis_produk', TRUE),
				'volume_usaha'			=> $this->input->post('volume_usaha', TRUE),
				'status_usaha'			=> $this->input->post('status_usaha', TRUE),
				'sertifikasi'			=> $this->input->post('sertifikasi', TRUE),
				'wil_pemasaran'			=> $this->input->post('wil_pemasaran', TRUE),
				'nama_usaha'			=> $this->input->post('nama_usaha', TRUE),
				'nib'					=> $this->input->post('nib', TRUE),
				'jml_tenaga_kerja'		=> $this->input->post('jml_tenaga_kerja', TRUE),
				'modal_usaha'			=> $this->input->post('mosal_usaha', TRUE),
				'web_usaha'				=> $this->input->post('web_usaha', TRUE),
				'ig_usaha'				=> $this->input->post('ig_usaha', TRUE),
				'fb_usaha'				=> $this->input->post('fb_usaha', TRUE),
				'tiktok_usaha'			=> $this->input->post('tiktok_usaha', TRUE),
				'email_usaha'			=> $this->input->post('email_usaha', TRUE),
				'shopee'				=> $this->input->post('shopee', TRUE),
				'tokped'				=> $this->input->post('tokped', TRUE),
				'bukalapak'				=> $this->input->post('bukalapak', TRUE),
				'lazada'				=> $this->input->post('lazada', TRUE),
				'sosmed_usaha'			=> $this->input->post('sosmed_usaha', TRUE),
				'market_usaha'			=> $this->input->post('market_usaha', TRUE),
				'pengadaan'				=> $this->input->post('pengadaan', TRUE),
				'izin_usaha'			=> $this->input->post('izin_usaha', TRUE),
				'lokasi_pemasaran'		=> $this->input->post('lokasi_pemasaran', TRUE),
				'permasalahan'			=> $this->input->post('permasalahan', TRUE),
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				'created'				=> $this->input->post('now', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(
				'no_akun'          => $this->input->post('no_akun', TRUE),				
				'id_akun'          => $this->input->post('jenis', TRUE),
				'nama_akun'        => $this->input->post('nama_akun', TRUE),
				'saldo'            => $this->input->post('saldo', TRUE),
				'tahun'            => $this->input->post('tahun', TRUE)
			);

			$id	= $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}
		
	}

?>
