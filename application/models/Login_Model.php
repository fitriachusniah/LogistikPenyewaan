<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public function cekLogin($user,$pass)
	{
		return $this->db->query("SELECT * FROM users 
								 JOIN role_group ON users.role_id = role_group.role_id
								 WHERE user_name='$user' AND user_password='$pass'")->row();
	}

}

?>
