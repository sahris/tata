<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public function get_all($table, $where)
	{
		return $this->db->get_where($table,['tahun' => $where]);
	}	

}

/* End of file M_dashboard.php */
/* Location: ./application/models/M_dashboard.php */