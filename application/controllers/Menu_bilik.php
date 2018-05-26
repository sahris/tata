<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_bilik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$tahun = $this->uri->segment(3);
		$this->session->set_userdata('tahun', $tahun);
		
		$data['title'] = "Menu bilik";
		$data['content'] = "admin/menu_bilik_v.php";

		$this->load->view('admin_temp', $data);
	}

	public function goto_manage_calon()
	{
		$data['content'] = "admin/calon_v.php";

		$this->load->view('admin_temp', $data);
	}

	public function goto_manage_user_polling()
	{
		# code...
	}

	public function goto_manage($value='')
	{
		# code...
	}

	public function goto_master_siswa($value='')
	{
		# code...
	}

	public function goto_master_guru($value='')
	{
		# code...
	}

	public function goto_master_pegawai($value='')
	{
		# code...
	}

}

/* End of file Menu_bilik.php */
/* Location: ./application/controllers/Menu_bilik.php */