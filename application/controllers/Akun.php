<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Akun_model', 'akun');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - akun',
			'judul'			=> 'Master Data akun',
			'data' 			=> $this->akun->tabel()->result(),
			'content'		=> 'akun/v_content',
			'ajax'	 		=> 'akun/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah akun',
			'judul'			=> 'Tambah Data akun',
			'data' 			=> $this->akun->tabel(),
			'content'		=> 'akun/v_add',
			'ajax'	 		=> 'akun/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->akun->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('akun'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit akun',
				'judul'			=> 'Edit Data akun',
				'data' 			=> 	$this->akun->detail($id)->row_array(),
				'content'		=> 'akun/v_edit',
				'ajax'	 		=> 'akun/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			$data = array(
				'kode_akun'			=> $this->input->post('kode_akun'),
				'nama_akun'		=> $this->input->post('nama_akun'),
				'saldo_akun'		=> $this->input->post('saldo_akun'),
				'dk'		=> $this->input->post('dk'),
			);

			$q = $this->akun->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('akun'),'refresh');
		
	}

	public function update()
	{
		$id = $this->input->post('id_akun');
		$cek = $this->akun->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('akun'),'refresh');
		}else{

			$data = array(
					'id_akun'				=> $this->input->post('id_akun'),
					'kode_akun'			=> $this->input->post('kode_akun'),
					'nama_akun'		=> $this->input->post('nama_akun'),
					'saldo_akun'		=> $this->input->post('saldo_akun'),
					'dk'		=> $this->input->post('dk')
				);

				$q = $this->akun->update($data);
				
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			$this->akun->update($data);
			redirect(base_url('akun'),'refresh');
		}
			
	}

	public function delete($id)
	{
		$cek = $this->akun->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('akun'),'refresh');
		}else{

			$data = array(
				'id_akun'	=> $id
			);
			
			$this->akun->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('akun'),'refresh');
		}
		

	}

	public function getakun()
	{
		$id = $this->input->post('id_akun');
		$array = array();
		$cek = $this->akun->detail($id)->row_array();
		if($cek !== null){
			$array['id_akun']= $cek['id_akun'];
			$array['harga_akun']= $cek['harga_akun'];
		}
		echo json_encode($array);
	}

}
