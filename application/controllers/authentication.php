<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('pengguna');
	}

	public function index()
	{
		$existAuthSession = $this->session->userdata('authenticated');
		$roleID = $this->session->userdata('role_id');

		if($existAuthSession)
		{
			$redirectPath = $this->generate_redirect_path($roleID);
			
			redirect($redirectPath);
		} 
		
		$this->render_login_page('authentication\login'); 
	}

	public function login()
	{
		$username = trim($this->input->post('username')); 
		$passwordEncrypt = md5(trim($this->input->post('password'))); 

		$pengguna = $this->pengguna->get($username); 

		if(empty($pengguna))
		{ 
		  	$this->session->set_flashdata('alert_message', 'Username tidak ditemukan'); 
			  
			redirect('authentication'); 
		}
		
		if($passwordEncrypt != $pengguna->password)
		{ 
			$this->session->set_flashdata('alert_message', 'Password salah'); 
		
			redirect('authentication');
		}

		$session = array(
			'authenticated'	=> true, 
			'username'		=> $pengguna->username,  
			'role'			=> $pengguna->role,
			'role_id'		=> $pengguna->role_id 
		);

		$this->session->set_userdata($session); 

		if($pengguna->status_akun == '1')
		{
			$redirectPath = $this->generate_redirect_path($pengguna->role_id, '1');
			$this->session->set_flashdata('info_message', 'Selamat Datang<br>Demi keamanan, silahkan ubah password akun anda');
		}
		else 
		{
			$redirectPath = $this->generate_redirect_path($pengguna->role_id);
			$this->session->set_flashdata('info_message', 'Selamat Datang');	
		}
		
		redirect($redirectPath);
	}

	public function logout()
	{
		$this->session->sess_destroy(); 

		redirect('authentication');
	}

	private function generate_redirect_path($roleID, $forceUbahPassword = '')
	{
		if($roleID == '1')
		{
			$redirectPath = 'administrator';
		}
		else if($roleID == '2')
		{
			$redirectPath = 'customer_service';
		}
		else if($roleID == '3')
		{
			$redirectPath = 'bagian_gudang';
		}
		else if($roleID == '4')
		{
			$redirectPath = 'bagian_produksi';
		}
		else if($roleID == '5')
		{
			$redirectPath = 'bagian_purchasing';
		}
		else if($roleID == '6')
		{
			$redirectPath = 'manager_direction';
		}

		$redirectPath .= ($forceUbahPassword != '') ? '\ubah_password\1' : '\home';
		
		return $redirectPath;
	}
}
