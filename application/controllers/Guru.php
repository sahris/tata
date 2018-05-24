<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_guru', 'mg');
	}

	public function index()
	{
		$data['title'] = "Master Guru";
		$data['content'] = "admin/guru_v.php";

		$data['isi'] = $this->mg->getAll()->result();
		$this->load->view('admin_temp', $data);
	}

	public function add()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'agama' => $this->input->post('agama'),
				'no_telp' => $this->input->post('no_telp'),
				'status' => $this->input->post('status')
			);

			$sql = $this->mg->insert('tb_guru', $data);

			if ($sql) {
				$data = $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			}else{
				$data = $this->session->set_flashdata('error', 'Gagal menambahkan');
			}

			redirect('guru','refresh', $data);
		}elseif (isset($_POST['update'])) {
			$data = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'agama' => $this->input->post('agama'),
				'no_telp' => $this->input->post('no_telp'),
				'status' => $this->input->post('status')
			);

			$id = $this->input->post('id_guru');

			$sql = $this->mg->update('tb_guru', $data, $id);

			if ($sql) {
				$data = $this->session->set_flashdata('success', 'Data berhasil diupdate');
			}else{
				$data = $this->session->set_flashdata('error', 'Gagal mengupdate data');
			}

			redirect('Guru','refresh', $data);
		}
	}

	public function getAktif()
	{
		$data['title'] = "Guru Aktif";
		$data['content'] = "admin/guru_v.php";

		$data['isi'] = $this->mg->getAktif()->result();
		$this->load->view('admin_temp', $data);
	}

	public function getTidakAktif()
	{
		$data['title'] = "Guru Tidak Aktif";
		$data['content'] = "admin/guru_v.php";

		$data['isi'] = $this->mg->getTidakAktif()->result();
		$this->load->view('admin_temp', $data);
	}

	public function detail()
	{
		$data['title'] = "Detail Guru";
		$data['content'] = "admin/guru_detail_v.php";

		$id = $this->uri->segment(3);
		$data['isi'] = $this->mg->getDetail($id)->row();
		$sql = $this->mg->getDetail($id)->row();

		if ($sql) {
			$this->load->view('admin_temp', $data);
		}else{
			$this->session->set_flashdata('error', 'Gagal mengambil data dari database');
			redirect('guru','refresh');
		}
	}

	public function getDetail()
	{
		$id = $this->uri->segment(3);
		$data = $this->mg->getDetail($id)->row();

		echo json_encode($data);
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$sql = $this->mg->delete('tb_guru', $id);

		if ($sql) {
			$data = $this->session->set_flashdata('success', 'Data berhasil dihapus');
		}else{
			$data = $this->session->set_flashdata('error', 'Gagal menghapus data');
		}

		redirect('guru','refresh', $data);
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */