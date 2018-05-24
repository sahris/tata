<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

	public function getAll()
	{
		return $this->db->get('tb_guru')->result();
	}	

	public function getDetail($id)
	{
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->where('id_guru', $id);
		return $this->db->get();
	}

	public function getAktif()
	{
		return $this->db->query("SELECT * FROM tb_guru WHERE status = 1");
	}
	public function getTidakAktif()
	{
		return $this->db->query("SELECT * FROM tb_guru WHERE status = 0");
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function update($table, $data, $id)
	{
		$this->db->where('id_guru', $id);
		$this->db->update($table, $data);
	}

	public function delete($table, $where)
	{
		$this->db->where('id_guru', $where);
		$this->db->delete($table);
	}
}

/* End of file M_guru.php */
/* Location: ./application/models/M_guru.php */