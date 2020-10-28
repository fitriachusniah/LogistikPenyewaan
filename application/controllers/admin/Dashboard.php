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
				'js_file'   => 'Dashboard.js.php',
				'status' 		=> 'login',
				'month'		  => date("F"),
				'mobil'			=> $this->Cars_Model->getCarsTotal(),
				'driver'		=> $this->Drivers_Model->getDriversTotal(),
				'request'		=> $this->Sewa_Model->getRequestsTotal(),
				'approved'	=> $this->Sewa_Model->getApprovedTotal(),
				'cost'			=> $this->Sewa_Model->getCostTotalThisMonth(),
				'driver_trip' => $this->Drivers_Model->getAllDriverTrip(),
		);

		// print_r($this->Drivers_Model->getAllDriverTrip());
		$this->load->view('admin/Dashboard',$data_session);
	}

	public function getDriverData()
	{
		$all_driver = $this->Drivers_Model->getActiveDriver();
		// $all_driver_trip = $this->Drivers_Model->getAllDriverTrip();

		$data_driver = array();
		$data_trip = array();
		$data_id = array();

		foreach ($all_driver as $key => $value) {
			$temp_trip = $this->Drivers_Model->getDriverTrip($value->id_driver);
			if (isset($temp_trip->count_trip)) {
				array_push($data_trip,intval($temp_trip->count_trip));
			}else {
				array_push($data_trip,0);
			}
			array_push($data_driver, $value->nama_driver);
			array_push($data_id, $value->id_driver);
		}

		print_r(json_encode(array('driver'=>$data_driver,'trip'=>$data_trip,'id'=>$data_id)));
	}

	public function tripDetail($id)
	{
		print_r($this->Drivers_Model->getDriverById($id));
	}


}

/* End of file Dashboard.php */


?>
