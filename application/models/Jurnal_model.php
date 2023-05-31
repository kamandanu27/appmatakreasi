<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('tbl_jurnal');
			$this->db->join('tbl_akun', 'tbl_jurnal.id_akun = tbl_akun.id_akun');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('tbl_jurnal');
			$this->db->join('tbl_akun', 'tbl_jurnal.id_akun = tbl_akun.id_akun');
			$this->db->where($where);
			$query = $this->db->get();
		}
		return $query;
	}

	public function detail($id_jurnal)
	{
		$this->db->select('*');
		$this->db->from('tbl_jurnal');
		$this->db->join('tbl_akun', 'tbl_jurnal.id_akun = tbl_akun.id_akun');
		$this->db->where('tbl_jurnal.id_jurnal', $id_jurnal);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_jurnal)
	{
		$this->db->select('*');
		$this->db->from('tbl_jurnal');
		$this->db->join('tbl_akun', 'tbl_jurnal.id_akun = tbl_akun.id_akun');
		$this->db->where('slug_warga', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_jurnal');
		$this->db->where('slug_warga', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_jurnal', $data);
	}

	public function update($data)
	{
		$this->db->where('id_jurnal', $data['id_jurnal']);
		$this->db->update('tbl_jurnal', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_jurnal', $data['id_jurnal']);
		$this->db->delete('tbl_jurnal');
	}



}
