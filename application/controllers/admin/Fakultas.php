<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Fakultas_Model');
		$this->load->model('Users_Model');
		$this->load->helper('url');
		date_default_timezone_set("Asia/Jakarta");
		require 'session.php';
		//$this->load->library('form_validation');

	}

	function index(){
		$data = array(
			'add_action'  => base_url('admin/Fakultas/add'),
			'edit_action' => base_url('admin/Fakultas/edit'),
			'fakultas'     => $this->Fakultas_Model->list()
		);
		//print_r($_SESSION);
		$this->load->view('admin/Fakultas',$data);   
	}
 
	function add(){
		$nama_fakultas    	= $this->input->post('nama_fakultas');
		$nama_kaur        	= $this->input->post('nama_kaur');
		$jabatan	      	= $this->input->post('jabatan');
		$no_hp            	= $this->input->post('no_hp');
		$fakultas_username  = $this->input->post('user_name');
		$fakultas_password  = $this->input->post('user_password');

		$fakultas_user = array(
			'user_name'			=> $fakultas_username,
			'user_email'		=> '',
			'user_password'		=> md5($fakultas_password),
			'role_id'			=> 3,						
		);
		$this->Users_Model->input_data($fakultas_user,'users');
		$lastid = $this->db->insert_id();

		//print $lastid;
		$data = array(
			'nama_fakultas' => $nama_fakultas, 
			'nama_kaur' 	=> $nama_kaur, 
			'jabatan' 		=> $jabatan,     
			'no_hp' 		=> $no_hp,  
			'user_id'		=> $lastid, 
		);
			

		$this->Fakultas_Model->input_data($data,'fakultas');
		redirect('admin/Fakultas', 'refresh');
		
	}

	function edit($id){
		$id_fakultas      = $id;
		$nama_fakultas    = $this->input->post('nama_fakultas');
		$nama_kaur        = $this->input->post('nama_kaur');
		$jabatan	      = $this->input->post('jabatan');
		$no_hp            = $this->input->post('no_hp');
 
		$data = array(
			'nama_fakultas' => $nama_fakultas, 
			'nama_kaur' 	=> $nama_kaur, 
			'jabatan' 		=> $jabatan,     
			'no_hp' 		=> $no_hp,   
		);
		$this->Fakultas_Model->edit_data($data,$id_fakultas);
		redirect('admin/Fakultas', 'refresh');
	}


	public function hapus($id)
	{		
		$this->Fakultas_Model->delete_data($id);
		redirect('admin/Fakultas','refresh');
	}
}

/* End of file Drivers.php */
