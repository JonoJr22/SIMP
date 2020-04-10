<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends MY_Controller
{
    public function home()
    {
        $data['title'] = 'Home';

        $this->render_core_page('administrator/home', $data);
    }
}