<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_Model extends CI_Model {

	public function list()
	{
		return $this->db->query("SELECT * FROM mobil
								 ORDER BY mobil.id_mobil
								")->result();
	}

	public function list_available($tgl_pergi)
	{
		return $this->db->query("SELECT * FROM mobil 
								 WHERE id_mobil NOT IN (SELECT id_mobil FROM order_sewa WHERE date(tgl_pergi) = '$tgl_pergi')")->result();
	}

	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_data($data,$id){
		$this->db->where('id_mobil', $id);
        $this->db->update('mobil', $data);
	}

	public function delete_data($id)
    {
        $this->db->query("DELETE FROM mobil
        				  WHERE id_mobil = '$id'");
    }

    public function getCarsTotal()
	{
		return $this->db->query("SELECT COUNT(id_mobil) as jmlMobil FROM mobil")->row();
	}

}

?>
