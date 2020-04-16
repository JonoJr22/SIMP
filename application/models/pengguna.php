<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Model 
{
    public function get($username)
    {
        $this->db->select('username, password, status_akun, role, role_id');
        $this->db->from('pengguna');
        $this->db->join('role', 'pengguna.role_id = role.id');
        $this->db->where('username', $username); 

        $result = $this->db->get()->row();

        return $result;
    }

    public function get_all()
    {
        $this->db->select('pengguna.id, nama, role');
        $this->db->from('pengguna');
        $this->db->join('role', 'pengguna.role_id = role.id');
        
        $result = $this->db->get()->result();

        return $result;
    }

    public function get_password($username)
    {
        $this->db->select('password');
        $this->db->from('pengguna');
        $this->db->where('username', $username);

        $result = $this->db->get()->row();

        return $result;
    }

    public function update($username, $dataUpdate)
    {
        $this->db->where('username', $username);
        $this->db->update('pengguna', $dataUpdate);
    }

    public function tambah_data($dataTambah)
    {
        $this->db->insert('pengguna', $dataTambah);
    }
}
