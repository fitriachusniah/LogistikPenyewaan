<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_Model extends CI_Model {

	public function list()
	{
		return $this->db->query("SELECT * FROM fakultas
								 JOIN users ON users.user_id = fakultas.user_id
								 WHERE fakultas.deleted_at IS NULL
								 ORDER BY fakultas.fakultas_id
								")->result();
	}

	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_data($data,$id){
		$this->db->where('fakultas_id', $id);
        $this->db->update('fakultas', $data);
	}

	public function delete_data($id,$tgl)
    {
        $this->db->query("UPDATE fakultas SET deleted_at='$tgl'
        				  WHERE fakultas_id = '$id'");
    }


}

?>
