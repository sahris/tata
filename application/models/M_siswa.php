<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	public function getAll()
	{
		return $this->db->get('tb_siswa');
	}

}

/* End of file M_siswa.php */
/* Location: ./application/models/M_siswa.php */