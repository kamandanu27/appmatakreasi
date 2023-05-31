<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proyek_model', 'proyek');
		$this->load->model('Pelanggan_model', 'pelanggan');
		$this->load->model('Pengawas_model', 'pengawas');
		$this->auth->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - proyek',
			'judul'			=> 'Master Data Proyek',
			'data' 			=> $this->proyek->tabel()->result(),
			'content'		=> 'proyek/v_content',
			'ajax'	 		=> 'proyek/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> $this->session->userdata('level').' - Tambah proyek',
			'judul'			=> 'Tambah Data Proyek',
			'data' 			=> $this->proyek->tabel(),
			'pelanggan' 	=> $this->pelanggan->tabel()->result(),
			'pengawas' 		=> $this->pengawas->tabel()->result(),
			'content'		=> 'proyek/v_add',
			'ajax'	 		=> 'proyek/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->proyek->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('proyek'),'refresh');
		}else{

			$data = array(
				'title'			=> $this->session->userdata('level').' - Edit proyek',
				'judul'			=> 'Edit Data Proyek',
				'data' 			=> 	$this->proyek->detail($id)->row_array(),
				'pelanggan' 	=> $this->pelanggan->tabel()->result(),
				'pengawas' 		=> $this->pengawas->tabel()->result(),
				'content'		=> 'proyek/v_edit',
				'ajax'	 		=> 'proyek/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{

			$data = array(
				'no_proyek'					=> $this->input->post('no_proyek'),
				'nama_proyek'				=> $this->input->post('nama_proyek'),
				'alamat_proyek'				=> $this->input->post('alamat_proyek'),
				'anggaran_proyek'			=> $this->input->post('anggaran_proyek'),
				'tglpersetujuan_proyek'		=> $this->input->post('tglpersetujuan_proyek'),
				'tglmulai_proyek'			=> $this->input->post('tglmulai_proyek'),
				'tglselesai_proyek'			=> $this->input->post('tglselesai_proyek'),
				'keterangan_proyek'			=> 'Mulai',
				'id_pelanggan'				=> $this->input->post('id_pelanggan'),
				'id_pengawas'				=> $this->input->post('id_pengawas')


				
			);

			$q = $this->proyek->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('proyek'),'refresh');
		
	}

	public function update()
	{

		$id = $this->input->post('id_proyek');

		$cek = $this->proyek->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('proyek'),'refresh');
		}else{

				$data = array(
					'id_proyek'					=> $this->input->post('id_proyek'),
					'no_proyek'					=> $this->input->post('no_proyek'),
					'nama_proyek'				=> $this->input->post('nama_proyek'),
					'alamat_proyek'				=> $this->input->post('alamat_proyek'),
					'anggaran_proyek'			=> $this->input->post('anggaran_proyek'),
					'tglpersetujuan_proyek'		=> $this->input->post('tglpersetujuan_proyek'),
					'tglmulai_proyek'			=> $this->input->post('tglmulai_proyek'),
					'tglselesai_proyek'			=> $this->input->post('tglselesai_proyek'),
					'keterangan_proyek'			=> $this->input->post('keterangan_proyek'),
					'id_pelanggan'				=> $this->input->post('id_pelanggan'),
					'id_pengawas'				=> $this->input->post('id_pengawas')
					

				);
				
			$this->proyek->update($data);
	
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			redirect(base_url('proyek'),'refresh');
		}
			
	}

	public function delete($id)
	{
		$cek = $this->proyek->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('proyek'),'refresh');
		}else{

			$data = array(
				'id_proyek'	=> $id
			);
			
			$this->proyek->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('proyek'),'refresh');
		}
		

	}

	public function getproyek()
	{
		$id_pelanggan = $this->input->post('id');
		$data = $this->proyek->tabel('tbl_proyek.id_pelanggan = '.$id_pelanggan.'')->result();
		echo "
				<option value=''>Pilih</option>
			";
		foreach($data as $row){
			echo "
				<option value='".$row->id_proyek."'>$row->nama_proyek</option>
			";
		}
		
	}

	
}
