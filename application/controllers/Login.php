<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_Model');
		$this->load->model('Sewa_Model');
		$this->load->model('Drivers_Model');
		$this->load->model('Cars_Model');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data = [
			'title'	=> 'Auth',
			'info' => ''
		];
		$this->load->view('Auth', $data);
	}

	public function login()
	{
		$username = $this->input->post('user_name');
		$password = $this->input->post('user_password');
		$cek 	  = $this->Login_Model->cekLogin($username,md5($password));
		//print_r($cek);

		if ($cek) {
			if($cek->role_id == '1'){

				$data_session = array(
						'user_name' 	=> $cek->user_name,
						'role' 			=> $cek->role_name,
						'user_id'		=> $cek->user_id,
						'status' 		=> 'login',
						'month'		    => date("F"),
				);

				$this->session->set_userdata($data_session);
				// $this->load->view('admin/Dashboard',$data_session);
				redirect(base_url('admin/Dashboard'),'refresh');


			}else if($cek->role_id == '2'){

					if ($cek->user_status != '1') {
						$data['info'] = 'Maaf akun anda tidak aktif silahkan hubungi admin';
						$this->load->view('Auth',$data);
					}else{
						$driver = $this->db->query("SELECT * FROM driver WHERE user_id = '$cek->user_id'")->row();
						$data_session = array(
							'user_name' 	=> $cek->user_name,
							'role' 			=> $cek->role_name,
							'user_id' 		=> $cek->user_id,
							'id' 			=> $driver->id_driver,
							'name' 			=> $driver->nama_driver,
							'status'		=> 'login',
							// 'list_sewa_masuk'     => $this->Sewa_Model->driver_list_sewa_masuk($driver->id_driver),
						);

						$this->session->set_userdata($data_session);
						// $this->load->view('driver/Dashboard',$data_session);
						redirect(base_url().'driver/Dashboard','refresh');
					}
			}else if($cek->role_id == '3'){

					if ($cek->user_status != '1') {
						$data['info'] = 'Maaf akun anda tidak aktif silahkan mendaftar';
						$this->load->view('auth',$data);
					}else{
						$fakultas = $this->db->query("SELECT * FROM fakultas WHERE user_id = '$cek->user_id'")->row();
						$idf = $fakultas->fakultas_id;
						$cek_pinjaman = $this->db->query("SELECT * FROM order_sewa WHERE id_fakultas = '$idf' AND (status = '2' OR status = '6')")->row();

						$x = 0;
						if($cek_pinjaman){
							$x=1;
						}

						$data_session = array(
							'user_name' 	=> $cek->user_name,
							'role' 			=> $cek->role_name,
							'user_id' 		=> $cek->user_id,
							'id' 			=> $fakultas->fakultas_id,
							'name' 			=> $fakultas->nama_fakultas,
							'status'		=> 'login',
							'sewa_action'  => base_url('konsumen/Sewa/add'),
							'cek_pinjaman'  => $x,
							'belum_disetujui_admin' => $this->Sewa_Model->konsumen_belum_disetujui($fakultas->fakultas_id),
							'disetujui_admin' => $this->Sewa_Model->konsumen_disetujui($fakultas->fakultas_id),
							'selesai' => $this->Sewa_Model->konsumen_selesai($fakultas->fakultas_id),
							'ditolak' => $this->Sewa_Model->konsumen_ditolak($fakultas->fakultas_id),
						);

						$this->session->set_userdata($data_session);
						// $this->load->view('konsumen/Dashboard',$data_session);
						redirect(base_url().'konsumen/Dashboard','refresh');
					}
			}
		}else{
			$data['info'] = 'Wrong username or password, please try again.';
			$this->load->view('auth',$data);
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}

}
