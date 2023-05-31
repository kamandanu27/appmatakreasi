<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
		ob_start();
	}

	public function index()
	{

		$data = array(
			'title'	=> 'Login | Obat'
		);
		$this->load->view('login', $data, FALSE);
	}

	public function login()
	{

		$this->form_validation->set_rules('username', 'Username', 'required',
			array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{
			$username    = $this->input->post('username');
			$password    = $this->input->post('password');

				$cek_u = $this->user->cek_username($username);
				
    			if ($cek_u !== null) 
					{
						$cek_pass = $this->auth->login_user($username,$password);
						if($cek_pass == 0){
							$this->session->set_flashdata('danger', '<i class="fa fa-warning"></i>
							Maaf, Username dan password tidak sesuai.');
							redirect(base_url('login'),'refresh');
						}
					}
    			else
					{
						$this->session->set_flashdata('danger', '<i class="fa fa-warning"></i>
						Maaf, Username tidak ditemukan.');
							redirect(base_url('login'),'refresh');
					}
		}else{
			$this->session->set_flashdata('danger', '<i class="fa fa-warning"></i>Maaf, Username dan password wajib diisi.');
			redirect(base_url('login'),'refresh');
		}

		
	}
	

	public function logout()
	{
		$this->auth->logout();
	}
	

}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */