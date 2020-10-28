<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends CI_Model {

	public function list()
	{
		return $this->db->query("SELECT * FROM users
								 ORDER BY user_id
								")->result();
	}

	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_data($data,$id){
		$this->db->where('user_id', $id);
        $this->db->update('users', $data);
	}

	public function delete_data($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
    }

    public function cekUser($username)
	{
		return $this->db->query("SELECT * FROM users WHERE user_name = '$username'")->row();
	}

	public function updateProfil($data, $user_id)
	{
		$this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
	}

}

?>
