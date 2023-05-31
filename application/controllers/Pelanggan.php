<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model', 'pelanggan');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - pelanggan',
			'judul'			=> 'Master Data Pelanggan',
			'data' 			=> $this->pelanggan->tabel()->result(),
			'content'		=> 'pelanggan/v_content',
			'ajax'	 		=> 'pelanggan/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah pelanggan',
			'judul'			=> 'Tambah Data Pelanggan',
			'data' 			=> $this->pelanggan->tabel(),
			'content'		=> 'pelanggan/v_add',
			'ajax'	 		=> 'pelanggan/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->pelanggan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('pelanggan'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit pelanggan',
				'judul'			=> 'Edit Data Pelanggan',
				'data' 			=> 	$this->pelanggan->detail($id)->row_array(),
				'content'		=> 'pelanggan/v_edit',
				'ajax'	 		=> 'pelanggan/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			$image 								= time().'-'.$_FILES["foto_pelanggan"]['name']; //data post dari form
			$config['upload_path'] 				= './public/image/upload/pelanggan/'; //lokasi folder foto produk
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg'; //jenis file yang boleh diijinkan
			$config['max_size']  				= '25000'; //maksimal 25Mb
			$config['file_name']  				= $image; //ubah nama file berdasarkan waktu

			$this->load->library('upload', $config); //panggil librarys upload
			$this->upload->do_upload('foto_pelanggan'); //upload foto produk

			$data = array(
				'nama_pelanggan'			=> $this->input->post('nama_pelanggan'),
				'alamat_pelanggan'		=> $this->input->post('alamat_pelanggan'),
				'notlp_pelanggan'		=> $this->input->post('notlp_pelanggan'),
				'email_pelanggan'		=> $this->input->post('email_pelanggan'),
				'foto_pelanggan'		=> $image
				
			);

			$q = $this->pelanggan->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('pelanggan'),'refresh');
		
	}

	public function update()
	{

		if($_FILES["foto_pelanggan"]['name'] == ""){ //jika tidak ada upload foto

			$data = array(
					'id_pelanggan'				=> $this->input->post('id_pelanggan'),
					'nama_pelanggan'			=> $this->input->post('nama_pelanggan'),
					'alamat_pelanggan'		=> $this->input->post('alamat_pelanggan'),
					'notlp_pelanggan'		=> $this->input->post('notlp_pelanggan'),
					'email_pelanggan'		=> $this->input->post('email_pelanggan')
					
				);

				$q = $this->pelanggan->update($data);

		}else{//jika ada upload foto

			$image 								= time().'-'.$_FILES["foto_pelanggan"]['name']; //data post dari form
			$config['upload_path'] 				= './public/image/upload/pelanggan/'; //lokasi folder foto produk
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg'; //jenis file yang boleh diijinkan
			$config['max_size']  				= '25000'; //maksimal 25Mb
			$config['file_name']  				= $image; //ubah nama file berdasarkan waktu

			$this->load->library('upload', $config); //panggil librarys upload
			$this->upload->do_upload('foto_pelanggan'); //upload foto produk

				$data = array(
					'id_pelanggan'				=> $this->input->post('id_pelanggan'),
					'nama_pelanggan'			=> $this->input->post('nama_pelanggan'),
					'alamat_pelanggan'		=> $this->input->post('alamat_pelanggan'),
					'notlp_pelanggan'		=> $this->input->post('notlp_pelanggan'),
					'email_pelanggan'		=> $this->input->post('email_pelanggan'),
					'foto_pelanggan'		=> $image

				);
				
				$q = $this->pelanggan->update($data);
	
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			$this->pelanggan->update($data);
			redirect(base_url('pelanggan'),'refresh');
		}
			
	}

	public function delete($id)
	{
		$cek = $this->pelanggan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('pelanggan'),'refresh');
		}else{

			$data = array(
				'id_pelanggan'	=> $id
			);
			
			$this->pelanggan->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('pelanggan'),'refresh');
		}
		

	}

	public function getpelanggan()
	{
		$id = $this->input->post('id_pelanggan');
		$array = array();
		$cek = $this->pelanggan->detail($id)->row_array();
		if($cek !== null){
			$array['id_pelanggan']= $cek['id_pelanggan'];
			$array['harga_pelanggan']= $cek['harga_pelanggan'];
		}
		echo json_encode($array);
	}

}
