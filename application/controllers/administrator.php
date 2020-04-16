<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends MY_Controller
{
    public function __construct()
	{
		parent::__construct();

        $this->load->model('pengguna');
        $this->load->model('role');
    }
    
    public function home()
    {
        $data['title'] = 'Home';
        
        $this->render_core_page('administrator/home', $data);
    }

    public function list_pengguna()
    {
        $data['pengguna'] = $this->pengguna->get_all();
        $data['title'] = 'List Pengguna';

        $this->render_core_page('administrator/list_pengguna', $data);
    }

    public function ubah_password($force = '')
    {
        $data['title'] = 'Ubah Password';

        if($force != '')
            $data['force'] = TRUE;

        $this->render_core_page('global/ubah_password', $data);
    }

    public function ubah_password_action()
    {
        $passwordLama = md5($this->input->post('password_lama'));
        $passwordBaru = md5($this->input->post('password_baru'));
        $konfirmasiPasswordBaru = md5($this->input->post('konfirmasi_password_baru'));
        $username = $this->session->userdata('username');

        $pengguna = $this->pengguna->get_password($username);

        if($passwordLama != $pengguna->password)
        {
            $this->session->set_flashdata('alert_message', 'Password lama salah');
            
            redirect('administrator/ubah_password');
        }

        if($konfirmasiPasswordBaru != $passwordBaru)
        {
            $this->session->set_flashdata('alert_message', 'Password konfirmasi tidak sesuai dengan password baru');

            redirect('administrator/ubah_password');
        }

        $dataUpdate = [
            'password'      => $passwordBaru,
            'status_akun'   => 0
        ];

        $editSuccess = $this->pengguna->update($username, $dataUpdate);

        $this->session->set_flashdata('success_message', 'Password berhasil diubah');
        
        redirect('administrator/ubah_password');
    }

    public function tambah_pengguna()
    {
        $data['title'] = 'Tambah Pengguna';
        $data['role'] = $this->role->get_all();

        $this->render_core_page('administrator/tambah_pengguna', $data);
    }

    public function tambah_pengguna_action()
    {
        $namaDepan = trim($this->input->post('nama_depan'));
        $namaTengah = trim($this->input->post('nama_tengah'));
        $namaBelakang = trim($this->input->post('nama_belakang'));

        $namaAyahDepan = trim($this->input->post('nama_ayah_depan'));
        $namaAyahTengah = trim($this->input->post('nama_ayah_tengah'));
        $namaAyahBelakang = trim($this->input->post('nama_ayah_belakang'));

        $role = $this->input->post('role');

        $namaLengkap = $namaDepan;

        if($namaTengah != '')
            $namaLengkap .= ' '.$namaTengah;

        if($namaBelakang != '')
        {
            $namaLengkap .= ' '.$namaBelakang;
        }

        $namaLengkap = ucwords($namaLengkap);
        $username = strtolower($namaDepan);

        if(str_word_count($namaLengkap) != 1) 
        {
            if($namaBelakang != '')
            {
                $username .= '.'.strtolower($namaBelakang);
                $password = $namaBelakang;
            }
            else
            {
                $username .= '.'.strtolower($namaTengah);
                $password = $namaTengah;
            }
        }
        else
        {
            $username .= '.'.strtolower($namaAyahDepan);
            $password = $namaAyahDepan;
        }

        $statusAkun = 1;

        $dataTambah = array(
            'nama'          => $namaLengkap,
            'username'      => $username,
            'password'      => md5($password),
            'status_akun'  => $statusAkun,
            'role_id'       => $role
        );

        $this->pengguna->tambah_data($dataTambah);

        $this->session->set_flashdata('success_closable_message', 
            'Silahkan informasikan kepada pengguna untuk segera mengganti password di SIMP <br><br> Username : '.$username.'<br> Password : '.$password
        );

        redirect('administrator/tambah_pengguna');    
    }
}