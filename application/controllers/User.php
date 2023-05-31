<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Data Pengelola',
			'judul'			=> 'Master Data Pengelola',
			'data' 			=> $this->user->tabel('level_user = "Pengelola" ')->result(),
			'content'		=> 'user/v_content',
			'ajax'	 		=> 'user/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah Pengelola',
			'judul'			=> 'Tambah Data Pengelola',
			'data' 			=> $this->user->tabel(),
			'content'		=> 'user/v_add',
			'ajax'	 		=> 'user/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->user->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('user'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit Pengelola',
				'judul'			=> 'Edit Data Pengelola',
				'data' 			=> 	$this->user->detail($id)->row_array(),
				'content'		=> 'user/v_edit',
				'ajax'	 		=> 'user/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{

			$data = array(
				'nama_user'					=> $this->input->post('nama_user'),
				'alamat_user'				=> $this->input->post('alamat_user'),
				'nohp_user'					=> $this->input->post('nohp_user'),
				'email_user'				=> $this->input->post('email_user'),
				'level_user'				=> 'Pengelola',
				'password_user'				=> $this->input->post('password_user')
				
			);

			$q = $this->user->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('user'),'refresh');
		
	}

	public function update()
	{

		$id = $this->input->post('id_user');

		$cek = $this->user->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('user'),'refresh');
		}else{

				$data = array(
					'id_user'					=> $this->input->post('id_user'),
					'nama_user'					=> $this->input->post('nama_user'),
					'alamat_user'				=> $this->input->post('alamat_user'),
					'nohp_user'					=> $this->input->post('nohp_user'),
					'email_user'				=> $this->input->post('email_user'),
					'level_user'				=> 'Pengelola',
					'password_user'				=> $this->input->post('password_user')
				);
				
			$this->user->update($data);
	
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			redirect(base_url('user'),'refresh');
		}
			
	}

	public function delete($id)
	{
		$cek = $this->user->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('user'),'refresh');
		}else{

			$data = array(
				'id_user'	=> $id
			);
			
			$this->user->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('user'),'refresh');
		}
		

	}

}
