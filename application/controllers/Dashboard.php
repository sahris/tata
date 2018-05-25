<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard','md');
	}

	public function index()
	{
		$tahun = $this->uri->segment(3);
		$this->session->set_userdata('tahun', $tahun);
		$data['data_calon'] = $this->md->get_all('tb_calon',$tahun)->result();
		$data['title'] = "Dashboard";
		$data['content'] = "admin/dashboard_v.php";
		$this->load->view('admin_temp', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */