<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cars_Model');
		$this->load->helper('url');
		date_default_timezone_set("Asia/Jakarta");
		require 'session.php';
		//$this->load->library('form_validation');

	}

	function index(){
		$data = array(
			'add_action'  => base_url('admin/Cars/add'),
			'edit_action' => base_url('admin/Cars/edit'),
			'cars'     => $this->Cars_Model->list()
		);
		$this->load->view('admin/Cars',$data);   
	}
 
	function add(){
		$nopol		      = $this->input->post('nopol');
		$merk_mobil       = $this->input->post('merk_mobil');
		$type_mobil       = $this->input->post('type_mobil');
		$kapasitas		  = $this->input->post('kapasitas'); 

		
		$data = array(
			'nopol' 		=> $nopol,     
			'merk_mobil'    => $merk_mobil,
			'type_mobil' 	=> $type_mobil,     
			'kapasitas'     => $kapasitas,   
		);
		$this->Cars_Model->input_data($data,'mobil');
		redirect('admin/Cars', 'refresh');
		
	}

	function edit($id){
		$id_mobil         = $id;
		$nopol		      = $this->input->post('nopol');
		$merk_mobil       = $this->input->post('merk_mobil');
		$type_mobil       = $this->input->post('type_mobil');
		$kapasitas		  = $this->input->post('kapasitas'); 
		$serviced		  = $this->input->post('service');
		$status =0; 

		if($serviced!='2'){
			$status = 1;
		}else{
			$status = 2;
		}
 
		$data = array(
			'nopol' 		=> $nopol,     
			'merk_mobil'    => $merk_mobil,
			'type_mobil' 	=> $type_mobil,     
			'kapasitas'     => $kapasitas,
			'status'		=> $status   
		);
		$this->Cars_Model->edit_data($data,$id_mobil);
		redirect('admin/Cars', 'refresh');
	}

	public function hapus($id)
	{		
		$this->Cars_Model->delete_data($id);
		redirect('admin/Cars','refresh');
	}
}

/* End of file Cars.php */
