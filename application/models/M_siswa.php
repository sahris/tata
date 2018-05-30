<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	public function getAll($tahun)
	{
		$sql = $this->db->get_where('tb_siswa',['tahun' => $tahun]);
		if ($sql->num_rows() <= 0) {
			$ret['recordsTotal'] = 0;
			$ret['recordsFiltered'] = 0;
			$ret['data'] = 0;
		}else{
			$ret['recordsTotal'] = $sql->num_rows();
			$ret['recordsFiltered'] = $sql->num_rows();
			$ret['data'] = $sql->result();
		}
		return $ret;
	}

}

/* End of file M_siswa.php */
/* Location: ./application/models/M_siswa.php */