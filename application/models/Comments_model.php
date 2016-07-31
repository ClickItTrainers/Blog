<?php

class Comments_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function add_comment($data) {
		$this->db->insert('comments', $data);
		return $this->db->insert_id();
	}

	public function get_comment($id_post){
		$this->db->select('comments.*,users.username');
		$this->db->from('comments');
		$this->db->join('users', 'users.user_id = comments.user_id', 'left');
		$this->db->where('id_post', $id_post);
		$this->db->order_by('date', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function email($id_user){
		$this->db->select('post.id_user,users.email');
		$this->db->from('post');
		$this->db->join('users', 'users.user_id = post.user_id', 'left');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		return $query->result();
	}