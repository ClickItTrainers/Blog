<?php  
 if ( ! defined('BASEPATH')) 
  exit('No direct script access allowed');

class Security extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->library('bcrypt');
      $this->load->model('Security_model');
      $this->load->library(array('form_validation','session'));
      $this->load->database('default');
    }
  
  //Load register form
  public function index(){ 
    $data['title'] = 'Sign-up!';
    $data['token'] = $this->token();
    $this->load->view('templates/sign_up_view',$data);
  }

  
  //Create a token
  public function token(){
    $token = md5(uniqid(rand(),true));
    $this->session->set_userdata('token',$token);
    return $token;
  }
  
  //Process sign_up_view.php data form
  public function register(){

    if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){
      $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|max_length[15]');
      $this->form_validation->set_rules('email', 'email', 'required|trim|max_length[30]|valid_email');
      $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]|max_length[30]'); 
      // Error messages
      $this->form_validation->set_message('required', '*Required field');
      $this->form_validation->set_message('valid_email', '*Invalid email');
      $this->form_validation->set_message('min_length', '*The field %s must be at least 6 characters');
      $this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');
      
      //Error validation
      if($this->form_validation->run() == FALSE){
        $this->index();
      
      }else{
        $username = $this->input->post('username');
        $email = $this->input->post('email'); 
        $password = $this->input->post('password');        
        $hash = $this->bcrypt->hash_password($password);
        
        // password encripted ?? (password_verify)
        if ($this->bcrypt->check_password($password, $hash)){
            $insert_password = $this->Security_model->save_pass($username, $email, $hash);
          if($insert_password){
            redirect(base_url().'index.php/Security/login');
            // redirect(base_url().'index.php/Home');
          }
        }else{
          return false;     
        }
      }
    }
  }
  
  //Load login form
  public function login(){
    $data['title'] = 'Login';
    $data['token'] = $this->token();
    $this->load->view('templates/logiin_view',$data); 
  }
 
  //Load login_ok_view 
  public function login_ok(){
    redirect(base_url().'index.php/Home', $data);
  }
  
  //Process login_view.php data form
  public function secure_login(){

    if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){
      $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|max_length[150]');
      $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]|max_length[150]');
   
      //Error messages
      $this->form_validation->set_message('required', '*Required field');
      $this->form_validation->set_message('min_length', '*The field must be at least 6 characters');
      $this->form_validation->set_message('max_length', '*The field cant be more than 150 characters');
      
      //Error validation
      if($this->form_validation->run() == FALSE){    
        $this->login();
      } else {
          $username = $this->input->post('username');
          $password = $this->input->post('password');
            
          $login = $this->Security_model->login($username, $password);
        
        //if user exist...  
        if($login){
          $data = array(
                    'is_logued_in'  =>    TRUE,
                    'username'    =>    $login->username,
                    'password'    =>    $login->password
                );    
          $this->session->set_userdata($data);
          $this->login_ok();
        }
      }
    }
  }
 
  //Log out
  public function logout(){
    $name = $this->session->userdata('username');
    $url = base_url();
    echo "<script> 
            alert('Bye $name!!'); 
            window.location.href='$url';
          </script>";
    $this->session->sess_destroy();
    //redirect(base_url());
  }
}