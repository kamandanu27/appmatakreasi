<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->auth->cek();
		$this->load->model('User_model', 'user');
		$this->load->model('Proyek_model', 'proyek');
		$this->load->model('Pelanggan_model', 'pelanggan');
		$this->load->model('Pengawas_model', 'pengawas');
		$this->load->model('Progresproyek_model', 'progresproyek');
		$this->load->helper('tgl_indo');
		$this->load->helper('rupiah_helper');
		
		
	}

	public function index()
	{
		$data = array(
			'title'					=> $this->session->userdata('level').' - Dashboard',
			'user'					=> $this->session->userdata('nama'),
			'jumlah_proyek' 		=> $this->proyek->tabel()->num_rows(),
			'jumlah_pengawas' 		=> $this->pengawas->tabel()->num_rows(),
			'jumlah_pelanggan' 		=> $this->pelanggan->tabel()->num_rows(),
			'jumlah_progresproyek' 	=> $this->progresproyek->tabel()->num_rows(),
			'content'	 			=> 'dashboard/v_content',
			'ajax'	 				=> 'dashboard/v_ajax'
		);

		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */