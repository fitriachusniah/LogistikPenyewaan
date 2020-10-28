<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ExampleController extends CI_Controller {

	public function index()
	{
		$data=[
			'title'	=> 'ACR | Dashboard'
		];
		$this->load->view('admin/dashboard', $data, FALSE);
	}
}

/* End of file ExampleController.php */


?>
