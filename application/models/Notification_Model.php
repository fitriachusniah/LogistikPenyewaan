<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_Model extends CI_Model {

	public function insertToUser($subject, $message, $id_user){
			$this->db->insert('notifikasi', array(
				'message' => $message,
				'subject' => $subject,
				'status_notif' => 1,
				'user_id' => $id_user
			));
	}

	public function insertToRole($subject, $message, $role){
			$users = $this->db->select('user_id')->from('users')->where('role_id', $role)->get()->result();

			foreach ($users as $key => $value) {
				$this->db->insert('notifikasi', array(
					'message' => $message,
					'subject' => $subject,
					'status_notif' => 1,
					'user_id' => $value->user_id
				));
			}
	}

	public function getNotificationById($id){
			return $this->db->where('user_id', $id)->where('status_notif', 1)->get('notifikasi')->result();
	}

	public function getAllNotificationById($id){
			return $this->db->where('user_id', $id)->order_by('created_at', 'DESC')->get('notifikasi')->result();
	}

	public function updateStatusById($id){
		return $this->db->where('user_id', $id)->update('notifikasi', array('status_notif'=>0));
	}

}

?>
