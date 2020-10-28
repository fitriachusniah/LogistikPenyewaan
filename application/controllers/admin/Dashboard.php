<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
	    require 'session.php';
	    $this->load->model('Sewa_Model');
		$this->load->model('Drivers_Model');
		$this->load->model('Cars_Model');
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		$data_session = array(
			'month'		    => date("F"),
			'mobil'			=> $this->Cars_Model->getCarsTotal(),
			'driver'		=> $this->Drivers_Model->getDriversTotal(),
			'request'		=> $this->Sewa_Model->getRequestsTotal(),
			'approved'		=> $this->Sewa_Model->getApprovedTotal(),
			'cost'			=> $this->Sewa_Model->getCostTotalThisMonth(),
		);
		$this->load->view('admin/Dashboard',$data_session);
	}
 
	
}

/* End of file Dashboard.php */


?>
