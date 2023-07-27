<?php
	class Photo_m extends CI_Model {
		public function getlist($text1) {
			if (!$text1) {
				$sql = "select picture.*, users.name11 as user_name11, gallery.name11 as gallery_name11
						from picture left join users on
						picture.user_no11=users.no11 left join gallery on
						picture.gallery_no11=gallery.no11
						order by no11 desc";
			} else {
				$sql = "select picture.*, users.name11 as user_name11, gallery.name11 as gallery_name11
						from picture left join users on
						picture.user_no11=users.no11 left join gallery on
						picture.gallery_no11=gallery.no11
						where gallery.name11 like '%$text1%'
						order by no11 desc";
			}

			return $this->db->query($sql)->result();
		}

		public function rowCount($text1) {
			if (!$text1) {
				$sql = "select * from picture";
			} else {
				$sql = "select * from picture where name11 like '%$text1%'";
			}

			return $this->db->query($sql)->num_rows();
		}

		public function getRow($no) {
			$sql = "select * from picture where no11=$no";
			
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