<?php 

class Fungsi {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('user_m');
		$userid = $this->ci->session->userdata('id');
		$query = $this->ci->user_m->get($userid)->row();
		return $query;
	}

	// Row Cepat

	function pilihan($tabel) {		
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_selected($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get();
		return $query;
	}

	function pilihan_advanced($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_advanced_multiple($tabel,$kode1,$id1,$kode2,$id2) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->where($kode2,$id2);
		$query = $this->ci->db->get($tabel);
		return $query;
	}


	// Result Cepat
	function get_deskripsi($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get()->row("deskripsi");
		return $query;
	}

	function get_deskripsi_advanced($tabel,$kode,$id,$perintah) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->row($perintah);
		return $query;
	}


	// Hitung Cepat
	function hitung_rows($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_multiple($tabel,$kode1,$id1,$kode2,$id2) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->like($kode2,$id2);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_triple($tabel,$kode1,$id1,$kode2,$id2,$kode3,$id3) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->where($kode2,$id2);
		$this->ci->db->like($kode3,$id3);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_nilai($tabel,$kolom,$kode,$id) {
		$this->ci->db->select_sum($kolom);		
		$this->ci->db->where($kode,$id);		
		$query = $this->ci->db->get($tabel)->row("nilai");
		return $query;
	}

	function hitung_nilai_multiple($tabel,$kolom,$kode1,$id1,$kode2,$id2) {
		$this->ci->db->select_sum($kolom);		
		$this->ci->db->where($kode1,$id1);		
		$this->ci->db->where($kode2,$id2);		
		$query = $this->ci->db->get($tabel)->row("nilai");
		return $query;
	}

	function countValue($tabel,$kolom) {
		$this->ci->db->select_sum($kolom);		
		$query = $this->ci->db->get($tabel)->row($kolom);
		return $query;
	}

	// Fungsi
	function check_access_user($tabel,$id) {
		$this->ci->db->where("user_id",$id);
		$query = $this->ci->db->get($tabel)->num_rows();
		if ($query == null) {
			$this->ci->session->set_flashdata('danger', 'Kamu tidak memiliki akses untuk menu ini');
			redirect('');
		}
		return $query;
	}

	function tugas($tabel,$kode1,$id1,$kode2,$id2,$kode3,$id3) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->where($kode2,$id2);
		$this->ci->db->like($kode3,$id3);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function notifUltahDay()
	{
	    $this->ci->db->from('tb_user');
	    $this->ci->db->like('tgl_lahir',date("m-d"));
	    $this->ci->db->where('status',"1");
	    $query = $this->ci->db->get();
	    return $query;
	}

	function notifUltahMonth()
	{
	    $this->ci->db->from('tb_user');
	    $this->ci->db->where('MONTH(tgl_lahir)',date("m"));
	    $this->ci->db->where('status',"1");
	    $query = $this->ci->db->get();
	    return $query;
	}

	function sendWA($hp = null, $pesan = null,$redirect = null) {
		$api_key   = '950b055ac2ac3c32f7f8ea28a5aa3828bc596270'; // API KEY Anda
		$id_device = '7654'; // ID DEVICE yang di SCAN (Sebagai pengirim)
		$url   = 'https://api.watsap.id/send-message'; // URL API
		$no_hp = $hp; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $pesan; // Pesan yang dikirim

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // batas waktu response
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
		'id_device' => $id_device,
		'api-key' => $api_key,
		'no_hp'   => $no_hp,
		'pesan'   => $pesan
		];
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);

		$data = json_decode($response);
		if ($data->kode == 200) {
			// $this->ci->session->set_flashdata('success', 'Pesan Terkirim');
			// redirect($redirect);
		} else {
			$this->ci->session->set_flashdata('warning', $data->message);
			// redirect($redirect);
		}

	}

	// function sendNotif($hp = null, $pesan = null) {
	// 	$api_key   = '950b055ac2ac3c32f7f8ea28a5aa3828bc596270'; // API KEY Anda
	// 	$id_device = '7654'; // ID DEVICE yang di SCAN (Sebagai pengirim)
	// 	$url   = 'https://api.watsap.id/send-message'; // URL API
	// 	$no_hp = $hp; // No.HP yang dikirim (No.HP Penerima)
	// 	$pesan = $pesan; // Pesan yang dikirim

	// 	$curl = curl_init();
	// 	curl_setopt($curl, CURLOPT_URL, $url);
	// 	curl_setopt($curl, CURLOPT_HEADER, 0);
	// 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	// 	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	// 	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	// 	curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
	// 	curl_setopt($curl, CURLOPT_TIMEOUT,0); // batas waktu response
	// 	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	// 	curl_setopt($curl, CURLOPT_POST, 1);

	// 	$data_post = [
	// 	'id_device' => $id_device,
	// 	'api-key' => $api_key,
	// 	'no_hp'   => $no_hp,
	// 	'pesan'   => $pesan
	// 	];
	// 	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
	// 	curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	// 	$response = curl_exec($curl);
	// 	curl_close($curl);

	// 	$data = json_decode($response);
	// 	if ($data->kode == 200) {
	// 		// $this->ci->session->set_flashdata('success', 'Pesan Terkirim');
	// 	} else {
	// 		// $this->ci->session->set_flashdata('warning', $data->message);
	// 	}

	// }

	function sendNotif($hp = null, $pesan = null) {
		//API dari Whatpie
		$url   = 'https://app.whatspie.com/api/messages'; // URL API
		$device = '6281234381239'; // No.HP yang dikirim (No.HP Penerima)
		$no_hp = $hp; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $pesan; // Pesan yang dikirim

		$data_post = [
			'device' => $device,
			'receiver'   => $no_hp,
			'message'   => $pesan,
			'type'   => 'chat'
		];

		$headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
			'Authorization: Bearer MME5lzf8xzQRm1f9OxrSHcCvOe4uC2X2iUAC6Ai9xMW9p5rm5r',
        );
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($curl);
		echo $response;

		curl_close($curl);

		$data = json_decode($response);
		if ($data->kode == 200) {
			// $this->ci->session->set_flashdata('success', 'Pesan Terkirim');
		} else {
			// $this->ci->session->set_flashdata('warning', $data->message);
		}
	}

}

?>