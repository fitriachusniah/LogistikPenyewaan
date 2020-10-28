<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_Model extends CI_Model {

	public function list()
	{
		return $this->db->query("SELECT * FROM fakultas
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

	public function delete_data($id)
    {
        $this->db->query("DELETE FROM fakultas
        				  WHERE fakultas_id = '$id'");
    }


}

?>
