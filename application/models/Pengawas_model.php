<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengawas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_pengawas');
		$this->db->order_by('id_pengawas', 'Asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($id_pengawas)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengawas');
		$this->db->where('id_pengawas', $id_pengawas);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_pengawas)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengawas');
		$this->db->where('slug_pengawas', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengawas');
		$this->db->where('slug_pengawas', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_pengawas', $data);
	}

	public function update($data)
	{
		$this->db->where('id_pengawas', $data['id_pengawas']);
		$this->db->update('tbl_pengawas', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_pengawas', $data['id_pengawas']);
		$this->db->delete('tbl_pengawas');
	}



}
