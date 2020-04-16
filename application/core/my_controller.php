<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->authentication_check(); 
    }

    public function authentication_check() 
    { 
        $controller = $this->uri->segment(1);
        $existAuthSession = $this->session->userdata('authenticated');

        if($controller != 'authentication' && empty($controller))
        {
            if(!$existAuthSession) 
                redirect('authentication'); 
        }
    }

    public function render_login_page($view, $data = NULL)
    {
        $data['main_content'] = $this->load->view($view, $data, TRUE);
        
        $this->load->view('template/login/full_content', $data);
    }

    public function render_core_page($view, $data = NULL)
    {
        $data['navbar'] = $this->load->view('template/core/navbar', $data, TRUE);
        $data['main_content'] = $this->load->view($view, $data, TRUE);
        
        $this->load->view('template/core/full_content', $data);
    }
}
