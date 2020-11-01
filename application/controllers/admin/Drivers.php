<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Drivers_Model');
		$this->load->model('Users_Model');
		$this->load->helper('url');
		date_default_timezone_set("Asia/Jakarta");
		require 'session.php';
		//$this->load->library('form_validation');

	}

	function index(){
		$data = array(
			'add_action'  => base_url('admin/Drivers/add'),
			'edit_action' => base_url('admin/Drivers/edit'),
			'drivers'     => $this->Drivers_Model->list()
		);
		//print_r($_SESSION);
		$this->load->view('admin/Drivers',$data);   
	}
 
	function add(){
		$nama_driver      = $this->input->post('nama_driver');
		$no_hp            = $this->input->post('no_hp');
		$driver_username  = $this->input->post('user_name');
		$driver_password  = $this->input->post('user_password');

		$driver_user = array(
			'user_name'			=> $driver_username,
			'user_email'		=> '',
			'user_password'		=> md5($driver_password),
			'role_id'			=> 2,						
		);
		$this->Users_Model->input_data($driver_user,'users');
		$lastid = $this->db->insert_id();

		//print $lastid;

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
					'user_id'			=> $lastid,
				);

			}else{
				$data = array(
					'nama_driver' 		=> $nama_driver,     
					'no_hp' 		    => $no_hp,   
					'user_id'			=> $lastid,
				);
			}
			

		$this->Drivers_Model->input_data($data,'driver');
		$notif_message = "Data Driver berhasil ditambahkan";
		$notif_action = 'success'; //success,error,warning,question
		$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
		redirect('admin/Drivers', 'refresh');
		
	}

	function edit($id){
		$id_driver 	     = $id;
		$nama_driver      = $this->input->post('nama_driver');
		$no_hp            = $this->input->post('no_hp');

		// $updated_at       = date("Y-m-d H:i:s");
 
		$data = array(
			'nama_driver' 		=> $nama_driver,     
			'no_hp' 		    => $no_hp,   
		);
		$this->Drivers_Model->edit_data($data,$id_driver);
		$notif_message = "Data Driver berhasil diubah";
		$notif_action = 'success'; //success,error,warning,question
		$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
		redirect('admin/Drivers', 'refresh');
	}


	public function hapus($id)
	{		
		$deleted_at       = date("Y-m-d H:i:s");
		$this->Drivers_Model->delete_data($id,$deleted_at);
		$notif_message = "Data Driver berhasil dihapus";
		$notif_action = 'success'; //success,error,warning,question
		$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
		redirect('admin/Drivers','refresh');
	}
}

/* End of file Drivers.php */
