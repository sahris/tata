<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bilik extends CI_Model {

	public function getAll()
	{
		return $this->db->get('tb_bilik');
	}

	public function detail($table, $id)
	{
		// return $this->db->query("SELECT * FROM tb_bilik WHERE id_bilik = ". $id)->row();
		$this->db->where('id_bilik', $id);
		return $this->db->get($table)->row();
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function getId($table, $id)
	{
		$this->db->where('id_bilik', $id);
		return $this->db->get($table);
	}

	public function getAktif()
	{
		$this->db->where('status', 1);
		return $this->db->get('tb_bilik');
	}

	public function getTidakAktif()
	{
		$this->db->where('status', 0);
		return $this->db->get('tb_bilik');
	}

	public function delete($table, $id)
	{
		$this->db->where('id_bilik',$id);
		return $this->db->delete($table);
	}

}

/* End of file M_bilik.php */
/* Location: ./application/models/M_bilik.php */