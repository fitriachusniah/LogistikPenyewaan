<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers_Model extends CI_Model {

	public function list()
	{
		return $this->db->query("SELECT driver.*,users.*, AVG(feedback_driver.rating) as avg_rating FROM driver
								 JOIN users ON users.user_id = driver.user_id
								 LEFT JOIN order_sewa ON order_sewa.id_driver = driver.id_driver
								 LEFT JOIN feedback_driver ON feedback_driver.id_order = order_sewa.id_order
								 WHERE driver.deleted_at IS NULL
								 GROUP BY driver.id_driver
								 ORDER BY driver.id_driver
								")->result();
	}

	public function getDriverById($id)
	{
		return $this->db->query("SELECT driver.*, order_sewa.*, feedback_driver.*, fakultas.*, mobil.*, AVG(feedback_driver.rating) as avg_rating
								 FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 JOIN mobil ON order_sewa.id_mobil = mobil.id_mobil
								 JOIN driver ON order_sewa.id_driver = driver.id_driver
								 JOIN feedback_driver ON feedback_driver.id_order = order_sewa.id_order
								 WHERE driver.id_driver = '$id'
								 GROUP BY order_sewa.id_order
								")->result();
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
															 (SELECT id_driver FROM order_sewa WHERE date(tgl_pergi) = '$tgl_pergi' OR stat_drv = '1')
															 AND a.deleted_at IS NULL
															 ORDER BY b.count ASC")->result();

	}

	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_data($data,$id){
		$this->db->where('id_driver', $id);
        $this->db->update('driver', $data);
	}

	public function delete_data($id,$tgl)
    {
        $this->db->query("UPDATE driver SET deleted_at='$tgl'
        				  WHERE id_driver = '$id'");
    }

    public function getDriversTotal()
	{
		return $this->db->query("SELECT COUNT(id_driver) as jmlDriver FROM driver WHERE driver.deleted_at IS NULL")->row();
	}

	public function getAllDriverTrip()
	{
		return $this->db->select("id_driver,count(id_driver) as count_trip")
					 ->from('order_sewa')
					 ->where('status',1)
					 ->group_by('id_driver')
					 ->order_by('id_driver','ASC')
					 ->get()->result();
	}

	public function getDriverTrip($id)
	{
		return $this->db->select("count(id_driver) as count_trip")
					 ->from('order_sewa')
					 ->where('status', 1)
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

	public function getDriverLocation($id, $last_update_time){
		return $this->db->select("latitude, longitude, gps_update_time, id_driver")
					 ->from('driver')
					 ->where('id_driver', $id)
					 ->where('gps_update_time >', $last_update_time)
					 ->get()->row();
	}

	public function updateNewLocation($id, $data){
			return $this->db->where('id_driver', $id)->update('driver', $data);
	}

}

?>
