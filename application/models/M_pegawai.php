<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function getAll()
	{
		return $this->db->get('tb_pegawai')->result();
	}

	public function getAktif()
	{
		return $this->db->query("SELECT * FROM tb_pegawai WHERE status = 1");
	}

	public function get_by_id($id)
	{
		return $this->db->query("SELECT * FROM tb_pegawai WHERE id_peg = ".$id);
	}
	
	public function getTidakAktif()
	{
		return $this->db->query("SELECT * FROM tb_pegawai WHERE status = 0");
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	
	public function update($table, $data, $where)
	{
		$this->db->where('id_peg', $where);
		$this->db->update($table, $data);
	}

	public function detail($table, $id)
	{
		return $this->db->query("SELECT * FROM tb_pegawai WHERE id_peg = ".$id);
	}


}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */