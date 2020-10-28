<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sewa_Model');
		$this->load->model('Drivers_Model');
		$this->load->model('Fakultas_Model');
		$this->load->model('Cars_Model');
		$this->load->helper('url');
		date_default_timezone_set("Asia/Jakarta");
		require 'session.php';
		//$this->load->library('form_validation');

	}

	function index(){
		$data = array(
			'list_sewa_masuk'     => $this->Sewa_Model->list_sewa_masuk(),
			'edit_action'       => base_url('admin/Sewa/edit_tgl'),
			'add_action'  => base_url('admin/Sewa/add_sewa'),
			'list_fakultas'		  => $this->Fakultas_Model->list(),
		);
		$this->load->view('admin/Sewa_Masuk',$data);   
	}

	function edit_tgl($id){
		$tgl_pergi  = $this->input->post('tgl_pergi');
		$tgl_pulang = $this->input->post('tgl_pulang');
		//echo "$tgl_pergi";
		$this->db->query("UPDATE order_sewa SET tgl_pergi = '$tgl_pergi', tgl_pulang = '$tgl_pulang' WHERE id_order = '$id'");
		redirect('admin/Sewa', 'refresh');  
	}

	function terima_sewa($id){
		$tgl = $this->db->query("SELECT tgl_pergi FROM order_sewa WHERE id_order = '$id'")->row();
		$tgl_pergi = substr($tgl->tgl_pergi, 0,10);
		// $orders_by_tgl = $this->db->query("SELECT id_mobil FROM order_sewa WHERE DATE(tgl_pergi)='$tgl_pergi'")->result();

		$data = array(
			'id'				  => $id,
			'list_sewa_masuk'     => $this->Sewa_Model->list_sewa_masuk(),
			'list_mobil'		  => $this->Cars_Model->list_available($tgl_pergi),
			'list_driver'		  => $this->Drivers_Model->list_available($tgl_pergi),
			'terima_action'       => base_url('admin/Sewa/terima'),
		);
		$this->load->view('admin/Terima_Sewa',$data);
		
		//print_r($orders_by_tgl);
		//print_r($list_driver);
	}

	function terima($id){
		
		$id_order  = $id;
		$id_mobil  = $this->input->post('id_mobil');
		$id_driver = $this->input->post('id_driver');

		$char      = $this->input->post('cost');
		if(substr($char, 0,3)=='Rp '){
			$cost      = str_replace(".",'',substr($this->input->post('cost'), 3));
		}else{
			$cost      = $this->input->post('cost');
		}
		

		$data = array(
			'id_mobil' 		=> $id_mobil,     
			'id_driver'     => $id_driver, 
			'cost'			=> $cost,
			'status'		=> 1,  
		);

		// $data2 = array( 
		// 	'status'		=> 0
		// );

		$this->Sewa_Model->terima_data($data,$id_order);
		//$this->Cars_Model->edit_data($data2,$id_mobil);
		//$this->Drivers_Model->edit_data($data2,$id_driver);

		redirect('admin/Sewa', 'refresh');
		
	}

	function add_sewa(){
		$tgl_pergi		  = $this->input->post('tgl_pergi');
		$tgl_pulang		  = $this->input->post('tgl_pulang');
		$tujuan  		  = $this->input->post('tujuan');
		$keterangan       = $this->input->post('keterangan');
		$jml_penumpang    = $this->input->post('jml_penumpang');
		$note		      = $this->input->post('note');
		$id_fakultas      = $this->input->post('id_fakultas');

		
		$data = array(
			'tgl_pergi' 		=> $tgl_pergi,
			'tgl_pulang' 		=> $tgl_pulang,
			'tujuan'			=> $tujuan,     
			'keterangan'        => $keterangan,
			'jml_penumpang' 	=> $jml_penumpang,
			'note'				=> $note,
			'id_fakultas'       => $id_fakultas,   
		);
		$this->Sewa_Model->input_data($data,'order_sewa');
		redirect('admin/Sewa', 'refresh');
		
	}


	function tolak($id){
		$this->db->query("UPDATE order_sewa SET status = 5 WHERE id_order = '$id'");
		redirect('admin/Sewa', 'refresh');
	}

	function close_trip($id){
		$cost = $this->input->post('cost');
		$sppd = $this->input->post('sppd');
		$this->db->query("UPDATE order_sewa SET status = 3, cost = '$cost', sppd = '$sppd' WHERE id_order = '$id'");
		redirect('admin/Sewa/Sewa_Menunggu_Perjalanan', 'refresh');
	}

	function sewa_menunggu_driver(){
		$data = array(
			'list_sewa_masuk'     => $this->Sewa_Model->list_sewa_menunggu_driver(),
		);
		$this->load->view('admin/Sewa_Menunggu_Driver',$data);   
	}

	function sewa_menunggu_perjalanan(){
		$data = array(
			'list_sewa_masuk'     => $this->Sewa_Model->list_sewa_menunggu_perjalanan(),
		);
		$this->load->view('admin/Sewa_Menunggu_Perjalanan',$data);   
	}

	function sewa_selesai(){
		$data = array(
			'list_sewa_masuk'     => $this->Sewa_Model->list_sewa_selesai(),
		);
		$this->load->view('admin/Sewa_Selesai',$data);   
	}

	function sewa_ditolak(){
		$data = array(
			'list_sewa_masuk'     => $this->Sewa_Model->list_sewa_ditolak(),
		);
		$this->load->view('admin/Sewa_Ditolak',$data);   
	}


	public function hapus($id)
	{		
		
	}
}

/* End of file Cars.php */