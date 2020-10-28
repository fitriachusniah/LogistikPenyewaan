<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers_Model extends CI_Model {

	public function list()
	{
		return $this->db->query("SELECT * FROM driver
								 JOIN users ON users.user_id = driver.user_id
								 ORDER BY driver.id_driver
								")->result();
	}

	public function list_available($tgl_pergi)
	{
		return $this->db->query("SELECT * FROM driver 
								 WHERE id_driver NOT IN (SELECT id_driver FROM order_sewa WHERE date(tgl_pergi) = '$tgl_pergi' OR status = '4')")->result();
		// return $this->db->query("SELECT COUNT(`id_order`) as Num, driver.* FROM driver
		// 						 LEFT JOIN order_sewa ON driver.id_driver = order_sewa.id_driver 
								
		// 						GROUP BY order_sewa.id_driver
		// 						ORDER BY CASE
		// 						            WHEN order_sewa.id_driver = 0 THEN -1
		// 						            ELSE COUNT(order_sewa.id_order)
		// 						          END DESC
		// 						 ")->result();
	}

	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_data($data,$id){
		$this->db->where('id_driver', $id);
        $this->db->update('driver', $data);
	}

	public function delete_data($id)
    {
        $this->db->query("DELETE FROM driver
        				  WHERE id_driver = '$id'");
    }

    public function getDriversTotal()
	{
		return $this->db->query("SELECT COUNT(id_driver) as jmlDriver FROM driver")->row();
	}

}

?>
