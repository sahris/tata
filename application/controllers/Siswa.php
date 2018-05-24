<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_siswa', 'ms');
	}

	public function index()
	{
		$data['title'] = "Siswa";
		$data['content'] = "admin/siswa_v.php";

		$data['isi'] = $this->ms->getAll()->result();

		$this->load->view('admin_temp', $data);
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */