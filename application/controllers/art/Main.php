<?php
	class Main extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model("art/gallery_m");
			$this->load->model("art/user_m");
			$this->load->helper('url');
		}

		public function index() {

			$data["list"] = $this->gallery_m->getListDefault();
			$data["pageName"] = "Home";
			$data["user"] = $this->user_m->getIdRow($this->session->userdata("id"));

			$this->load->view('art/index_header.php', $data);
			$this->load->view('art/index.php', $data);
			$this->load->view('art/index_footer.php');
		}
	}
?>