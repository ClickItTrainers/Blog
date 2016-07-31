<?php
	require 'vendor/autoload.php';
	use Mailgun\Mailgun;

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Posts_model');
	}

	// Home Page
	public function index() {
		$data['posts_arr'] = $this->Posts_model->posts_list();
		$data['title'] = "Tony's Blog";
		$data['page'] = 'home';
		$this->load->view('templates/template', $data);
	}

	// 
	public function posts_details($id_post){
		$id_clean = $this->security->xss_clean($id_post);
		//$id_post = $this->uri->segment(3);
		$data['details'] = $this->Posts_model->posts_details($id_clean);
		$data['comentarios'] = $this->Posts_model->getComments($id_post);
		$data['title'] = $data['details']->title;
		$data['page'] = 'details';
		$this->load->view('templates/template', $data);
	}

	public function comment(){
        $id_post = $this->input->post('id_post');
        $comment = array(
        		'username' => $this->session->userdata('username'),
                'id_post' => $id_post,
                'comment' => $this->input->post('comment'),
                'date' => date('Y-m-d H:i:s')
                );
        $q = $this->Posts_model->insert('comments', $comment);

        if ($q) {
        	$email = $this->Posts_model->email();/* email del dueño del post */

			 $api_key = new Mailgun("key-02e5697ec3483532c55890a7630731dd"); /* Api Key got from https://mailgun.com/cp/my_account */
			 $domain = "sandboxd8db532585ba42b3b44901777609c494.mailgun.org"; /* Domain Name you given to Mailgun */
			 
			 $api_key->sendMessage($domain, array(
											'from'		=> 'activatetony@gmail.com',
											'to' 		=> $email,
											'subject' 	=> 'New comment in your post',
											'text' 		=> $comment));
        }
        redirect(base_url());
	}


	// Profile Page
	public function profile() {
		$user = $this->session->userdata('username');
		$data['posts_arr'] = $this->Posts_model->posts_list_user($user);
		$data['title'] = " $user profile";
		$this->load->view('templates/profile', $data);
	}

	// Contact Page
	public function contact() {
		//$p = $this->session->userdata('username');
		$data['title'] = "Contact Us!";
		$this->load->view('templates/contactUs', $data);
	}

	public function new_post() {
		$data['title'] = "Create new post";
		$this->load->view('templates/newPost', $data);
	}

	public function insert_post(){

		$this->form_validation->set_rules('title', 'title', 'required|trim|min_length[1]|max_length[70]');
      	$this->form_validation->set_rules('description', 'description', 'required|trim|min_length[1]|max_length[100]');
      	$this->form_validation->set_rules('content', 'content', 'required|trim|min_length[1]|max_length[255]'); 
      	// Error messages
      	$this->form_validation->set_message('required', '*Required field');
      	$this->form_validation->set_message('min_length', '*The field %s must be at least 1 characters');
      	$this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

      	if($this->form_validation->run() == FALSE){
        $this->new_post();
      
	    }else{

            $post = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'content' => $this->input->post('content'),
                'date' => date('Y-m-d H:i:s'),
                'username' => $this->session->userdata('username')
            );             
            $this->Posts_model->insert('post', $post);
            redirect(base_url());
        }

    }

    public function send_mail(){

		$this->form_validation->set_rules('email', 'email', 'required|trim|max_length[30]|email');
      	$this->form_validation->set_rules('subject', 'subject', 'required|trim|max_length[50]');
      	$this->form_validation->set_rules('message', 'message', 'required|trim|min_length[1]|max_length[100]'); 
      	// Error messages
      	$this->form_validation->set_message('email', '*Invalid email');
      	$this->form_validation->set_message('required', '*Required field');
      	$this->form_validation->set_message('min_length', '*The field %s must be at least 1 characters');
      	$this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

      	if($this->form_validation->run() == FALSE){
        $this->contact();
      
	    }else{

	    	$email = $this->input->post('email');
	    	$subject = $this->input->post('subject');
	    	$msg = $this->input->post('message');

			 $api_key = new Mailgun("key-02e5697ec3483532c55890a7630731dd"); /* Api Key got from https://mailgun.com/cp/my_account */
			 $domain = "sandboxd8db532585ba42b3b44901777609c494.mailgun.org"; /* Domain Name you given to Mailgun */
			 
			 $api_key->sendMessage($domain, array(
											'from'		=> $email,
											'to' 		=> 'activatetony@gmail.com',
											'subject' 	=> $subject,
											'text' 		=> $msg ));
			if ($api_key) {
	        	echo "<script> alert('Email sent!'); </script>";
	        	$this->contact();
        	}
        }
    }
}