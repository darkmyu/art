<?php
	class Picture_m extends CI_Model {
		public function getlist($text1, $start, $limit) {
			if (!$text1) {
				$sql = "select picture.*, users.name11 as user_name11 from picture left join users on
						picture.user_no11=users.no11
						order by no11 desc
						limit $start, $limit";
			} else {
				$sql = "select picture.*, users.name11 as user_name11 from picture left join users on
						picture.user_no11=users.no11
						where title11 like '%$text1%' order by no11 desc limit $start, $limit";
			}

			return $this->db->query($sql)->result();
		}

		public function rowCount($text1) {
			if (!$text1) {
				$sql = "select * from picture";
			} else {
				$sql = "select * from picture where title11 like '%$text1%'";
			}

			return $this->db->query($sql)->num_rows();
		}

		public function getRow($no) {
			$sql = "select picture.*, users.name11 as user_name11 from picture left join users on
					picture.user_no11=users.no11
					where picture.no11=$no;";
			
			return $this->db->query($sql)->row();
		}

		public function deleteRow($no) {
			$sql = "delete from picture where no11=$no";

			return $this->db->query($sql);
		}

		public function insertRow($data) {
			return $this->db->insert("picture", $data);
		}

		public function updateRow($data, $no) {
			$where = array("no11" => $no);

			return $this->db->update("picture", $data, $where);
		}
	}
?>