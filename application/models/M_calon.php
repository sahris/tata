<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_calon extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}	

	public function getAll($table, $tahun)
	{
		return $this->db->order_by('no_urut','ASC')->get_where($table,['tahun' => $tahun])->result();
	}

	public function getOne($table,$id)
	{
		return $this->db->get_where($table,['id_calon' => $id])->row();
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function delete($table, $where)
	{
		$this->db->where('id_calon', $where);
		return $this->db->delete($table);
	}

	public function update($table,$data,$where)
	{
		$this->db->where('id_calon',$where);
		return $this->db->update($table, $data);
	}

}

/* End of file M_calon.php */
/* Location: ./application/models/M_calon.php */