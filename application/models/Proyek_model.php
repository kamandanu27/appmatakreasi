<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('tbl_proyek');
			$this->db->join('tbl_pelanggan','tbl_proyek.id_pelanggan = tbl_pelanggan.id_pelanggan','inner');
			$this->db->join('tbl_pengawas','tbl_proyek.id_pengawas = tbl_pengawas.id_pengawas','inner');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('tbl_proyek');
			$this->db->join('tbl_pelanggan','tbl_proyek.id_pelanggan = tbl_pelanggan.id_pelanggan','inner');
			$this->db->join('tbl_pengawas','tbl_proyek.id_pengawas = tbl_pengawas.id_pengawas','inner');
			$this->db->where($where);
			$query = $this->db->get();
		}

		return $query;
	}

	public function detail($id_proyek)
	{
		$this->db->select('*');
		$this->db->from('tbl_proyek');
		$this->db->join('tbl_pelanggan','tbl_proyek.id_pelanggan = tbl_pelanggan.id_pelanggan','inner');
		$this->db->join('tbl_pengawas','tbl_proyek.id_pengawas = tbl_pengawas.id_pengawas','inner');
		$this->db->where('tbl_proyek.id_proyek', $id_proyek);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_proyek)
	{
		$this->db->select('*');
		$this->db->from('tbl_proyek');
		$this->db->where('slug_proyek', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_proyek');
		$this->db->where('slug_proyek', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_proyek', $data);
	}

	public function update($data)
	{
		$this->db->where('id_proyek', $data['id_proyek']);
		$this->db->update('tbl_proyek', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_proyek', $data['id_proyek']);
		$this->db->delete('tbl_proyek');
	}



}
