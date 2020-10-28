<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa_Model extends CI_Model {

	////////////////////////FAKULTAS//////////////////////

	public function list_sewa($id_fakultas)
	{
		return $this->db->query("SELECT order_sewa.*,fakultas.*,driver.*,mobil.*, order_sewa.status as status_order, DATEDIFF(tgl_pergi,
									CURRENT_DATE()) as daysRemaining FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 LEFT JOIN driver ON order_sewa.id_driver = driver.id_driver
								 LEFT JOIN mobil ON order_sewa.id_mobil = mobil.id_mobil
								 WHERE id_fakultas = '$id_fakultas'
								 ORDER BY tgl_pergi ASC
								")->result();
	}

	///////////////////////ADMIN//////////////////////////

	public function list_sewa_masuk()
	{
		return $this->db->query("SELECT order_sewa.*,fakultas.*,driver.nama_driver,decline_reason.alasan, DATEDIFF(tgl_pergi,CURRENT_DATE()) as daysRemaining,
										order_sewa.status as status_order
								 FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 LEFT JOIN decline_reason ON order_sewa.id_order = decline_reason.id_order
								 LEFT JOIN driver ON decline_reason.id_driver = driver.id_driver
								 WHERE order_sewa.status = '0'
 								 ORDER BY tgl_pergi ASC
								")->result();
	}

	public function list_sewa_menunggu_driver()
	{
		return $this->db->query("SELECT order_sewa.*,fakultas.*,driver.*,mobil.*, DATEDIFF(tgl_pergi,CURRENT_DATE()) as daysRemaining,
										order_sewa.status as status_order
								 FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 LEFT JOIN driver ON order_sewa.id_driver = driver.id_driver
								 LEFT JOIN mobil ON order_sewa.id_mobil = mobil.id_mobil
								 WHERE order_sewa.status = '1'
 								 ORDER BY tgl_pergi ASC
								")->result();
	}

	public function list_sewa_menunggu_perjalanan()
	{
		return $this->db->query("SELECT order_sewa.*,fakultas.*,driver.*,mobil.*, DATEDIFF(tgl_pergi,CURRENT_DATE()) as daysRemaining,
										order_sewa.status as status_order
								 FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 LEFT JOIN driver ON order_sewa.id_driver = driver.id_driver
								 LEFT JOIN mobil ON order_sewa.id_mobil = mobil.id_mobil
								 WHERE (order_sewa.status = '2' OR order_sewa.status = '6')
 								 ORDER BY tgl_pergi ASC
								")->result();
	}

	public function list_sewa_selesai()
	{
		return $this->db->query("SELECT order_sewa.*,fakultas.*,driver.*,mobil.*, DATEDIFF(tgl_pergi,CURRENT_DATE()) as daysRemaining,
										order_sewa.status as status_order
								 FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 LEFT JOIN driver ON order_sewa.id_driver = driver.id_driver
								 LEFT JOIN mobil ON order_sewa.id_mobil = mobil.id_mobil
								 WHERE order_sewa.status = '3'
 								 ORDER BY tgl_pergi ASC
								")->result();
	}

	public function list_sewa_ditolak()
	{
		return $this->db->query("SELECT order_sewa.*,fakultas.*,driver.*,mobil.*, DATEDIFF(tgl_pergi,CURRENT_DATE()) as daysRemaining,
										order_sewa.status as status_order
								 FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 LEFT JOIN driver ON order_sewa.id_driver = driver.id_driver
								 LEFT JOIN mobil ON order_sewa.id_mobil = mobil.id_mobil
								 WHERE order_sewa.status = '5'
 								 ORDER BY tgl_pergi ASC
								")->result();
	}

	/////////////////////////DRIVER////////////////////////////////

	public function driver_list_sewa_masuk($id)
	{
		return $this->db->query("SELECT order_sewa.*,fakultas.*,driver.*,mobil.*, order_sewa.status as status_order,DATEDIFF(tgl_pergi,CURRENT_DATE()) as daysRemaining FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 JOIN driver ON order_sewa.id_driver = driver.id_driver
								 JOIN mobil ON order_sewa.id_mobil = mobil.id_mobil
								 WHERE order_sewa.id_driver = '$id' AND order_sewa.status = '1'
 								 ORDER BY tgl_pergi ASC
								")->result();
	}

	public function driver_list_sewa_menunggu_perjalanan($id)
	{
		return $this->db->query("SELECT order_sewa.*,fakultas.*,driver.*,mobil.*, DATEDIFF(tgl_pergi,CURRENT_DATE()) as daysRemaining,
										order_sewa.status as status_order
								 FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 LEFT JOIN driver ON order_sewa.id_driver = driver.id_driver
								 LEFT JOIN mobil ON order_sewa.id_mobil = mobil.id_mobil
								 WHERE order_sewa.id_driver = '$id' AND (order_sewa.status = '4' OR order_sewa.status = '2')
 								 ORDER BY tgl_pergi ASC
								")->result();
	}

	public function driver_list_sewa_selesai($id)
	{
		return $this->db->query("SELECT order_sewa.*,fakultas.*,driver.*,mobil.*, DATEDIFF(tgl_pergi,CURRENT_DATE()) as daysRemaining,
										order_sewa.status as status_order
								 FROM order_sewa
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 LEFT JOIN driver ON order_sewa.id_driver = driver.id_driver
								 LEFT JOIN mobil ON order_sewa.id_mobil = mobil.id_mobil
								 WHERE order_sewa.id_driver = '$id' AND (order_sewa.status = '3' OR order_sewa.status = '6')
 								 ORDER BY tgl_pergi ASC
								")->result();
	}


	public function driver_list_sewa_ditolak($id)
	{
		return $this->db->query("SELECT order_sewa.*,decline_reason.alasan,fakultas.*,
										order_sewa.status as status_order
								 FROM order_sewa
								 JOIN decline_reason ON decline_reason.id_order = order_sewa.id_order
								 JOIN fakultas ON order_sewa.id_fakultas = fakultas.fakultas_id
								 WHERE decline_reason.id_driver = '$id'
								")->result();
	}

	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function terima_data($data,$id){
		$this->db->where('id_order', $id);
        $this->db->update('order_sewa', $data);
	}

	public function tolak_data($id)
    {

    }

    public function getRequestsTotal()
	{
		return $this->db->query("SELECT COUNT(id_order) as jmlRequest FROM order_sewa WHERE status = '0'")->row();
	}

	public function getApprovedTotal()
	{
		return $this->db->query("SELECT COUNT(id_order) as jmlApproved FROM order_sewa WHERE status = '1'")->row();
	}

	public function getCostTotalThisMonth()
	{
		return $this->db->query("SELECT SUM(cost) as thisMonthCost FROM order_sewa WHERE (status = '1' OR status = '2' OR status = '3') AND MONTH(tgl_pergi) = MONTH(CURRENT_DATE())")->row();
	}
}

?>
