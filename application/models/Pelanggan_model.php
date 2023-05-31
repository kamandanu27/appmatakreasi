<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->order_by('id_pelanggan', 'Asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->where('slug_pelanggan', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->where('slug_pelanggan', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_pelanggan', $data);
	}

	public function update($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('tbl_pelanggan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('tbl_pelanggan');
	}



}
