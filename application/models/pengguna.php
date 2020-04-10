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

        $query = $this->db->get();
        $result = $query->row();

        return $result;
    }
}
