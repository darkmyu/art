<?php
	class Gallery extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model("art/gallery_m");
			$this->load->helper('url');
			$this->load->library("form_validation");
			$this->load->library("pagination");
			$this->load->library("upload");
			$this->load->library("image_lib");

			$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
			$this->output->set_header('Cache-Control: no-cache, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
			$this->output->set_header('Pragma: no-cache');
		}

		public function index() {
			if ($this->session->userdata('id') && $this->session->userdata('rank') == 1) {
				$this->lists();
			} else {
				$this->load->view('art/adminPages/login.php');
			}
		}

		public function lists() {
			
			// URI 관련 변수
			$uri_array = $this->uri->uri_to_assoc(4);
			$text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";

			// pagination
			if ($text1 == "") {
				$base_url = "/art/gallery/lists/page";
			} else {
				$base_url = "/art/gallery/lists/text1/$text1/page";
			}

			$page_segment = substr_count(substr($base_url, 0, strpos($base_url, "page")), "/") + 1;
			$base_url = "/~sale11".$base_url;

			$config["per_page"] = 5;
			$config["total_rows"] = $this->gallery_m->rowCount($text1);
			$config["uri_segment"] = $page_segment;
			$config["base_url"] = $base_url;
			$this->pagination->initialize($config);

			// view post data
			$data["page"] = $this->uri->segment($page_segment, 0);
			$data["pagination"] = $this->pagination->create_links();

			$start = $data["page"]; // start page number
			$limit = $config["per_page"]; // line number

			$data["text1"] = $text1;
			$data["list"] = $this->gallery_m->getlist($text1, $start, $limit);

			$this->load->view("art/adminPages/index_header.php");
			$this->load->view("art/adminPages/gallery/list.php", $data);
			$this->load->view("art/adminPages/index_footer.php");
		}

		// Create
		public function add() {
			if (!$this->session->userdata('id') && $this->session->userdata('rank') != 1) {
				redirect("/~sale11/art");
			}

			$uri_array = $this->uri->uri_to_assoc(4);

			// validate setting
			$this->form_validation->set_rules("name", "이름", "required|max_length[20]");

			if ($this->form_validation->run() == FALSE) {
				$text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
				$page = array_key_exists("page", $uri_array) ? urldecode($uri_array["page"]) : "";

				$data["text1"] = $text1;
				$data["page"] = $page;

				$this->load->view("art/adminPages/index_header.php");
				$this->load->view("art/adminPages/gallery/add.php", $data);
				$this->load->view("art/adminPages/index_footer.php");
			} else {
				$data = array(
					"name11" => $this->input->post("name", TRUE),
				);

				$picname = $this->call_upload();
				if ($picname) {
					$data["pic11"] = $picname;
				}

				// URI 관련 변수
				$text1 = array_key_exists("text1", $uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
				$page = array_key_exists("page", $uri_array) ? "/page/".urldecode($uri_array["page"]) : "";

				$this->gallery_m->insertRow($data);

				redirect("/~sale11/art/gallery/index".$text1.$page);
			}
		}

		// Delete
		public function delete() {
			// URI 관련 변수
			$uri_array = $this->uri->uri_to_assoc(4);
			$no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "";
			$text1 = array_key_exists("text1", $uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page", $uri_array) ? "/page/".urldecode($uri_array["page"]) : "";

			$this->gallery_m->deleteRow($no);

			redirect("/~sale11/art/gallery/index".$text1.$page);
		}

		// Update
		public function edit() {
			if (!$this->session->userdata('id') && $this->session->userdata('rank') != 1) {
				redirect("/~sale11/art");
			}
			
			// URI 관련 변수
			$uri_array = $this->uri->uri_to_assoc(4);
			$no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "";

			// validate setting
			$this->form_validation->set_rules("name", "이름", "required|max_length[20]");

			if ($this->form_validation->run() == FALSE) {
				$text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
				$page = array_key_exists("page", $uri_array) ? urldecode($uri_array["page"]) : "";

				$data["row"] = $this->gallery_m->getRow($no);
				$data["no"] = $no;
				$data["text1"] = $text1;
				$data["page"] = $page;
				
				$this->load->view("art/adminPages/index_header.php");
				$this->load->view("art/adminPages/gallery/edit.php", $data);
				$this->load->view("art/adminPages/index_footer.php");
			} else {
				$text1 = array_key_exists("text1", $uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
				$page = array_key_exists("page", $uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
				
				$data = array(
					"name11" => $this->input->post("name", TRUE),
				);

				$picname = $this->call_upload();
				if ($picname) {
					$data["pic11"] = $picname;
				}

				$this->gallery_m->updateRow($data, $no);

				redirect("/~sale11/art/gallery/index".$text1.$page);
			}
		}

		public function call_upload() {
			$config['upload_path'] = './img/gallery/';
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
				$config['source_image'] = './img/gallery/' . $picname;
				$config['thumb_marker'] = '';
				$config['new_image'] = './img/gallery/thumb';
				$config['width'] = 900;
				$config['height'] = 874;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = FALSE;

				$this->image_lib->initialize($config);
				$this->image_lib->resize();
			}

			return $picname;
		}
	}
?>