<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progresproyek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Progresproyek_model', 'progresproyek');
		$this->load->model('Proyek_model', 'proyek');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - progresproyek',
			'judul'			=> 'Master Data Progres Proyek ',
			'data' 			=> $this->progresproyek->tabel()->result(),
			'content'		=> 'progresproyek/v_content',
			'ajax'	 		=> 'progresproyek/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah progresproyek',
			'judul'			=> 'Tambah Data Progres Proyek ',
			'data' 			=> $this->progresproyek->tabel(),
			'proyek' 		=> $this->proyek->tabel()->result(),
			'content'		=> 'progresproyek/v_add',
			'ajax'	 		=> 'progresproyek/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->progresproyek->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('progresproyek'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit progresproyek',
				'judul'			=> 'Edit Data Progres Proyek ',
				'data' 			=> 	$this->progresproyek->detail($id)->row_array(),
				'proyek' 		=> $this->proyek->tabel()->result(),
				'content'		=> 'progresproyek/v_edit',
				'ajax'	 		=> 'progresproyek/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			$image 								= time().'-'.$_FILES["foto_pencapaian"]['name']; //data post dari form
			$config['upload_path'] 				= './public/image/upload/progresproyek/'; //lokasi folder foto produk
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg'; //jenis file yang boleh diijinkan
			$config['max_size']  				= '25000'; //maksimal 25Mb
			$config['file_name']  				= $image; //ubah nama file berdasarkan waktu

			$this->load->library('upload', $config); //panggil librarys upload
			$this->upload->do_upload('foto_pencapaian'); //upload foto produk

			$data = array(
				'id_proyek'					=> $this->input->post('id_proyek'),
				'tgl_progres'				=> $this->input->post('tgl_progres'),
				'aktifitas_proyek'			=> $this->input->post('aktifitas_proyek'),
				'kendala_proyek'			=> $this->input->post('kendala_proyek'),
				'foto_pencapaian'			=> $image
				
			);

			$q = $this->progresproyek->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('progresproyek'),'refresh');
		
	}

	public function update()
	{

		if($_FILES["foto_pencapaian"]['name'] == ""){ //jika tidak ada upload foto

				$data = array(
					'id_progres'					=> $this->input->post('id_progres'),
					'id_proyek'					=> $this->input->post('id_proyek'),
					'tgl_progres'				=> $this->input->post('tgl_progres'),
					'aktifitas_proyek'			=> $this->input->post('aktifitas_proyek'),
					'kendala_proyek'			=> $this->input->post('kendala_proyek')
				);
				$q = $this->progresproyek->update($data);
				
		}else{//jika ada upload foto

			$image 								= time().'-'.$_FILES["foto_pencapaian"]['name']; //data post dari form
			$config['upload_path'] 				= './public/image/upload/progresproyek/'; //lokasi folder foto produk
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg'; //jenis file yang boleh diijinkan
			$config['max_size']  				= '25000'; //maksimal 25Mb
			$config['file_name']  				= $image; //ubah nama file berdasarkan waktu

			$this->load->library('upload', $config); //panggil librarys upload
			$this->upload->do_upload('foto_pencapaian'); //upload foto produk
			
			$data = array(
					'id_progres'				=> $this->input->post('id_progres'),
					'id_proyek'					=> $this->input->post('id_proyek'),
					'tgl_progres'				=> $this->input->post('tgl_progres'),
					'aktifitas_proyek'			=> $this->input->post('aktifitas_proyek'),
					'kendala_proyek'			=> $this->input->post('kendala_proyek'),
					'foto_pencapaian'			=> $image
				);
				
			$q = $this->progresproyek->update($data);
	
		}

		$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');	
		$this->progresproyek->update($data);
		redirect(base_url('progresproyek'),'refresh');
			
	}

	public function delete($id)
	{
		$cek = $this->progresproyek->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('progresproyek'),'refresh');
		}else{

			$data = array(
				'id_progres'	=> $id
			);
			
			$this->progresproyek->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('progresproyek'),'refresh');
		}
		

	}

	
}
