<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_sys extends CI_Model {

	public function getAll()
		{
			return $this->db->get('tb_user');
		}

	public function getSiswa()
	{
		$sql = $this->db->query("
			SELECT `tb_siswa`.nama 
			FROM tb_siswa
			INNER JOIN `tb_user` 
			WHERE tb_siswa.`nis` = tb_user.`id_siswa`;");
		return $sql;
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function delete($table, $where)
	{
		$this->db->where('id_user', $where);
		return $this->db->delete($table);

	}

}

/* End of file M_user_sys.php */
/* Location: ./application/models/M_user_sys.php */