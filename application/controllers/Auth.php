<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}

	public function login()
	{
		check_already_login();
		$this->load->view('view_login');
	}

	public function loginOTP()
	{
		check_already_login();
		$this->load->view('page/loginOTP');
	}

	public function loginOTPConfirm()
	{
		check_already_login();
		$this->load->view('page/loginOtpConfirm');
	}

	public function logout()
	{
		$params = array('id','username','tipe_user','date_now');
		$this->session->unset_userdata($params);
		redirect('home');
	}


	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array (
					'id' => $row->id,					
					'username' => $row->username,					
					'nama' => $row->nama,					
					'email' => $row->email,					
					'hp' => $row->hp,					
					'tipe_user' => $row->tipe_user,
					'date_now' => date('Y:m:d H:i:s'),
				);
				$this->session->set_userdata($params);
				// $kalimat = "Terima kasih telah membuka logbook UPTKUKM Jatim, *".$row->nama."*\n\nSelamat Berkerja Penuh Khidmat untuk Lembaga, Bangsa, dan Negara";
				// $this->fungsi->sendWA("0".$row->hp,$kalimat);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('danger','Login Gagal');
				redirect("login");
			}
		} else {
			echo "Mau Main2 ya";
			redirect('login');
		}
	}

	function google()
	{
		// init configuration
        $clientID = '671339166342-i0k0crs3j86tososuff2eqbr0jh11340.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = base_url().'auth/google';

        // create Client Request to access Google API
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");

        // authenticate code from Google OAuth Flow
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            // get profile info
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email=  $google_account_info->email;
			$this->load->model("user_m");
            $query = $this->user_m->loginGoogle($email);			
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array (
					'id' => $row->id,					
					'username' => $row->username,					
					'nama' => $row->nama,					
					'email' => $row->email,					
					'hp' => $row->hp,					
					'tipe_user' => $row->tipe_user,
					'date_now' => date('Y:m:d H:i:s'),
				);
				$this->session->set_userdata($params);
				// $kalimat = "Terima kasih telah membuka logbook UPTKUKM Jatim, *".$row->nama."*\n\nSelamat Berkerja Penuh Khidmat untuk Lembaga, Bangsa, dan Negara";
				// $this->fungsi->sendWA("0".$row->hp,$kalimat);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('danger','Email Tidak Terdaftar');
				redirect("auth/login");
			}

            // now you can use this profile info to create account in your website and make user logged in.
        } else {
            redirect($client->createAuthUrl());
        }
	}
}
