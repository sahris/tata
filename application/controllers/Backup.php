<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->dbutil();
	}

	public function index()
	{
		$data['title'] = "Backup Database";
		$data['content'] = "admin/backup_v.php";
		$this->load->view('admin_temp', $data);
	}

	public function backup()
	{
		$db_format = array(
			'format' => 'zip',
			'filename' => 'backup_db_pemilu_'.date("Y-m-d h:i:sa").'.sql'
		);

		$backup =& $this->dbutil->backup($db_format);
		$db_name = 'backup_db_pemilu_'.date("Y-m-d h:i:sa").'.zip';
		$save = 'assets/db/'.$db_name;
		write_file($save, $backup);
		force_download($db_name, $backup);
	}

}

/* End of file Backup.php */
/* Location: ./application/controllers/Backup.php */