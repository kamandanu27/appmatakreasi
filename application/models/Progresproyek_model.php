<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progresproyek_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('tbl_progresproyek');
			$this->db->join('tbl_proyek','tbl_progresproyek.id_proyek = tbl_proyek.id_proyek','inner');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('tbl_progresproyek');
			$this->db->join('tbl_proyek','tbl_progresproyek.id_proyek = tbl_proyek.id_proyek','inner');
			$this->db->where($where);
			$query = $this->db->get();
		}
		return $query;
	}

	public function detail($id_progres)
	{
		$this->db->select('*');
		$this->db->from('tbl_progresproyek');
		$this->db->join('tbl_proyek','tbl_progresproyek.id_proyek = tbl_proyek.id_proyek','inner');
		$this->db->where('tbl_progresproyek.id_progres', $id_progres);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_progres)
	{
		$this->db->select('*');
		$this->db->from('tbl_progresproyek');
		$this->db->where('slug_warga', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_progresproyek');
		$this->db->where('slug_warga', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_progresproyek', $data);
	}

	public function update($data)
	{
		$this->db->where('id_progres', $data['id_progres']);
		$this->db->update('tbl_progresproyek', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_progres', $data['id_progres']);
		$this->db->delete('tbl_progresproyek');
	}



}
