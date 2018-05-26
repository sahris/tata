<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_pemilih extends CI_Model {

	public function getAll($table,$tahun)
	{
		return $this->db->get($table,['tahun' => $tahun])->result();
	}	

	public function getOne($table, $id)
	{
		return $this->db->get_where($table,['id_user' => $id])->row();
	}

	public function update($table, $data, $id)
	{
		$this->db->where('id_user', $id);
		return $this->db->update($table, $data);
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function delete($table, $id)
	{
		$this->db->where('id_user', $id);
		return $this->db->delete($table);
	}

}

/* End of file M_user_pemilih.php */
/* Location: ./application/models/M_user_pemilih.php */