<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
 	{
 		parent::__construct();
 		$this->locations = [
			[-6.95855, 107.63992],
			[-6.95233, 107.63718],
			[-6.94577, 107.631],
			[-6.94125, 107.62628],
			[-6.93437, 107.61941],
		];

 	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('Notification_Model');
		$this->load->model('Drivers_Model');

		$data = $this->Drivers_Model->getDriverLocation(2, '2020-11-16 03:59:07');

		if ($data) {
			print_r($data);
		}else {
			echo "tidak ada data terbaru";
		}

		// $this->Notification_Model->insertToUser('new Order', 'ada pesanan masuk', 1);
		// $this->Notification_Model->insertToRole('new Order', 'ada pesanan masuk', 1);
		// $this->load->view('welcome_message');
	}

	public function driverTest($id_driver, $i){
		if ($i<5) {
			$lat = $this->locations[$i][0];
			$long = $this->locations[$i][1];
			$this->db->query("UPDATE driver SET latitude = '$lat', longitude = '$long', gps_update_time = DATE_ADD(gps_update_time, INTERVAL (15 - TIMESTAMPDIFF(SECOND, NOW(), gps_update_time)) SECOND) WHERE id_driver = $id_driver;");
			sleep(5);

			$this->driverTest($id_driver, $i++);
		}
	}
}
