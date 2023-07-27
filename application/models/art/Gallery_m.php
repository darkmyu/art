<?php
	class Gallery_m extends CI_Model {
		public function getlist($text1, $start, $limit) {
			if (!$text1) {
				$sql = "select * from gallery order by no11 limit $start, $limit";
			} else {
				$sql = "select * from gallery where name11 like '%$text1%' order by no11 limit $start, $limit";
			}

			return $this->db->query($sql)->result();
		}

		public function getListDefault() {
			$sql = "select * from gallery order by no11";

			return $this->db->query($sql)->result();
		}

		public function rowCount($text1) {
			if (!$text1) {
				$sql = "select * from gallery";
			} else {
				$sql = "select * from gallery where name11 like '%$text1%'";
			}

			return $this->db->query($sql)->num_rows();
		}

		public function getRow($no) {
			$sql = "select * from gallery where no11=$no";
			
			return $this->db->query($sql)->row();
		}

		public function deleteRow($no) {
			$sql = "delete from gallery where no11=$no";

			return $this->db->query($sql);
		}

		public function insertRow($data) {
			return $this->db->insert("gallery", $data);
		}

		public function updateRow($data, $no) {
			$where = array("no11" => $no);

			return $this->db->update("gallery", $data, $where);
		}
	}
?>