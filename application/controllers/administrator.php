<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends MY_Controller
{
    public function __construct()
	{
		parent::__construct();

		$this->load->model('pengguna');
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
}