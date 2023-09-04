<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{

	//Perintah Semua Disini
	function get_kota()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM regencies WHERE province_id='$id' ORDER BY name")->result();
		echo json_encode($data);
	}

	function get_kecamatan()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM districts WHERE regency_id='$id' ORDER BY name")->result();
		echo json_encode($data);
	}

	function get_kelurahan()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM villages WHERE district_id='$id' ORDER BY name")->result();
		echo json_encode($data);
	}

	function get_sesi_perizinan()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT ms_sesi.deskripsi, tb_perizinan.sesi
FROM ms_sesi
LEFT JOIN tb_perizinan
ON ms_sesi.deskripsi=tb_perizinan.sesi AND tb_perizinan.tgl ='$id'")->result();
		// $data = [{"id":"1","deskripsi":"Naruto"},{"id":"2","deskripsi":"Uzumaki"}'];
		echo json_encode($data);
	}

	function get_sesi_podcast()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT ms_sesi_podcast.deskripsi, tb_podcast.sesi
FROM ms_sesi_podcast
LEFT JOIN tb_podcast
ON ms_sesi_podcast.deskripsi=tb_podcast.sesi AND tb_podcast.tgl ='$id'")->result();
		// $data = [{"id":"1","deskripsi":"Naruto"},{"id":"2","deskripsi":"Uzumaki"}'];
		echo json_encode($data);
	}
}
