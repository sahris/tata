<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login', 'ml');
	}

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('login/login_v', $data);
	}

	public function auth()
	{
		$username = $this->input->post('user');
		$password = $this->input->post('pass');
		$pass = md5($password);

		$cek = $this->ml->authLogin($username, $pass)->row();

		if ($cek != null) {
			$data = array(
				'username' => $this->session->set_userdata('username', $cek->username),
				'hak_akses' => $this->session->set_userdata('hak_akses', $cek->hak_akses),
			);

			redirect('dashboard','refresh');

		}else {
			$data = array('result' => $this->session->set_flashdata('result', 'Username atau password salah.'));
			redirect('login','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */