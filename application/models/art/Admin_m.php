<?php
	class Admin_m extends CI_Model {
		public function getRow($id, $pw) {
			$sql = "select * from users where id11='$id' and pw11='$pw'";

			return $this->db->query($sql)->row();
		}
	}
?>