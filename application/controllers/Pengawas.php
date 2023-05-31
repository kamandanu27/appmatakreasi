<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengawas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengawas_model', 'pengawas');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - pengawas',
			'judul'			=> 'Master Data Pengawas',
			'data' 			=> $this->pengawas->tabel()->result(),
			'content'		=> 'pengawas/v_content',
			'ajax'	 		=> 'pengawas/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah pengawas',
			'judul'			=> 'Tambah Data Pengawas',
			'data' 			=> $this->pengawas->tabel(),
			'content'		=> 'pengawas/v_add',
			'ajax'	 		=> 'pengawas/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->pengawas->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('pengawas'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit pengawas',
				'judul'			=> 'Edit Data Pengawas',
				'data' 			=> 	$this->pengawas->detail($id)->row_array(),
				'content'		=> 'pengawas/v_edit',
				'ajax'	 		=> 'pengawas/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			$image 								= time().'-'.$_FILES["foto_pengawasan"]['name']; //data post dari form
			$config['upload_path'] 				= './public/image/upload/pengawasan/'; //lokasi folder foto produk
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg'; //jenis file yang boleh diijinkan
			$config['max_size']  				= '25000'; //maksimal 25Mb
			$config['file_name']  				= $image; //ubah nama file berdasarkan waktu

			$this->load->library('upload', $config); //panggil librarys upload
			$this->upload->do_upload('foto_pengawasan'); //upload foto produk

			$data = array(
				'nama_pengawas'			=> $this->input->post('nama_pengawas'),
				'notlp_pengawas'		=> $this->input->post('notlp_pengawas'),
				'email_pengawas'		=> $this->input->post('email_pengawas'),
				'username_pengawas'		=> $this->input->post('username_pengawas'),
				'password_pengawas'		=> $this->input->post('password_pengawas'),
				'foto_pengawasan'		=> $image
				
				
			);

			$q = $this->pengawas->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('pengawas'),'refresh');
		
	}

	public function update()
	{

		if($_FILES["foto_pengawasan"]['name'] == ""){ //jika tidak ada upload foto

				$data = array(
					'id_pengawas'				=> $this->input->post('id_pengawas'),
					'nama_pengawas'			=> $this->input->post('nama_pengawas'),
					'notlp_pengawas'		=> $this->input->post('notlp_pengawas'),
					'email_pengawas'		=> $this->input->post('email_pengawas'),
					'username_pengawas'		=> $this->input->post('username_pengawas'),
					'password_pengawas'		=> $this->input->post('password_pengawas')
					
				);
				
				$q = $this->pengawas->update($data);

		}else{//jika ada upload foto

			$image 								= time().'-'.$_FILES["foto_pengawasan"]['name']; //data post dari form
			$config['upload_path'] 				= './public/image/upload/pengawasan/'; //lokasi folder foto produk
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg'; //jenis file yang boleh diijinkan
			$config['max_size']  				= '25000'; //maksimal 25Mb
			$config['file_name']  				= $image; //ubah nama file berdasarkan waktu

			$this->load->library('upload', $config); //panggil librarys upload
			$this->upload->do_upload('foto_pengawasan'); //upload foto produk

				$data = array(
					'id_pengawas'				=> $this->input->post('id_pengawas'),
					'nama_pengawas'			=> $this->input->post('nama_pengawas'),
					'notlp_pengawas'		=> $this->input->post('notlp_pengawas'),
					'email_pengawas'		=> $this->input->post('email_pengawas'),
					'username_pengawas'		=> $this->input->post('username_pengawas'),
					'password_pengawas'		=> $this->input->post('password_pengawas'),
					'foto_pengawasan'		=> $image
					
				);
				
			$q = $this->pengawas->update($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			$this->pengawas->update($data);
			redirect(base_url('pengawas'),'refresh');
		}
			
	}

	public function delete($id)
	{
		$cek = $this->pengawas->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('pengawas'),'refresh');
		}else{

			$data = array(
				'id_pengawas'	=> $id
			);
			
			$this->pengawas->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('pengawas'),'refresh');
		}
		

	}

	public function getpengawas()
	{
		$id = $this->input->post('id_pengawas');
		$array = array();
		$cek = $this->pengawas->detail($id)->row_array();
		if($cek !== null){
			$array['id_pengawas']= $cek['id_pengawas'];
			$array['harga_pengawas']= $cek['harga_pengawas'];
		}
		echo json_encode($array);
	}

}
