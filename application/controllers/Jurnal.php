<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurnal_model', 'jurnal');
		$this->load->model('Akun_model', 'akun');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - jurnal',
			'judul'			=> 'Master Data Jurnal ',
			'data' 			=> $this->jurnal->tabel()->result(),
			'content'		=> 'jurnal/v_content',
			'ajax'	 		=> 'jurnal/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah jurnal',
			'judul'			=> 'Tambah Data Jurnal ',
			'data' 			=> $this->jurnal->tabel(),
			'list_akun' 	=> $this->akun->tabel()->result(),
			'content'		=> 'jurnal/v_add',
			'ajax'	 		=> 'jurnal/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->jurnal->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('jurnal'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit jurnal',
				'judul'			=> 'Edit Data Jurnal ',
				'data' 			=> 	$this->jurnal->detail($id)->row_array(),
				'list_akun' 	=> $this->akun->tabel()->result(),
				'content'		=> 'jurnal/v_edit',
				'ajax'	 		=> 'jurnal/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			
			$data = array(
				'tgl_jurnal'				=> $this->input->post('tgl_jurnal'),
				'debit_jurnal'				=> $this->input->post('debit_jurnal'),
				'kredit_jurnal'				=> $this->input->post('kredit_jurnal'),
				'keterangan_jurnal'			=> $this->input->post('keterangan_jurnal'),
				'id_akun'					=> $this->input->post('id_akun'),
				'periode_jurnal'			=> $this->input->post('periode_jurnal')
				
			);

			$q = $this->jurnal->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('jurnal'),'refresh');
		
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
					'id_jurnal'				=> $this->input->post('id_jurnal'),
					'tgl_jurnal'				=> $this->input->post('tgl_jurnal'),
					'debit_jurnal'				=> $this->input->post('debit_jurnal'),
					'kredit_jurnal'				=> $this->input->post('kredit_jurnal'),
					'keterangan_jurnal'			=> $this->input->post('keterangan_jurnal'),
					'id_akun'					=> $this->input->post('id_akun'),
					'periode_jurnal'			=> $this->input->post('periode_jurnal')
				);
				
			$q = $this->jurnal->update($data);
	
		}

		$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
		redirect(base_url('jurnal'),'refresh');
			
	}

	public function delete($id)
	{
		$cek = $this->jurnal->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('jurnal'),'refresh');
		}else{

			$data = array(
				'id_jurnal'	=> $id
			);
			
			$this->jurnal->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('jurnal'),'refresh');
		}
		

	}

	
}
