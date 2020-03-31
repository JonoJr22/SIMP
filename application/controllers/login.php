<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['css'] = array(
			CSS_FONT_AWESOME
			, CSS_ICHECK_BOOTSTRAP
			, CSS_ADMINLTE
			, CSS_GOOGLE_FONT_SOURCE_SANS_PRO
		);

		$data['js'] = array(
			JS_JQUERY
			, JS_BOOTSTRAP
			, JS_ADMINLTE
		);

		$data['title'] = 'Masuk';

		$this->load->view('login/index', $data);
	}

	public function loginaction()
	{
		echo 'TES';
	}
}
