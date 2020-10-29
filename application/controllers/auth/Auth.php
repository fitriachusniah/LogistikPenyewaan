<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$data = [
			'title'	=> 'Auth'
		];

		if(isset($_GET['info'])){
			$data['info'] = $_GET['info'];
		}

		$this->load->view('auth', $data);
	}
}

/* End of file Auth.php */
