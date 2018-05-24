<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_polling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user_pemilih','user_pemilih');
	}

	public function index()
	{
		$data['title'] = "Manage User Pemilih";
		$data['content'] = "admin/user_pemilih_v.php";
		$data['page_load'] = "view";
		$data['isi'] = $this->user_pemilih->getAll();

		$this->load->view('admin_temp', $data);	
	}

}

/* End of file User_pemilih.php */
/* Location: ./application/controllers/User_pemilih.php */