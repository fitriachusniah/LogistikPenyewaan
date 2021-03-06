<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sewa_Model');
		$this->load->helper('url');
		$this->load->model('Notification_Model');
		date_default_timezone_set("Asia/Jakarta");
		require 'session.php';
		//$this->load->library('form_validation');

	}

	function index(){
		$id = $this->session->userdata('id');
		$data = array(
			'list_sewa'     => $this->Sewa_Model->list_sewa($id),
			'finish_action'  => base_url('konsumen/Sewa/finish_and_rate'),
		);
		$this->load->view('konsumen/List_Sewa',$data);
	}

	function add(){
		$tgl_pergi		  = $this->input->post('tgl_pergi');
		$tgl_pulang		  = $this->input->post('tgl_pulang');
		$tujuan  		  = $this->input->post('tujuan');
		$keterangan       = $this->input->post('keterangan');
		$jml_penumpang    = $this->input->post('jml_penumpang');
		$note		      = $this->input->post('note');
		$id_fakultas      = $this->session->userdata('id');


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

		$this->Notification_Model->insertToRole('New Order', 'Ada peminjaman mobil untuk tanggal '.$tgl_pergi, 1);

		$notif_message = "Permintaan Peminjaman Mobil Ditambahkan";
		$notif_action = 'success'; //success,error,warning,question
		$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
		redirect('konsumen/Sewa', 'refresh');

	}

	function finish_and_rate($id){
		$status = $this->input->post('status_order');
		$rating = $this->input->post('rating');
		$komentar = $this->input->post('komentar');

		$this->db->query("INSERT INTO feedback_driver(id_order, rating, komentar) VALUES ('$id','$rating','$komentar')");

		$this->db->query("UPDATE order_sewa SET stat_cst = '1' WHERE id_order = '$id'");

		$notif_message = "Perjalanan selesai, trip closed";
		$notif_action = 'success'; //success,error,warning,question
		$this->session->set_flashdata('notifikasi', "<script type='text/javascript'>Swal.fire('$notif_message','','$notif_action')</script>");
		redirect('konsumen/Sewa', 'refresh');
	}


	function edit($id){

	}

	public function hapus($id)
	{

	}
}

/* End of file Cars.php */
