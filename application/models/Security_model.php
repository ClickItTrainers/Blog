<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Security_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
    //save user data on table users
	public function save_pass($username, $email, $hash){
		$data = array(
			'username'	=>	$username,
			'email'		=>	$email,
			'password'	=>	$hash
		);
		return $this->db->insert('users',$data);
	}

    //login
	public function login($username, $hash){
       //get login data
		$this->db->where('username',$username);
		$query = $this->db->get('users');

		if($query->num_rows() == 1){
			$user = $query->row();
           //en pass guardamos el hash del usuario que tenemos en la base
           //de datos para comprobarlo con el método check_password de Bcrypt
			$pass = $user->password;
 
          	// Database pass == form pass ??
			if($this->bcrypt->check_password($hash, $pass)){
				return $query->row();
			} else {
			echo "<script> alert('Incorrect password!'); </script>";
			redirect(base_url().'index.php/Security/login','refresh');
			}
		} else {
			echo "<script> alert('Incorrect username!'); </script>";
			redirect(base_url().'index.php/Security/login','refresh');
		}
	}
}