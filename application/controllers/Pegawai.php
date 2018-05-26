<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pegawai', 'mp');
	}

	public function index()
	{
		$tahun = $this->session->userdata('tahun');
		$data['title'] = "Master Pegawai";
		$data['content'] = "admin/pegawai_v.php";

		$data['isi'] = $this->mp->getAll($tahun)->result();

		$this->load->view('admin_temp', $data);
	}

	public function getAktif()
	{
		$data['title'] = "Pegawai Aktif";
		$data['content'] = "admin/pegawai_v.php";

		$data['isi'] = $this->mp->getAktif()->result();

		$this->load->view('admin_temp', $data);
	}

	public function getId($id)
	{
		$data = $this->mp->get_by_id($id)->row();
		echo json_encode($data);
	}

	public function getTidakAktif()
	{
		$data['title'] = "Pegawai Tidak Aktif";
		$data['content'] = "admin/pegawai_v.php";

		$data['isi'] = $this->mp->getTidakAktif()->result();

		$this->load->view('admin_temp', $data);
	}

	public function detail()
	{
		$data['title'] = "Detail Pegawai";
		$data['content'] = "admin/pegawai_detail_v.php";

		$id = $this->uri->segment(3);

		$data['isi'] = $this->mp->detail('tb_pegawai', $id)->row();

		$this->load->view('admin_temp', $data);
	}

	public function add()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'nama_peg' => $this->input->post('nama'), 
				'alamat_peg' => $this->input->post('alamat'), 
				'jabatan' => $this->input->post('jabatan'), 
				'jk' => $this->input->post('jk'), 
				'agama' => $this->input->post('agama'), 
				'no_telp' => $this->input->post('notelp'), 
				'status' => $this->input->post('status') 
			);

			$sql = $this->mp->insert('tb_pegawai', $data);

			if ($sql) {
				$data = $this->session->set_flashdata('success', 'Data berhasil dihapus');
			}else{
				$data = $this->session->set_flashdata('error', 'Gagal menghapus data');
			}

			redirect('pegawai','refresh', $data);
		}elseif (isset($_POST['update'])) {
			$data = array(
				'nama_peg' => $this->input->post('nama'), 
				'alamat_peg' => $this->input->post('alamat'), 
				'jabatan' => $this->input->post('jabatan'), 
				'jk' => $this->input->post('jk'), 
				'agama' => $this->input->post('agama'), 
				'no_telp' => $this->input->post('notelp'), 
				'status' => $this->input->post('status') 
			);

			$where = $this->input->post('id_peg');

			$sql = $this->mp->update('tb_pegawai', $data,$where);

			if ($sql) {
				$data = $this->session->set_flashdata('success', 'Data berhasil terupdate');
			}else{
				$data = $this->session->set_flashdata('error', 'Gagal mengupdate data');
			}

			redirect('pegawai','refresh', $data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */