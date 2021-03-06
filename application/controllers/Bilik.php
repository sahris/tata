<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bilik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_bilik', 'mb');
	}

	public function index()
	{
		$data['title'] = "Bilik Pemilihan";
		$data['content'] = "admin/bilik_v.php";
		
		$data['isi'] = $this->mb->getAll()->result();

		$this->load->view('admin_temp', $data);
	}

	public function detail()
	{
		$id = $this->uri->segment(3);

		$sql = $this->mb->detail('tb_bilik', $id);

		if ($sql) {
			echo json_encode($sql);
		}else{
			echo "Gagal ambil data";
		}
	}

	public function getAktif()
	{
		$data['title'] = "Bilik Aktif";
		$data['content'] = "admin/bilik_v.php";
		
		$data['isi'] = $this->mb->getAktif()->result();

		$this->load->view('admin_temp', $data);
	}

	public function getTidakAktif()
	{
		$data['title'] = "Bilik Tidak Aktif";
		$data['content'] = "admin/bilik_v.php";
		
		$data['isi'] = $this->mb->getTidakAktif()->result();

		$this->load->view('admin_temp', $data);
	}

	public function getId()
	{
		$id = $this->uri->segment(3);

		$sql = $this->mb->getId('tb_bilik', $id)->row();

		echo json_encode($sql);
	}

	public function add()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'tahun' => $this->input->post('tahun'), 
				'mulai' => $this->input->post('mulai'), 
				'selesai' => $this->input->post('selesai'),
				'status' => 1
			);

			$sql = $this->mb->insert('tb_bilik', $data);
			if ($sql) {
				$msg = "Berhasil insert data";
				$this->session->set_flashdata('success',$msg);
			}else{
				$msg = "Gagal insert data";
				$this->session->set_flashdata('error',$msg);
			}
			redirect('bilik','refresh');
		}
	}

	public function delete()
	{
		if ($this->input->method() == "post") {
			$id = $this->input->post('id_bilik');
			$sql_delete = $this->mb->delete('tb_bilik',$id);
			if ($sql_delete) {
				$ret['status'] = 200;
				$msg = "Berhasil hapus data";
				$this->session->set_flashdata('success',$msg);
			}else{
				$ret['status'] = 500;
				$msg = "Gagal hapus data";
				$this->session->set_flashdata('error',$msg);
			}
			redirect('Bilik','refresh');
		}
	}

}

/* End of file Bilik.php */
/* Location: ./application/controllers/Bilik.php */