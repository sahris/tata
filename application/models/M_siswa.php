<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	public function getAll($tahun)
	{
		return $this->db->get_where('tb_siswa',['tahun' => $tahun]);
	}

}

/* End of file M_siswa.php */
/* Location: ./application/models/M_siswa.php */