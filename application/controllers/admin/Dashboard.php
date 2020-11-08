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

		$expired = $this->db->query("SELECT id_order FROM order_sewa WHERE DATE(tgl_pergi) = DATE(now()) AND TIMESTAMPDIFF(SECOND, now(), tgl_pergi) < 0")->result();
		
		
		foreach ($expired as $key => $value) {
			$id = $value->id_order;
			$this->db->query("UPDATE order_sewa SET status = '2' WHERE id_order='$id' AND stat_adm = '0'");
			//print_r($value);
		}

		$total_cost;

		for ($i=1; $i <=12 ; $i++) { 
			$total_cost[$i] = $this->db->query("SELECT SUM(cost) as total FROM order_sewa WHERE MONTH(tgl_pergi) = '$i' AND YEAR(tgl_pergi) = YEAR(now()) AND status='1' ")->row();
		}

		//print_r($total_cost);
		$data_session = array(
				'js_file'   => 'Dashboard.js.php',
				'status' 		=> 'login',
				'year'		  => date("Y"),
				'mobil'			=> $this->Cars_Model->getCarsTotal(),
				'driver'		=> $this->Drivers_Model->getDriversTotal(),
				'request'		=> $this->Sewa_Model->getRequestsTotal(),
				'approved'	=> $this->Sewa_Model->getApprovedTotal(),
				'cost'			=> $this->Sewa_Model->getCostTotalThisMonth(),
				'driver_trip' => $this->Drivers_Model->getAllDriverTrip(),
				'cost_total' => $total_cost
		);

		// //print_r($this->Drivers_Model->getAllDriverTrip());
		$this->load->view('admin/Dashboard',$data_session);
		//print_r($berangkat_hari_ini);
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
		$q = $this->db->query("SELECT nama_driver FROM driver WHERE id_driver='$id'")->row();
		$data = array(
			'drivers_detail_trips'     => $this->Drivers_Model->getDriverById($id),
			'name' => $q->nama_driver
		);
		//print_r($data);
		$this->load->view('admin/Driver_Trips_Detail',$data);
		//print_r($this->Drivers_Model->getDriverById($id));
	}



}

/* End of file Dashboard.php */


?>
