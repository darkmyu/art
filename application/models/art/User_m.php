<?php
	class User_m extends CI_Model {
		public function getlist($text1, $start, $limit) {
			if (!$text1) {
				$sql = "select * from users order by name11 limit $start, $limit";
			} else {
				$sql = "select * from users where name11 like '%$text1%' order by name11 limit $start, $limit";
			}

			return $this->db->query($sql)->result();
		}

		public function rowCount($text1) {
			if (!$text1) {
				$sql = "select * from users";
			} else {
				$sql = "select * from users where name11 like '%$text1%'";
			}

			return $this->db->query($sql)->num_rows();
		}

		public function getRow($no) {
			$sql = "select * from users where no11=$no";
			
			return $this->db->query($sql)->row();
		}

		public function deleteRow($no) {
			$sql = "delete from users where no11=$no";

			return $this->db->query($sql);
		}

		public function insertRow($data) {
			return $this->db->insert("users", $data);
		}

		public function updateRow($data, $no) {
			$where = array("no11" => $no);

			return $this->db->update("users", $data, $where);
		}

		public function getIdRow($id) {
			$sql = "select * from users where id11='$id'";

			return $this->db->query($sql)->row();
		}

		public function isPasswordCheck($no, $pw) {
			$sql = "select * from users where no11=$no";

			$row = $this->db->query($sql)->row();

			if ($row->pw11 == $pw) {
				return true;
			} else {
				return false;
			}
		}
	}
?>