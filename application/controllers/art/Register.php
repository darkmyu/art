<?php
	class Register extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model("art/user_m");
			$this->load->helper(array("url", "date"));
			$this->load->library("form_validation");
		}

		public function index() {
			if ($this->session->userdata('id')) {
				redirect("/~sale11/art");
			} else {
				$this->register();
			}
		}

		// // Create
		public function register() {
			
			// validate setting
			$this->form_validation->set_rules("name", "이름", "required|max_length[20]");
			$this->form_validation->set_rules("id", "아이디", "required|max_length[20]");
			$this->form_validation->set_rules("pw", "암호", "required|max_length[20]");
			
			if ($this->form_validation->run() == FALSE) {
				$data["message"] = "";

				$this->load->view("art/adminPages/register.php", $data);
			} else {
				// if (!$this->user_m->getIdRow($this->input->post("id", TRUE))) {
				// 	$data["message"] = "중복된 아이디가 존재합니다!";

				// 	$this->load->view("art/adminPages/register.php", $data);
				// }
				if ($this->user_m->getIdRow($this->input->post("id", TRUE))) {
					$data["message"] = "중복된 아이디가 존재합니다!";

					$this->load->view("art/adminPages/register.php", $data);
				} else {
					$data = array(
						"name11" => $this->input->post("name", TRUE),
						"id11" => $this->input->post("id", TRUE),
						"pw11" => $this->input->post("pw", TRUE),
						"rank11" => 0,
					);

					$this->user_m->insertRow($data);

					redirect("/~sale11/art");
				}
			}
		}
	}
?>