<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->model('Users_Model');
		$this->load->model('Fakultas_Model');
		$this->load->model('Sewa_Model');
	    require 'session.php';
	}

	function index(){
		$fakultas_id = $this->session->userdata('id');
		$cek_pinjaman = $this->db->query("SELECT * FROM order_sewa WHERE id_fakultas = '$fakultas_id' AND stat_cst='0' AND (stat_drv='2' OR status='1')")->row();

		$x = 0;
		if($cek_pinjaman){
			$x=1;
		}
		$data = array(
			'sewa_action'  => base_url('konsumen/Sewa/add'),
			'cek_pinjaman'  => $x,
			'belum_disetujui_admin' => $this->Sewa_Model->konsumen_belum_disetujui($fakultas_id),
			'disetujui_admin' => $this->Sewa_Model->konsumen_disetujui($fakultas_id),
			'selesai' => $this->Sewa_Model->konsumen_selesai($fakultas_id),
			'ditolak' => $this->Sewa_Model->konsumen_ditolak($fakultas_id),
		);
		$this->load->view('konsumen/Dashboard',$data);
		// echo "$x";
		// print_r($cek_pinjaman);
	}

	function update_profile($id){
		$fakultas = $this->db->query("SELECT * FROM fakultas JOIN users ON fakultas.user_id=users.user_id WHERE fakultas_id = '$id'")->row();
		$data = array(
			'id_fakultas'		  => $id,
			'nama_fakultas'		  => $fakultas->nama_fakultas,
			'nama_kaur' 		  => $fakultas->nama_kaur,
			'jabatan'			  => $fakultas->jabatan,
			'no_hp'				  => $fakultas->no_hp,
			'user_id'			  => $fakultas->user_id,
			'user_name'			  => $fakultas->user_name,
			'password'			  => $fakultas->user_password,
			'edit_action'         => base_url('konsumen/Dashboard/konsumen_edit_profile'),
		);
		$this->load->view('konsumen/Update_Profile',$data);
		
	}

	function konsumen_edit_profile($id){
		$fakultas_id      	= $id;
		$nama_fakultas    	= $this->input->post('nama_fakultas');
		$nama_kaur        	= $this->input->post('nama_kaur');
		$jabatan	      	= $this->input->post('jabatan');
		$no_hp            	= $this->input->post('no_hp');

		$fakultas_userid	= $this->input->post('user_id');
		$fakultas_username  = $this->input->post('user_name');
		$fakultas_password  = $this->input->post('user_password');

		$fakultas_user = array(
			'user_name'			=> $fakultas_username,
			'user_password'		=> md5($fakultas_password),
		);

		$this->Users_Model->edit_data($fakultas_user,$fakultas_userid);

		// $updated_at       = date("Y-m-d H:i:s");
		$data = array(
			'nama_fakultas' => $nama_fakultas, 
			'nama_kaur' 	=> $nama_kaur, 
			'jabatan' 		=> $jabatan,     
			'no_hp' 		=> $no_hp,   
		);
		$this->Fakultas_Model->edit_data($data,$fakultas_id);

		// print_r($data);
		redirect('konsumen/Dashboard', 'refresh');
	}
 
	
}

/* End of file Dashboard.php */


?>
