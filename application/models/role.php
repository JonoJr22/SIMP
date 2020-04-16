<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Model 
{
    public function get_all()
    {
        $this->db->select('id, role');
        $this->db->from('role');
        
        $result = $this->db->get()->result();

        return $result;
    }
}
