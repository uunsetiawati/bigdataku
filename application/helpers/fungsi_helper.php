<?php

function check_already_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('username');
	if ($user_session) {
		redirect('dashboard');
	}
}

function check_not_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('username');
	if (!$user_session) {
		redirect('auth/login');
	}
}

function check_super_user($tipe_user, $previllage)
{
	if ($tipe_user < $previllage) {
		redirect('login');
	}
}

function check_right_user($id_login, $user_id)
{
	$ci = &get_instance();
	if ($id_login != $user_id) {
		$ci->session->set_flashdata('warning', 'Hanya bisa mengedit yang miliknya');
		redirect('dashboard');
	}
}

function check_right_user_edit($id_edit, $user_id)
{
	$ci = &get_instance();
	if ($id_edit != $user_id) {
		$ci->session->set_flashdata('danger', 'Hanya bisa mengedit yang miliknya');
		redirect('dashboard');
	}
}

function test($var)
{
	var_dump($var);
	die();
}

function hp($nohp)
{
	// kadang ada penulisan no hp 0811 239 345
	$nohp = str_replace(" ", "", $nohp);
	// kadang ada penulisan no hp (0274) 778787
	$nohp = str_replace("(", "", $nohp);
	// kadang ada penulisan no hp (0274) 778787
	$nohp = str_replace(")", "", $nohp);
	// kadang ada penulisan no hp 0811.239.345
	$nohp = str_replace(".", "", $nohp);
	if (!preg_match('/[^+0-9]/', trim($nohp))) {
		if (substr(trim($nohp), 0, 2) == '62') {
			return trim($nohp);
		}
		// cek apakah no hp karakter 1 adalah 0
		elseif (substr(trim($nohp), 0, 1) == '0') {
			return '62' . substr(trim($nohp), 1);
		}
	}
}
