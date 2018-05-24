<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function authLogin($user, $pass)
	{
		$this->db->where("username", $user);
		$this->db->where("password", $pass);
		return $this->db->get('tb_user');
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */