<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_system extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user_sys', 'mus');
	}

	public function index()
	{
		$data['title'] = "Manage User";
		
		$data['isi'] = $this->mus->getAll()->result();
		$data['hak_akses'] = $this->db->get('tb_hak_akses')->result();
		// $data['siswa'] = $this->mus->getSiswa()->result();
		$data['nis'] = $this->db->get('tb_siswa')->result();

		$data['content'] = "admin/user_system_v.php";
		$this->load->view('admin_temp', $data);
	}

	public function add()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'id_siswa' => $this->input->post('nis'), 
				'username' => $this->input->post('username'), 
				'password' => md5($this->input->post('password')), 
				'hak_akses' => $this->input->post('hak_akses'), 
				'status' => $this->input->post('status') 
			);

			$sql = $this->mus->insert('tb_user', $data);
			if ($sql) {
				$data = array(
					'success' => $this->session->set_flashdata('success', 'Anda berhasil menambahkan data user')
				);
			}else{
				$data = array(
					'error' => $this->session->set_flashdata('error', 'Gagal menambahkan data user')
				);
			}
			
			redirect('manageuser','refresh', $data);
			// echo json_encode($data);
		}
	}

	public function get()
	{
		$id = $this->uri->segment(3);
		
		$sql = $this->db->query("SELECT * FROM tb_user WHERE id_user = " .$id)->row();
		echo json_encode($sql);
	}

	public function update()
	{
		$sql = $this->mus->delete('tb_user', $id);

		redirect('manageuser','refresh');

		// echo $id;
	}

	public function delete()
	{
		$id = $this->input->post('id_user_system');
			
		$sql = $this->mus->delete('tb_user', $id);

		if ($sql) {
			$this->session->set_flashdata('success', 'Anda berhasil menghapus data user');
		}else{
			$this->session->set_flashdata('error', 'Gagal menghapus data user');
		}

		redirect('User_system/index','refresh');
	}

}

/* End of file User_system.php */
/* Location: ./application/controllers/User_system.php */