<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Model 
{
    public function get($username)
    {
        $this->db->select('username, password, role, role_id');
        $this->db->from('pengguna');
        $this->db->join('role', 'pengguna.role_id = role.id');
        $this->db->where('username', $username); 

        $result = $this->db->get()->row();

        return $result;
    }

    public function get_all()
    {
        $this->db->select('pengguna.id, nama, email, role');
        $this->db->from('pengguna');
        $this->db->join('role', 'pengguna.role_id = role.id');
        
        $result = $this->db->get()->result();

        return $result;
    }
}
