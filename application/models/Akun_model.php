<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_akun');
		$this->db->order_by('id_akun', 'Asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($id_akun)
	{
		$this->db->select('*');
		$this->db->from('tbl_akun');
		$this->db->where('id_akun', $id_akun);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_akun)
	{
		$this->db->select('*');
		$this->db->from('tbl_akun');
		$this->db->where('slug_akun', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_akun');
		$this->db->where('slug_akun', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_akun', $data);
	}

	public function update($data)
	{
		$this->db->where('id_akun', $data['id_akun']);
		$this->db->update('tbl_akun', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_akun', $data['id_akun']);
		$this->db->delete('tbl_akun');
	}



}
