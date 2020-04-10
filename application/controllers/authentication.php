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
		$this->session->sess_destroy(); 
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
		$username = $this->input->post('username'); 
		$passwordEncrypt = md5($this->input->post('password')); 

		$pengguna = $this->pengguna->get($username); 

		if(empty($pengguna))
		{ 
		  	$this->session->set_flashdata('message', 'Username tidak ditemukan'); 
			  
			redirect('authentication'); 
		}
		else
		{
			if($passwordEncrypt == $pengguna->password)
			{ 
				$session = array(
					'authenticated'	=> true, 
					'username'		=> $pengguna->username,  
					'role'			=> $pengguna->role,
					'role_id'		=> $pengguna->role_id 
				);

				$this->session->set_userdata($session); 
				
				$redirectPath = $this->generate_redirect_path($pengguna->role_id);
				
				redirect($redirectPath);
			}
			else
			{
				$this->session->set_flashdata('message', 'Password salah'); 
				
				redirect('authentication'); 
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy(); 
		
		redirect('authentication');
	}

	private function generate_redirect_path($roleID)
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

		$redirectPath .= '\home';
		
		return $redirectPath;
	}
}
