<?php
	class Photo extends CI_Controller { // 유저페이지
		function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model("art/photo_m");
			$this->load->model("art/user_m");
			$this->load->model("art/gallery_m");
		}

		public function index() {
			$this->lists();
		}

		public function lists() {
			$uri_array = $this->uri->uri_to_assoc(4);
			$text1 = array_key_exists("text1", $uri_array) ? urldecode($uri_array["text1"]) : "";

			$data["pageName"] = "Photos";
			$data["list"] = $this->photo_m->getlist($text1);
			$data["text1"] = $text1;
			$data["user"] = $this->user_m->getIdRow($this->session->userdata("id"));
			$data["gallerys"] = $this->gallery_m->getListDefault();

			$this->load->view('art/index_header.php', $data);
			$this->load->view('art/_photoPages/list.php', $data);
			$this->load->view('art/index_footer.php');
		}
	}
?>