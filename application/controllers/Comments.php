<?php

class Comments extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Comments_model');
	}

	// -----------------------------------------------------
	/*public function index() {
		
	}

	public function add_comment($id_post) {
		if(!$this->input->post()){
			redirect(base_url() . 'Home/posts_details');
		}
		$data = array(
			'id_post' => $id_post,
			'id_user' => $this->session->userdata('id_user'),
			'comment' => $this->input->post('comment'),
			'date' => $this->input->post('date')
		);

		$this->Comments_model->add_comment($data);
		redirect(base_url() . 'Home/posts_details');
	}*/