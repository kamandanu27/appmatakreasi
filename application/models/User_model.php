<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->order_by('id_user', 'Asc');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->where($where);
			$this->db->order_by('id_user', 'Asc');
			$query = $this->db->get();
		}
		return $query;
	}

	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_user', $data);
	}

	public function update($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('tbl_user');
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('email_user', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array(
			'email_user' => $username,
			'password_user' => $password
		));
		$query = $this->db->get();
		return $query->row();
	}

}
