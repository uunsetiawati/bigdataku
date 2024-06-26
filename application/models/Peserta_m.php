<?php

	class Peserta_m extends CI_Model
	{

		public $table ="tb_data_peserta";

		function save($foto,$ktp,$no_urut)
		{
			$nama_peserta = $this->input->post('nama_peserta', TRUE);
			$sosmed = $this->input->post('sosmed', TRUE);
			if(is_array($sosmed)){
				$sosmed = implode(',',$sosmed);
			}else{
				$sosmed;
			}

			$izin = $this->input->post('izin', TRUE);
			if(is_array($izin)){
				$izin = implode(',',$izin);
			}else{
				$izin;
			}

			$market = $this->input->post('market', TRUE);
			if(is_array($market)){
				$market = implode(',',$market);
			}else{
				$market;
			}

			$masalah = $this->input->post('masalah', TRUE);
			if(is_array($masalah)){
				$masalah = implode(',',$masalah);
			}else{
				$masalah;
			}

			$kebutuhan = $this->input->post('kebutuhan', TRUE);
			if(is_array($kebutuhan)){
				$kebutuhan = implode(',',$kebutuhan);
			}else{
				$kebutuhan;
			}

			$sertifikasi = $this->input->post('sertifikasi', TRUE);
			if(is_array($sertifikasi)){
				$sertifikasi = implode(',',$sertifikasi);
			}else{
				$sertifikasi;
			}

			$pengadaan = $this->input->post('pengadaan', TRUE);
			if(is_array($pengadaan)){
				$pengadaan = implode(',',$pengadaan);
			}else{
				$pengadaan;
			}
			
			$data = array(
				//tabel di database => name di form				
				'id_pelatihan'          => $this->input->post('id_pel', TRUE),
				'kodeunik'          	=> $this->uri->segment(3),
				'no_urut'				=> $no_urut,
				'no_ktp'          		=> $this->input->post('no_ktp', TRUE),
				'nama_peserta'        	=> $nama_peserta,
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
				'disabilitas'			=> $this->input->post('disabilitas', TRUE),
				'jenis_peserta'			=> $this->input->post('jenis_peserta', TRUE),
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				'nama_kop'				=> $this->input->post('nama_kop', TRUE),
				'nik_koperasi'			=> $this->input->post('nik_koperasi', TRUE),
				'no_badan_hukum'		=> $this->input->post('no_badan_hukum', TRUE),
				'tgl_badan_hukum'		=> $this->input->post('tgl_badan_hukum', TRUE),
				'alamat_kopukm	'		=> $this->input->post('alamat_kopukm', TRUE),
				'rt_kopukm	'			=> $this->input->post('rt_kopukm', TRUE),
				'rw_kopukm	'			=> $this->input->post('rw_kopukm', TRUE),
				'prov_kopukm'			=> $this->input->post('prov_kopukm', TRUE),
				'kota_kopukm'			=> $this->input->post('kota_kopukm', TRUE),
				'kec_kopukm'			=> $this->input->post('kec_kopukm', TRUE),
				'kel_kopukm'			=> $this->input->post('kel_kopukm', TRUE),
				'kodepos_kopukm'		=> $this->input->post('kodepos_kopukm', TRUE),
				'jml_anggota'			=> $this->input->post('jml_anggota', TRUE),
				'anggota_l'				=> $this->input->post('anggota_l', TRUE),
				'anggota_p'				=> $this->input->post('anggota_p', TRUE),
				'calon_anggota'			=> $this->input->post('calon_anggota', TRUE),
				'bentuk_koperasi'		=> $this->input->post('bentuk_koperasi', TRUE),
				'jenis_koperasi'		=> $this->input->post('jenis_koperasi', TRUE),
				'tipe_koperasi'			=> $this->input->post('tipe_koperasi', TRUE),
				'kelompok_koperasi'		=> $this->input->post('kelompok_koperasi', TRUE),
				'cabang'				=> $this->input->post('cabang', TRUE),
				'kantor_cabang_pembantu'	=> $this->input->post('kantor_cabang_pembantu', TRUE),
				'kantor_kas'			=> $this->input->post('kantor_kas', TRUE),
				'sektor_usaha'			=> $this->input->post('sektor_usaha', TRUE),
				'bidang_usaha'			=> $this->input->post('bidang_usaha', TRUE),
				'jenis_produk'			=> $this->input->post('jenis_produk', TRUE),
				'volume_usaha'			=> $this->input->post('volume_usaha', TRUE),
				'status_usaha'			=> $this->input->post('status_usaha', TRUE),
				'sertifikasi'			=> $sertifikasi,
				'wil_pemasaran'			=> $this->input->post('wil_pemasaran', TRUE),
				'nama_usaha'			=> $this->input->post('nama_usaha', TRUE),
				'nib'					=> $this->input->post('nib', TRUE),
				'jml_tenaga_kerja'		=> $this->input->post('jml_tenaga_kerja', TRUE),
				'modal_usaha'			=> $this->input->post('modal_usaha', TRUE),
				'nilai_modalusaha'		=> $this->input->post('nilai_modalusaha', TRUE),
				'omzet_usaha'			=> $this->input->post('omzet_usaha', TRUE),
				'nilai_omzetusaha'		=> $this->input->post('nilai_omzetusaha', TRUE),
				'nilai_modalhutang'		=> $this->input->post('nilai_modalhutang', TRUE),
				'nilai_shukoperasi'		=> $this->input->post('nilai_shukoperasi', TRUE),
				'skala_koperasi'		=> $this->input->post('skala_koperasi', TRUE),
				'jml_tenaga_kerjal'		=> $this->input->post('jml_tenaga_kerjal', TRUE),
				'jml_tenaga_kerjap'		=> $this->input->post('jml_tenaga_kerjap', TRUE),
				'web_usaha'				=> $this->input->post('web_usaha', TRUE),
				'ig_usaha'				=> $this->input->post('ig_usaha', TRUE),
				'fb_usaha'				=> $this->input->post('fb_usaha', TRUE),
				'tiktok_usaha'			=> $this->input->post('tiktok_usaha', TRUE),
				'email_usaha'			=> $this->input->post('email_usaha', TRUE),
				'shopee'				=> $this->input->post('shopee', TRUE),
				'tokped'				=> $this->input->post('tokped', TRUE),
				'bukalapak'				=> $this->input->post('bukalapak', TRUE),
				'lazada'				=> $this->input->post('lazada', TRUE),
				'sosmed_usaha'			=> $sosmed,
				'market_usaha'			=> $market,
				'pengadaan'				=> $pengadaan,
				'izin_usaha'			=> $izin,
				'lokasi_pemasaran'		=> $this->input->post('lokasi_pemasaran', TRUE),
				'idebisnis'				=> $this->input->post('idebisnis',TRUE),
				'permasalahan'			=> $masalah,
				'kebutuhan'				=> $kebutuhan,
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				'tgl_pendirian'			=> $this->input->post('tgl_pendirian', TRUE),
				'npwp'					=> $this->input->post('npwp', TRUE),
				'lama_nib'				=> $this->input->post('lama_nib', TRUE),
				'kapasitas_produksi'	=> $this->input->post('kapasitas_produksi', TRUE),
				'pelatihan_sebelumnya'	=> $this->input->post('pelatihan_sebelumnya', TRUE),
				'saran'					=> $this->input->post('saran', TRUE),
				'foto'					=> $foto,
				'ktp'					=> $ktp,
				'created'				=> $this->input->post('now', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function save_podcast($foto,$ktp,$no_urut)
		{
			$nama_peserta = $this->input->post('nama_peserta', TRUE);
			$sosmed = $this->input->post('sosmed', TRUE);
			if(is_array($sosmed)){
				$sosmed = implode(',',$sosmed);
			}else{
				$sosmed;
			}

			$izin = $this->input->post('izin', TRUE);
			if(is_array($izin)){
				$izin = implode(',',$izin);
			}else{
				$izin;
			}

			$market = $this->input->post('market', TRUE);
			if(is_array($market)){
				$market = implode(',',$market);
			}else{
				$market;
			}

			$masalah = $this->input->post('masalah', TRUE);
			if(is_array($masalah)){
				$masalah = implode(',',$masalah);
			}else{
				$masalah;
			}

			$kebutuhan = $this->input->post('kebutuhan', TRUE);
			if(is_array($kebutuhan)){
				$kebutuhan = implode(',',$kebutuhan);
			}else{
				$kebutuhan;
			}

			$sertifikasi = $this->input->post('sertifikasi', TRUE);
			if(is_array($sertifikasi)){
				$sertifikasi = implode(',',$sertifikasi);
			}else{
				$sertifikasi;
			}

			$pengadaan = $this->input->post('pengadaan', TRUE);
			if(is_array($pengadaan)){
				$pengadaan = implode(',',$pengadaan);
			}else{
				$pengadaan;
			}
			
			$data = array(
				//tabel di database => name di form				
				'id_pelatihan'          => $this->input->post('id_pel', TRUE),
				'kodeunik'          	=> $this->uri->segment(3),
				'no_urut'				=> $no_urut,
				'no_ktp'          		=> $this->input->post('no_ktp', TRUE),
				'nama_peserta'        	=> $nama_peserta,
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
				'disabilitas'			=> $this->input->post('disabilitas', TRUE),
				'jenis_peserta'			=> $this->input->post('jenis_peserta', TRUE),
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				'nama_kop'				=> $this->input->post('nama_kop', TRUE),
				'nik_koperasi'			=> $this->input->post('nik_koperasi', TRUE),
				'no_badan_hukum'		=> $this->input->post('no_badan_hukum', TRUE),
				'alamat_kopukm	'		=> $this->input->post('alamat_kopukm', TRUE),
				'rt_kopukm	'			=> $this->input->post('rt_kopukm', TRUE),
				'rw_kopukm	'			=> $this->input->post('rw_kopukm', TRUE),
				'prov_kopukm'			=> $this->input->post('prov_kopukm', TRUE),
				'kota_kopukm'			=> $this->input->post('kota_kopukm', TRUE),
				'kec_kopukm'			=> $this->input->post('kec_kopukm', TRUE),
				'kel_kopukm'			=> $this->input->post('kel_kopukm', TRUE),
				'kodepos_kopukm'		=> $this->input->post('kodepos_kopukm', TRUE),
				'jml_anggota'			=> $this->input->post('jml_anggota', TRUE),
				'anggota_l'				=> $this->input->post('anggota_l', TRUE),
				'anggota_p'				=> $this->input->post('anggota_p', TRUE),
				'bentuk_koperasi'		=> $this->input->post('bentuk_koperasi', TRUE),
				'jenis_koperasi'		=> $this->input->post('jenis_koperasi', TRUE),
				'kelompok_koperasi'		=> $this->input->post('kelompok_koperasi', TRUE),
				'sektor_usaha'			=> $this->input->post('sektor_usaha', TRUE),
				'bidang_usaha'			=> $this->input->post('bidang_usaha', TRUE),
				'jenis_produk'			=> $this->input->post('jenis_produk', TRUE),
				'volume_usaha'			=> $this->input->post('volume_usaha', TRUE),
				'status_usaha'			=> $this->input->post('status_usaha', TRUE),
				'sertifikasi'			=> $sertifikasi,
				'wil_pemasaran'			=> $this->input->post('wil_pemasaran', TRUE),
				'nama_usaha'			=> $this->input->post('nama_usaha', TRUE),
				'nib'					=> $this->input->post('nib', TRUE),
				'jml_tenaga_kerja'		=> $this->input->post('jml_tenaga_kerja', TRUE),
				'modal_usaha'			=> $this->input->post('modal_usaha', TRUE),
				'nilai_modalusaha'		=> $this->input->post('nilai_modalusaha', TRUE),
				'omzet_usaha'			=> $this->input->post('omzet_usaha', TRUE),
				'nilai_omzetusaha'		=> $this->input->post('nilai_omzetusaha', TRUE),
				'jml_tenaga_kerjal'		=> $this->input->post('jml_tenaga_kerjal', TRUE),
				'jml_tenaga_kerjap'		=> $this->input->post('jml_tenaga_kerjap', TRUE),
				'web_usaha'				=> $this->input->post('web_usaha', TRUE),
				'ig_usaha'				=> $this->input->post('ig_usaha', TRUE),
				'fb_usaha'				=> $this->input->post('fb_usaha', TRUE),
				'tiktok_usaha'			=> $this->input->post('tiktok_usaha', TRUE),
				'email_usaha'			=> $this->input->post('email_usaha', TRUE),
				'shopee'				=> $this->input->post('shopee', TRUE),
				'tokped'				=> $this->input->post('tokped', TRUE),
				'bukalapak'				=> $this->input->post('bukalapak', TRUE),
				'lazada'				=> $this->input->post('lazada', TRUE),
				'sosmed_usaha'			=> $sosmed,
				'market_usaha'			=> $market,
				'pengadaan'				=> $pengadaan,
				'izin_usaha'			=> $izin,
				'lokasi_pemasaran'		=> $this->input->post('lokasi_pemasaran', TRUE),
				'idebisnis'				=> $this->input->post('idebisnis',TRUE),
				'permasalahan'			=> $masalah,
				'kebutuhan'				=> $kebutuhan,
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				'foto'					=> $foto,
				'ktp'					=> $ktp,
				'created'				=> $this->input->post('now', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function savedewan($foto,$ktp)
		{
			

			$izin = $this->input->post('izin', TRUE);
			if(is_array($izin)){
				$izin = implode(',',$izin);
			}else{
				$izin;
			}

			$kebutuhan = $this->input->post('kebutuhan', TRUE);
			if(is_array($kebutuhan)){
				$kebutuhan = implode(',',$kebutuhan);
			}else{
				$kebutuhan;
			}

			$masalah = $this->input->post('masalah', TRUE);
			if(is_array($masalah)){
				$masalah = implode(',',$masalah);
			}else{
				$masalah;
			}

			$sertifikasi = $this->input->post('sertifikasi', TRUE);
			if(is_array($sertifikasi)){
				$sertifikasi = implode(',',$sertifikasi);
			}else{
				$sertifikasi;
			}
			
			$data = array(
				//tabel di database => name di form				
				'id_pelatihan'          => $this->input->post('id_pel', TRUE),
				'kodeunik'          	=> $this->uri->segment(3),
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
				'disabilitas'			=> $this->input->post('disabilitas', TRUE),
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				'nama_kop'				=> $this->input->post('nama_kop', TRUE),
				'nik_koperasi'			=> $this->input->post('nik_koperasi', TRUE),
				'no_badan_hukum'		=> $this->input->post('no_badan_hukum', TRUE),
				'alamat_kopukm	'		=> $this->input->post('alamat_kopukm', TRUE),
				'rt_kopukm	'			=> $this->input->post('rt_kopukm', TRUE),
				'rw_kopukm	'			=> $this->input->post('rw_kopukm', TRUE),
				'prov_kopukm'			=> $this->input->post('prov_kopukm', TRUE),
				'kota_kopukm'			=> $this->input->post('kota_kopukm', TRUE),
				'kec_kopukm'			=> $this->input->post('kec_kopukm', TRUE),
				'kel_kopukm'			=> $this->input->post('kel_kopukm', TRUE),
				'kodepos_kopukm'		=> $this->input->post('kodepos_kopukm', TRUE),
				'jml_anggota'			=> $this->input->post('jml_anggota', TRUE),
				'anggota_l'				=> $this->input->post('anggota_l', TRUE),
				'anggota_p'				=> $this->input->post('anggota_p', TRUE),
				'bentuk_koperasi'		=> $this->input->post('bentuk_koperasi', TRUE),
				'jenis_koperasi'		=> $this->input->post('jenis_koperasi', TRUE),
				'kelompok_koperasi'		=> $this->input->post('kelompok_koperasi', TRUE),
				'sektor_usaha'			=> $this->input->post('sektor_usaha', TRUE),
				'bidang_usaha'			=> $this->input->post('bidang_usaha', TRUE),
				'jenis_produk'			=> $this->input->post('jenis_produk', TRUE),
				'volume_usaha'			=> $this->input->post('volume_usaha', TRUE),
				'status_usaha'			=> $this->input->post('status_usaha', TRUE),
				'sertifikasi'			=> $sertifikasi,
				'wil_pemasaran'			=> $this->input->post('wil_pemasaran', TRUE),
				'nama_usaha'			=> $this->input->post('nama_usaha', TRUE),
				'nib'					=> $this->input->post('nib', TRUE),
				'jml_tenaga_kerja'		=> $this->input->post('jml_tenaga_kerja', TRUE),
				'modal_usaha'			=> $this->input->post('modal_usaha', TRUE),
				'nilai_modalusaha'		=> $this->input->post('nilai_modalusaha', TRUE),
				'omzet_usaha'			=> $this->input->post('omzet_usaha', TRUE),
				'nilai_omzetusaha'		=> $this->input->post('nilai_omzetusaha', TRUE),
				'jml_tenaga_kerjal'		=> $this->input->post('jml_tenaga_kerjal', TRUE),
				'jml_tenaga_kerjap'		=> $this->input->post('jml_tenaga_kerjap', TRUE),
				'web_usaha'				=> $this->input->post('web_usaha', TRUE),
				'ig_usaha'				=> $this->input->post('ig_usaha', TRUE),
				'fb_usaha'				=> $this->input->post('fb_usaha', TRUE),
				'tiktok_usaha'			=> $this->input->post('tiktok_usaha', TRUE),
				'email_usaha'			=> $this->input->post('email_usaha', TRUE),
				'shopee'				=> $this->input->post('shopee', TRUE),
				'tokped'				=> $this->input->post('tokped', TRUE),
				'bukalapak'				=> $this->input->post('bukalapak', TRUE),
				'lazada'				=> $this->input->post('lazada', TRUE),
				'izin_usaha'			=> $izin,
				'lokasi_pemasaran'		=> $this->input->post('lokasi_pemasaran', TRUE),
				'idebisnis'				=> $this->input->post('idebisnis',TRUE),
				'permasalahan'			=> $masalah,
				'kebutuhan'				=> $kebutuhan,
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				'foto'					=> $foto,
				'ktp'					=> $ktp,
				'created'				=> $this->input->post('now', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{			
			$nama_peserta = $this->input->post('nama_peserta', TRUE);
			$data = array(
				//tabel di database => name di form	
								
				'no_urut'          		=> $this->input->post('no_urut', TRUE),		
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
				// 'provinsi'            	=> $this->input->post('provinsi', TRUE),
				// 'kabupaten'            	=> $this->input->post('kabupaten', TRUE),
				// 'kecamatan'            	=> $this->input->post('kecamatan', TRUE),
				// 'kelurahan'            	=> $this->input->post('kelurahan', TRUE),
				'no_telp'            	=> $this->input->post('no_telp', TRUE),
				'disabilitas'			=> $this->input->post('disabilitas', TRUE),
				// 'jenis_peserta'			=> $this->input->post('jenis_peserta', TRUE),
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				'nama_kop'				=> $this->input->post('nama_kop', TRUE),
				'nik_koperasi'			=> $this->input->post('nik_koperasi', TRUE),
				'no_badan_hukum'		=> $this->input->post('no_badan_hukum', TRUE),
				'tgl_badan_hukum'		=> $this->input->post('tgl_badan_hukum', TRUE),
				'alamat_kopukm	'		=> $this->input->post('alamat_kopukm', TRUE),
				'rt_kopukm	'			=> $this->input->post('rt_kopukm', TRUE),
				'rw_kopukm	'			=> $this->input->post('rw_kopukm', TRUE),
				// 'prov_kopukm'			=> $this->input->post('prov_kopukm', TRUE),
				// 'kota_kopukm'			=> $this->input->post('kota_kopukm', TRUE),
				// 'kec_kopukm'			=> $this->input->post('kec_kopukm', TRUE),
				// 'kel_kopukm'			=> $this->input->post('kel_kopukm', TRUE),
				'kodepos_kopukm'		=> $this->input->post('kodepos_kopukm', TRUE),
				'jml_anggota'			=> $this->input->post('jml_anggota', TRUE),
				'anggota_l'				=> $this->input->post('anggota_l', TRUE),
				'anggota_p'				=> $this->input->post('anggota_p', TRUE),
				'calon_anggota'			=> $this->input->post('calon_anggota', TRUE),
				'bentuk_koperasi'		=> $this->input->post('bentuk_koperasi', TRUE),
				'jenis_koperasi'		=> $this->input->post('jenis_koperasi', TRUE),
				'tipe_koperasi'			=> $this->input->post('tipe_koperasi', TRUE),
				'kelompok_koperasi'		=> $this->input->post('kelompok_koperasi', TRUE),
				'cabang'				=> $this->input->post('cabang', TRUE),
				'kantor_cabang_pembantu'	=> $this->input->post('kantor_cabang_pembantu', TRUE),
				'kantor_kas'			=> $this->input->post('kantor_kas', TRUE),
				'sektor_usaha'			=> $this->input->post('sektor_usaha', TRUE),
				'bidang_usaha'			=> $this->input->post('bidang_usaha', TRUE),
				'jenis_produk'			=> $this->input->post('jenis_produk', TRUE),
				'volume_usaha'			=> $this->input->post('volume_usaha', TRUE),
				'status_usaha'			=> $this->input->post('status_usaha', TRUE),
				'sertifikasi'			=> $this->input->post('sertifikasi', TRUE),
				'wil_pemasaran'			=> $this->input->post('wil_pemasaran', TRUE),
				'nama_usaha'			=> $this->input->post('nama_usaha', TRUE),
				'nib'					=> $this->input->post('nib', TRUE),
				'jml_tenaga_kerja'		=> $this->input->post('jml_tenaga_kerja', TRUE),
				'modal_usaha'			=> $this->input->post('modal_usaha', TRUE),
				'nilai_modalusaha'		=> $this->input->post('nilai_modalusaha', TRUE),
				'nilai_modalhutang'		=> $this->input->post('nilai_modalhutang', TRUE),
				'omzet_usaha'			=> $this->input->post('omzet_usaha', TRUE),
				'nilai_omzetusaha'		=> $this->input->post('nilai_omzetusaha', TRUE),
				'nilai_shukoperasi'		=> $this->input->post('nilai_shukoperasi', TRUE),
				'skala_koperasi'		=> $this->input->post('skala_koperasi', TRUE),
				'jml_tenaga_kerjal'		=> $this->input->post('jml_tenaga_kerjal', TRUE),
				'jml_tenaga_kerjap'		=> $this->input->post('jml_tenaga_kerjap', TRUE),
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
				'idebisnis'				=> $this->input->post('idebisnis',TRUE),
				'permasalahan'			=> $this->input->post('permasalahan', TRUE),
				'kebutuhan'				=> $this->input->post('kebutuhan', TRUE),
				'jabatan'				=> $this->input->post('jabatan', TRUE),
				// 'foto'					=> $this->input->post('foto', TRUE),
				// 'ktp'					=> $this->input->post('foto_ktp', TRUE),
				'modified'				=> $this->input->post('now', TRUE)
			);

			$id	= $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}		

		function getProv($id)
		{
			$this->db->select('b.name AS provinsi');
			$this->db->from('tb_data_peserta a');
			$this->db->join('provinces b', 'a.provinsi=b.id');
			$this->db->where('a.id', $id);
			$query = $this->db->get();
			return $query;

		}
		function getKab($id)
		{
			$this->db->select('b.name AS kabupaten');
			$this->db->from('tb_data_peserta a');
			$this->db->join('regencies b', 'a.kabupaten=b.id');
			$this->db->where('a.id', $id);
			$query = $this->db->get();
			return $query;

		}
		function getKec($id)
		{
			$this->db->select('b.name AS kecamatan');
			$this->db->from('tb_data_peserta a');
			$this->db->join('districts b', 'a.kecamatan=b.id');
			$this->db->where('a.id', $id);
			$query = $this->db->get();
			return $query;

		}
		function getKel($id)
		{
			$this->db->select('b.name AS kelurahan');
			$this->db->from('tb_data_peserta a');
			$this->db->join('villages b', 'a.kelurahan=b.id');
			$this->db->where('a.id', $id);
			$query = $this->db->get();
			return $query;

		}

		function getProvkopukm($id)
		{
			$this->db->select('b.name AS provinsi');
			$this->db->from('tb_data_peserta a');
			$this->db->join('provinces b', 'a.prov_kopukm=b.id');
			$this->db->where('a.id', $id);
			$query = $this->db->get();
			return $query;

		}
		function getKabkopukm($id)
		{
			$this->db->select('b.name AS kabupaten');
			$this->db->from('tb_data_peserta a');
			$this->db->join('regencies b', 'a.kota_kopukm=b.id');
			$this->db->where('a.id', $id);
			$query = $this->db->get();
			return $query;

		}
		function getKeckopukm($id)
		{
			$this->db->select('b.name AS kecamatan');
			$this->db->from('tb_data_peserta a');
			$this->db->join('districts b', 'a.kec_kopukm=b.id');
			$this->db->where('a.id', $id);
			$query = $this->db->get();
			return $query;

		}
		function getKelkopukm($id)
		{
			$this->db->select('b.name AS kelurahan');
			$this->db->from('tb_data_peserta a');
			$this->db->join('villages b', 'a.kel_kopukm=b.id');
			$this->db->where('a.id', $id);
			$query = $this->db->get();
			return $query;

		}
		
	}

	

?>
