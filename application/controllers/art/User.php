<?php
	class User extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model("art/user_m");
			$this->load->helper(array("url", "date"));
			$this->load->library("form_validation");
			$this->load->library("pagination");

			$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
			$this->output->set_header('Cache-Control: no-cache, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
			$this->output->set_header('Pragma: no-cache');
		}

		public function index() {
			// /~sale11/art : MainPage
			if ($this->session->userdata('rank') != 1) {
				redirect("/~sale11/art");
			}

			$this->lists();
		}

		public function lists() {
			if ($this->session->userdata('rank') != 1) {
				redirect("/~sale11/art");
			}
						
			// URI 관련 변수
			$uri_array = $this->uri->uri_to_assoc(4);
			$no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "";
			$text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";

			// pagination
			if ($text1 == "") {
				$base_url = "/art/user/lists/page";
			} else {
				$base_url = "/art/user/lists/text1/$text1/page";
			}

			$page_segment = substr_count(substr($base_url, 0, strpos($base_url, "page")), "/") + 1;
			$base_url = "/~sale11".$base_url;

			$config["per_page"] = 5;
			$config["total_rows"] = $this->user_m->rowCount($text1);
			$config["uri_segment"] = $page_segment;
			$config["base_url"] = $base_url;
			$this->pagination->initialize($config);

			// view post data
			$data["page"] = $this->uri->segment($page_segment, 0);
			$data["pagination"] = $this->pagination->create_links();

			$start = $data["page"]; // start page number
			$limit = $config["per_page"]; // line number

			$data["text1"] = $text1;
			$data["list"] = $this->user_m->getlist($text1, $start, $limit);

			$this->load->view("art/adminPages/index_header.php");
			$this->load->view("art/adminPages/user/list.php", $data);
			$this->load->view("art/adminPages/index_footer.php");
		}

		// // Create
		public function add() {
			if ($this->session->userdata('rank') != 1) {
				redirect("/~sale11/art");
			}

			// URI 관련 변수
			$uri_array = $this->uri->uri_to_assoc(4);
			$text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page", $uri_array) ? urldecode($uri_array["page"]) : "";

			// validate setting
			$this->form_validation->set_rules("name", "이름", "required|max_length[20]");
			$this->form_validation->set_rules("uid", "아이디", "required|max_length[20]");
			$this->form_validation->set_rules("pwd", "암호", "required|max_length[20]");

			if ($this->form_validation->run() == FALSE) {
				$data["text1"] = $text1;
				$data["page"] = $page;
				
				$this->load->view("art/adminPages/index_header.php");
				$this->load->view("art/adminPages/user/add.php", $data);
				$this->load->view("art/adminPages/index_footer.php");
			} else {
				$data = array(
					"name11" => $this->input->post("name", TRUE),
					"id11" => $this->input->post("uid", TRUE),
					"pw11" => $this->input->post("pwd", TRUE),
					"rank11" => $this->input->post("rank", TRUE),
				);

				// URI 관련 변수
				$uri_array = $this->uri->uri_to_assoc(4);
				$no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "";
				$text1 = array_key_exists("text1", $uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
				$page = array_key_exists("page", $uri_array) ? "/page/".urldecode($uri_array["page"]) : "";

				$this->user_m->insertRow($data);

				redirect("/~sale11/art/user/index".$text1.$page);
			}
		}

		// Update
		public function edit() {
			if ($this->session->userdata('rank') != 1) {
				redirect("/~sale11/art");
			}
			
			// URI 관련 변수
			$uri_array = $this->uri->uri_to_assoc(4);
			$no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "";

			// validate setting
			$this->form_validation->set_rules("name", "이름", "required|max_length[20]");
			$this->form_validation->set_rules("uid", "아이디", "required|max_length[20]");
			$this->form_validation->set_rules("pwd", "암호", "required|max_length[20]");

			if ($this->form_validation->run() == FALSE) {
				$text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";
				$page = array_key_exists("page", $uri_array) ? urldecode($uri_array["page"]) : "";

				$data["row"] = $this->user_m->getRow($no);
				$data["no"] = $no;
				$data["text1"] = $text1;
				$data["page"] = $page;
				
				$this->load->view("art/adminPages/index_header.php");
				$this->load->view("art/adminPages/user/edit.php", $data);
				$this->load->view("art/adminPages/index_footer.php");
			} else {
				$data = array(
					"name11" => $this->input->post("name", TRUE),
					"id11" => $this->input->post("uid", TRUE),
					"pw11" => $this->input->post("pwd", TRUE),
					"rank11" => $this->input->post("rank", TRUE),
				);

				$this->user_m->updateRow($data, $no);

				$text1 = array_key_exists("text1", $uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
				$page = array_key_exists("page", $uri_array) ? "/page/".urldecode($uri_array["page"]) : "";

				redirect("/~sale11/art/user/index".$text1.$page);
			}
		}

		// Delete
		public function delete() {
			if ($this->session->userdata('rank') != 1) {
				redirect("/~sale11/art");
			}
			
			// URI 관련 변수
			$uri_array = $this->uri->uri_to_assoc(4);
			$no = array_key_exists("no", $uri_array) ? $uri_array["no"] : "";
			$text1 = array_key_exists("text1", $uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page", $uri_array) ? "/page/".urldecode($uri_array["page"]) : "";

			$this->user_m->deleteRow($no);

			redirect("/~sale11/art/user/index".$text1.$page);
		}
	}
?>