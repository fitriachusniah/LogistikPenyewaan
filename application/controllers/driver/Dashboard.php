<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sewa_Model');
		$this->load->model('Drivers_Model');
		$this->load->model('Cars_Model');
		$this->load->model('Users_Model');
	    require 'session.php';
	}

	function index(){
		$id = $this->session->userdata('id');

		$data = array(
			'list_sewa_masuk'     => $this->Sewa_Model->driver_list_sewa_masuk($id),
			'list_sedang_berjalan'     => $this->Sewa_Model->driver_list_sewa_menunggu_perjalanan($id),
		);

		$this->load->view('driver/Dashboard',$data);
	}

	// function menunggu_perjalanan(){
	// 	$id = $this->session->userdata('id');
	// 	$data = array(
	// 		'list_sewa_masuk'     => $this->Sewa_Model->driver_list_sewa_menunggu_perjalanan($id),
	// 		'close_trip_action'   => base_url('driver/Dashboard/close_trip'),
			

	// 	);

	// 	$this->load->view('driver/List_Menunggu_Perjalanan',$data);
	// }

	function selesai(){
		$id = $this->session->userdata('id');
		$data = array(
			'list_sewa_masuk'     => $this->Sewa_Model->driver_list_sewa_selesai($id),

		);

		$this->load->view('driver/List_Selesai',$data);
	}

	function ditolak(){
		$id = $this->session->userdata('id');
		$data = array(
			'list_sewa_ditolak'     => $this->Sewa_Model->driver_list_sewa_ditolak($id),

		);
		  //print_r($data);
		$this->load->view('driver/List_Ditolak',$data);
	}

	function terima($id){
		$km_awal = $this->input->post('km_awal');

		$order = $this->db->query("SELECT * FROM order_sewa WHERE id_order = '$id'")->row();
		$id_mobil = $order->id_mobil;

		$km_awal_sebelumnya = $this->db->query("SELECT km_awal FROM mobil WHERE id_mobil = '$id_mobil'")->row();

		if($km_awal<$km_awal_sebelumnya->km_awal){
			$notif_message = "KM Awal yang dimasukkan salah! ";
			$notif_action = 'error'; //success,error,warning,question
			$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
			redirect('driver/Dashboard', 'refresh');
		}else if($km_awal>=$km_awal_sebelumnya->km_awal){
			$this->db->query("UPDATE order_sewa SET stat_drv = 1 WHERE id_order = '$id'");
			$this->db->query("UPDATE mobil SET km_awal = '$km_awal' WHERE id_mobil = '$id_mobil'");

			$notif_message = "Perjalanan berhasil diterima";
			$notif_action = 'success'; //success,error,warning,question
			$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
			redirect('driver/Dashboard', 'refresh');
		}

		// echo "$km_awal";
		// print_r($km_awal_sebelumnya);
	}

	function tolak($id){
		$alasan = $this->input->post('alasan');

		$order = $this->db->query("SELECT * FROM order_sewa WHERE id_order = '$id'")->row();
		$id_driver = $order->id_driver;

		$this->db->query("UPDATE order_sewa SET stat_drv = 5, stat_adm = 0, id_driver = 0 WHERE id_order = '$id'");
		$this->db->query("INSERT INTO decline_reason(id_order, id_driver, alasan) VALUES ('$id','$id_driver','$alasan')");

		$notif_message = "Perjalanan berhasil ditolak";
		$notif_action = 'success'; //success,error,warning,question
		$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
		redirect('driver/Dashboard/ditolak', 'refresh');
		//print_r($order);

	}

	function close_trip($id,$id_mobil){
		$total_km = 0;
		$km_akhir = $this->input->post('km_akhir');

		$km_awal = $this->db->query("SELECT km_awal FROM mobil WHERE id_mobil = '$id_mobil'")->row();
		$km_akhir_sebelumnya = $this->db->query("SELECT km_akhir FROM mobil WHERE id_mobil = '$id_mobil'")->row();

		$total_km = $km_akhir - $km_awal->km_awal;
		if($km_akhir<=$km_awal->km_awal || $km_akhir<$km_akhir_sebelumnya->km_akhir){
			$notif_message = "KM Akhir yang dimasukkan salah! ";
			$notif_action = 'error'; //success,error,warning,question
			$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
			redirect('driver/Dashboard/Menunggu_Perjalanan', 'refresh');
			//echo "salah";
		}else if($km_akhir>=$km_akhir_sebelumnya->km_akhir){
			$this->db->query("UPDATE order_sewa SET stat_drv = 2,total_km = '$total_km' WHERE id_order = '$id'");
			$this->db->query("UPDATE mobil SET km_akhir = '$km_akhir' WHERE id_mobil = '$id_mobil'");

			$notif_message = "Perjalanan selesai, trip closed";
			$notif_action = 'success'; //success,error,warning,question
			$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
			redirect('driver/Dashboard/Selesai', 'refresh');
			// echo "$total_km";
			// echo "benar";
		}


	}

	function update_profile($id){
		$driver = $this->db->query("SELECT * FROM driver JOIN users ON driver.user_id=users.user_id WHERE id_driver = '$id'")->row();
		$data = array(
			'id_driver'			  => $id,
			'nama_driver'		  => $driver->nama_driver,
			'no_hp'				  => $driver->no_hp,
			'foto_driver'		  => $driver->foto_driver,
			'user_id'			  => $driver->user_id,
			'user_name'			  => $driver->user_name,
			'user_password'			  => $driver->user_password,
			'edit_action'   => base_url('driver/Dashboard/driver_edit_profile'),
		);
		$this->load->view('driver/Update_Profile',$data);
		// echo "$id";
		// print_r($driver);
	}

	function driver_edit_profile($id){
		$id_driver 	      = $id;
		$nama_driver      = $this->input->post('nama_driver');
		$no_hp            = $this->input->post('no_hp');

		$driver_userid	  = $this->input->post('user_id');
		$driver_username  = $this->input->post('user_name');
		$driver_password  = $this->input->post('user_password');


		if($driver_password==''){
			$new_psw = $this->input->post('old_psw');
 		}else{
 			$new_psw = md5($driver_password);
 		}
		$driver_user = array(
			'user_name'			=> $driver_username,
			'user_password'		=> $new_psw,
		);

		$this->Users_Model->edit_data($driver_user,$driver_userid);

		// $updated_at       = date("Y-m-d H:i:s");
			$config['upload_path'] = "./assets/foto_driver/";
			$config['allowed_types'] = "gif|jpg|png";
			$config['max_size'] = 10000;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload',$config);

			if ($this->upload->do_upload('foto_driver')) {
				$foto_driver = $this->upload->data();

				$data = array(
					'nama_driver' 		=> $nama_driver,
					'no_hp' 		    => $no_hp,
					'foto_driver'		=> $foto_driver['file_name'],
				);

			}else{
				$data = array(
					'nama_driver' 		=> $nama_driver,
					'no_hp' 		    => $no_hp,
				);
			}


		$this->Drivers_Model->edit_data($data,$id_driver);

		$notif_message = "Profile berhasil diubah";
		$notif_action = 'success'; //success,error,warning,question
		$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
		redirect('driver/Dashboard', 'refresh');
	}

	public function updateNewLocation(){
		date_default_timezone_set('Asia/Jakarta');
		// print_r($_POST);
		$data['latitude'] = $_POST['latitude'];
		$data['longitude'] = $_POST['longitude'];
		$data['gps_update_time'] = date("Y-m-d H:i:s");

		$update = $this->Drivers_Model->updateNewLocation($_POST['id_driver'], $data);

		if ($update) {
			echo "1";
		}else {
			echo "0";
		}
	}

	public function isDriving($id){
			$data = $this->db->select('id_order')->from('order_sewa')
											 ->where('id_driver', $id)
											 ->where('stat_drv', 1)
											 ->get()->row();

			if ($data) {
				echo 1;
			}else {
				echo 0;
			}
	}


}

/* End of file Dashboard.php */


?>
