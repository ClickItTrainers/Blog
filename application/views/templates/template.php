<?php
	
	$this->load->view('templates/front_end/header');
	$this->load->view('front_end/' . $page);
	$this->load->view('templates/front_end/sidebar');
	$this->load->view('templates/front_end/footer');