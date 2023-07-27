<?php
	class Admin extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model("art/admin_m");
			$this->load->helper('url');
			$this->load->library("form_validation");
		}

		public function index() {
			if ($this->session->userdata('id') && $this->session->userdata('rank') == 1) {
				$this->load->view("art/adminPages/index_header.php");
				$this->load->view('art/adminPages/index.php');
				$this->load->view("art/adminPages/index_footer.php");
			} else if ($this->session->userdata('id') && $this->session->userdata('rank') == 0) {
				redirect('/~sale11/art');
			}
			 else {
				$this->load->view('art/adminPages/login.php');
			}
		}

		public function checkPageJoin() {
			if ($this->session->userdata("id")) {
				redirect('/~sale11/art');
			}

			$id = $this->input->post('id', TRUE);
			$pw = $this->input->post('pw', TRUE);

			$row = $this->admin_m->getRow($id, $pw);

			if ($row) {
				$data = array(
					'no' => $row->no11,
					'id' => $row->id11,
					'rank' => $row->rank11,
				);

				$this->session->set_userdata($data);

				if ($this->session->userdata('rank') == 1) {
					redirect('/~sale11/art');
				} else {
					redirect('/~sale11/art');
				}

			} else {
				$this->load->view('art/adminPages/login.php');
			}
		}


		public function logout() {
			$data = array('no', 'id', 'rank');
			$this->session->unset_userdata($data);
			
			redirect('/~sale11/art');
		}
	}
?>