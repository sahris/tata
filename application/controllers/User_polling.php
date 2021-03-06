<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_polling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user_pemilih','user_pemilih');
		$this->load->model('M_siswa','siswa');
		$this->load->model('M_guru','guru');
		$this->load->model('M_pegawai','pegawai');
	}

	public function index()
	{
		$tahun = $this->session->userdata('tahun');
		$data['title'] = "Manage User Pemilih";
		$data['content'] = "admin/user_pemilih_v.php";
		$data['page_load'] = "view";
		$data['isi'] = $this->user_pemilih->getAll('tb_user_pemilih',$tahun);

		$this->load->view('admin_temp', $data);	
	}

	public function add()
	{
		$tahun = $this->session->userdata('tahun');
		$data['title'] = "Tambah User Pemilih";
		$data['content'] = "admin/user_pemilih_v.php";
		$data['page_load'] = "add";
		$data['data_siswa'] = $this->siswa->getAll($tahun);
		$data['data_guru'] = $this->guru->getAll($tahun);
		$data['data_pegawai'] = $this->pegawai->getAll($tahun);

		$this->load->view('admin_temp', $data);
	}

}

/* End of file User_pemilih.php */
/* Location: ./application/controllers/User_pemilih.php */