<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Model 
{
    public function get($username)
    {
        $this->db->select('nama, username, password, status_akun, role, role_id');
        $this->db->from('pengguna');
        $this->db->join('role', 'pengguna.role_id = role.id');
        $this->db->where('username', $username); 

        $result = $this->db->get()->row();

        return $result;
    }

    public function get_all_exclude($dataReq)
    {
        $this->db->select('pengguna.id, nama, username, role');
        $this->db->from('pengguna');
        $this->db->where($dataReq);
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

    public function tambah($dataTambah)
    {
        $this->db->insert('pengguna', $dataTambah);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengguna');
    }
}
