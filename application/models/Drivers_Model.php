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

	public function getDriverById($id)
	{
		return $this->db->where('id_driver',$id)->get('driver')->row();
	}

	public function list_available($tgl_pergi)
	{
		return $this->db->query("SELECT a.*, b.count FROM driver a
															LEFT JOIN (
																SELECT id_driver, COUNT(id_driver) as count
																FROM order_sewa
																GROUP BY id_driver
															) b
															USING(id_driver)
															 WHERE id_driver NOT IN
															 (SELECT id_driver FROM order_sewa WHERE date(tgl_pergi) = '$tgl_pergi' OR status = '4')
															 ORDER BY b.count ASC")->result();

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

	public function getAllDriverTrip()
	{
		return $this->db->select("id_driver,count(id_driver) as count_trip")
					 ->from('order_sewa')
					 ->where('status',3)
					 ->group_by('id_driver')
					 ->order_by('id_driver','ASC')
					 ->get()->result();
	}

	public function getDriverTrip($id)
	{
		return $this->db->select("count(id_driver) as count_trip")
					 ->from('order_sewa')
					 ->where('status', 3)
					 ->where('id_driver', $id)
					 ->group_by('id_driver')
					 ->get()->row();
	}

	public function getActiveDriver()
	{
		return $this->db->query("SELECT * FROM driver
								 JOIN users ON users.user_id = driver.user_id
								 ORDER BY driver.id_driver ASC
								")->result();
	}

}

?>
