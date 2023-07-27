<?php
	class My extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model("art/picture_m");
			$this->load->model("art/gallery_m");
			$this->load->model("art/user_m");
			$this->load->model("art/photo_m");
			$this->load->helper('url');
			$this->load->helper("file");
			$this->load->library("form_validation");
			$this->load->library("pagination");
			$this->load->library("upload");
			$this->load->library("image_lib");
		}

		public function index() {
			if (!$this->session->userdata("id")) {
				redirect("/~sale11/art");
			}
			$data["pageName"] = "MyPage";
			$data["user"] = $this->user_m->getIdRow($this->session->userdata("id"));

			$this->load->view("art/index_header.php", $data);
			$this->load->view("art/_myPages/index.php", $data);
			$this->load->view("art/index_footer.php", $data);
		}

		public function editAccount() {
			if (!$this->session->userdata("id")) {
				redirect("/~sale11/art");
			}

			$this->form_validation->set_rules("name", "이름", "required|max_length[20]");
			$this->form_validation->set_rules("pw", "비밀번호", "required|max_length[20]");
			$this->form_validation->set_rules("npw", "새 비밀번호", "required|max_length[20]");

			$no = $this->session->userdata("no");

			if ($this->form_validation->run() == FALSE) {
				$data["row"] = $this->user_m->getRow($no);
				$data["pageName"] = "MyPage";
				$data["user"] = $this->user_m->getIdRow($this->session->userdata("id"));
				$data["message"] = "";
				
				$this->load->view("art/index_header.php", $data);
				$this->load->view("art/_myPages/editAccount.php", $data);
				$this->load->view("art/index_footer.php");
			} else {
				$name = $this->input->post("name", TRUE);
				$pw = $this->input->post("pw", TRUE);
				$npw = $this->input->post("npw", TRUE);
				$check = $this->input->post("check", TRUE);

				// 이름 또는 비밀번호 변경
				if ($check) {
					if (!$this->user_m->isPasswordCheck($no, $pw)) { // 기존 비밀번호가 맞지 않는 경우
						$data["row"] = $this->user_m->getRow($no);
						$data["pageName"] = "MyPage";
						$data["user"] = $this->user_m->getIdRow($this->session->userdata("id"));
						$data["message"] = "비밀번호가 맞지 않습니다!";
	
						$this->load->view("art/index_header.php", $data);
						$this->load->view("art/_myPages/editAccount.php", $data);
						$this->load->view("art/index_footer.php");
					} else { // 기존 비밀번호가 맞는 경우
						$data = array(
							"name11" => $name,
							"pw11" => $npw,
						);
	
						$this->user_m->updateRow($data, $no);
	
						redirect("/~sale11/art/my");
					}
				} else {
					if ($pw == $npw) {
						$data = array(
							"name11" => $name,
							"pw11" => $pw,
						);
	
						$this->user_m->updateRow($data, $no);
	
						redirect("/~sale11/art/my");
					} else {
						$data["row"] = $this->user_m->getRow($no);
						$data["pageName"] = "MyPage";
						$data["user"] = $this->user_m->getIdRow($this->session->userdata("id"));
						$data["message"] = "이름만 변경하는 경우 현재 비밀번호와 새 비밀번호를 동일하게 입력해주세요.";
	
						$this->load->view("art/index_header.php", $data);
						$this->load->view("art/_myPages/editAccount.php", $data);
						$this->load->view("art/index_footer.php");
					}
				}
			}
		}

		public function viewPhoto() {
			if (!$this->session->userdata("id")) {
				redirect("/~sale11/art");
			}

			$uri_array = $this->uri->uri_to_assoc(4);
			$text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";

			$data["pageName"] = "MyPage";
			$data["list"] = $this->photo_m->getlist($text1);
			$data["text1"] = $text1;
			$data["user"] = $this->user_m->getIdRow($this->session->userdata("id"));
			$data["gallerys"] = $this->gallery_m->getListDefault();

			$this->load->view('art/index_header.php', $data);
			$this->load->view('art/_myPages/viewPhoto.php', $data);
			$this->load->view('art/index_footer.php');
		}

		public function editPhoto() {
			if (!$this->session->userdata("id")) {
				redirect("/~sale11/art");
			}

			$this->form_validation->set_rules("title", "제목", "required|max_length[50]");
			$this->form_validation->set_rules("content", "본문", "required|max_length[100]");
			$this->form_validation->set_rules("gallery_no", "장르", "required");

			$uri_array = $this->uri->uri_to_assoc(4);
			$text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";

			$no = $text1;

			$row = $this->photo_m->getRow($no);

			if ($row->user_no11 != $this->session->userdata("no")) {
				redirect("/~sale11/art");
			}

			if ($this->form_validation->run() == FALSE) {
				$data["pageName"] = "MyPage";
				$data["row"] = $this->photo_m->getRow($no);
				$data["user"] = $this->user_m->getIdRow($this->session->userdata("id"));
				$data["gallerys"] = $this->gallery_m->getListDefault();

				$this->load->view('art/index_header.php', $data);
				$this->load->view('art/_myPages/editPhoto.php', $data);
				$this->load->view('art/index_footer.php');
			} else {
				$title = $this->input->post("title", TRUE);
				$content = $this->input->post("content", TRUE);
				$gallery_no = $this->input->post("gallery_no", TRUE);

				$data = array(
					"title11" => $title,
					"content11" => $content,
					"gallery_no11" => $gallery_no, // 갤러리 태그
				);

				$picname = $this->call_upload();

				if ($picname) {
					$data["pic11"] = $picname;
				}

				$this->picture_m->updateRow($data, $no);

				redirect("/~sale11/art/my/viewPhoto");
			}
		}

		// Delete
		public function deletePhoto() {
			if (!$this->session->userdata('id')) {
				redirect("/~sale11/art");
			}
			
			// URI 관련 변수
			$uri_array = $this->uri->uri_to_assoc(4);
			$no = array_key_exists("no", $uri_array) ? urldecode($uri_array["no"]) : "";

			
			$row = $this->photo_m->getRow($no);

			if ($row->user_no11 != $this->session->userdata("no")) {
				redirect("/~sale11/art");
			}

			$this->picture_m->deleteRow($no);

			redirect("/~sale11/art/my/viewPhoto");
		}

		public function call_upload() {
			date_default_timezone_set('Asia/Seoul');

			$picname = date("Y-m-d_H:i:s")."_".$this->session->userdata("id");

			$config['upload_path'] = './img/picture';
			$config['file_name'] = $picname;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = TRUE;
			$config['max_size'] = 10000000;
			$config['max_width'] = 100000;
			$config['max_height'] = 100000;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('pic')) {
				$picname = "";
			} else {
				$picname = $this->upload->data('file_name');

				$config['image_library'] = 'gd2';
				$config['source_image'] = './img/picture/' . $picname;
				$config['new_image'] = './img/picture_thumb';
				$config['thumb_marker'] = '';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 900;
				$config['height'] = 750;

				$this->image_lib->initialize($config);
				$this->image_lib->resize();
			}

			return $picname;
		}
	}
?>