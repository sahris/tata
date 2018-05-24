<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_calon','calon');
	}

	public function index()
	{
		$data['title'] = "Master Calon";
		$data['content'] = "admin/calon_v.php";
		$data['page_load'] = "view";

		$data['isi'] = $this->calon->getAll('tb_calon');
		$this->load->view('admin_temp', $data);
	}

	public function add()
	{
		$data['title'] = "Tambah Calon";
		$data['content'] = "admin/calon_v.php";
		$data['page_load'] = "add";

		$this->load->view('admin_temp', $data);
	}

	public function daftar()
	{
		if (isset($_POST['simpan'])) {

			$foto_ketua = $_FILES['foto_calon_ketua']['name'];
			$foto_wakil_ketua = $_FILES['foto_calon_wakil_ketua']['name'];

			if ($foto_ketua == "") {
				$data['no_urut'] = $this->input->post('no_urut');
				$data['c_ket'] = $this->input->post('nama_calon_ketua');
				$data['cw_ket'] = $this->input->post('nama_calon_wakil_ketua');
				$data['foto_c_w_ket'] = $_FILES['foto_calon_wakil_ketua']['name'];
				$data['visi'] = $this->input->post('visi');
				$data['misi'] = $this->input->post('misi');
				$awal_periode = $this->input->post('awal_periode');
				$akhir_periode = $this->input->post('akhir_periode');
				$data['periode'] = $awal_periode.' - '.$akhir_periode;
				# handel file foto
	            $config['upload_path'] = './img_calon/';
	            $config['allowed_types'] = 'gif|jpg|jpeg|png';

	            $this->load->library('upload', $config);

	            $img_cwk = $this->upload->do_upload('foto_calon_wakil_ketua');

	            if ($img_cwk) {
	                // $data['photo_dokter'] = $this->upload->data('file_name');
	                $this->calon->insert('tb_calon',$data);
	                $this->session->set_flashdata('success', 'Berhasil insert data <b>tanpa foto calon ketua</b>');
	            }else{
	                $this->session->set_flashdata('error', 'Gagal insert data');
	            }
			}elseif($foto_wakil_ketua == ""){
				$data['no_urut'] = $this->input->post('no_urut');
				$data['c_ket'] = $this->input->post('nama_calon_ketua');
				$data['cw_ket'] = $this->input->post('nama_calon_wakil_ketua');
				$data['foto_c_ket'] = $_FILES['foto_calon_ketua']['name'];
				$data['visi'] = $this->input->post('visi');
				$data['misi'] = $this->input->post('misi');
				$awal_periode = $this->input->post('awal_periode');
				$akhir_periode = $this->input->post('akhir_periode');
				$data['periode'] = $awal_periode.' - '.$akhir_periode;

				# handel file foto
	            $config['upload_path'] = './img_calon/';
	            $config['allowed_types'] = 'gif|jpg|jpeg|png';

	            $this->load->library('upload', $config);

	            $img_ck = $this->upload->do_upload('foto_calon_ketua');

	            if ($img_ck) {
	                // $data['photo_dokter'] = $this->upload->data('file_name');
	                $this->calon->insert('tb_calon',$data);
	                $this->session->set_flashdata('success', 'Berhasil insert data <b>tanpa foto calon wakil ketua</b>');
	            }else{
	                $this->session->set_flashdata('error', 'Gagal insert data');
	            }
			}elseif($foto_ketua == "" && $foto_wakil_ketua == ""){
				$data['no_urut'] = $this->input->post('no_urut');
				$data['c_ket'] = $this->input->post('nama_calon_ketua');
				$data['cw_ket'] = $this->input->post('nama_calon_wakil_ketua');
				$data['visi'] = $this->input->post('visi');
				$data['misi'] = $this->input->post('misi');
				$awal_periode = $this->input->post('awal_periode');
				$akhir_periode = $this->input->post('akhir_periode');
				$data['periode'] = $awal_periode.' - '.$akhir_periode;

				$sql = $this->calon->insert('tb_calon',$data);

	            if ($sql) {
	                $this->session->set_flashdata('success', 'Berhasil insert data <b>tanpa foto calon ketua dan foto calon wakil ketua</b>');
	            }else{
	                $this->session->set_flashdata('error', 'Gagal insert data');
	            }
			}else{
				$data['no_urut'] = $this->input->post('no_urut');
				$data['c_ket'] = $this->input->post('nama_calon_ketua');
				$data['cw_ket'] = $this->input->post('nama_calon_wakil_ketua');
				$data['foto_c_ket'] = $_FILES['foto_calon_ketua']['name'];
				$data['foto_c_w_ket'] = $_FILES['foto_calon_wakil_ketua']['name'];
				$data['visi'] = $this->input->post('visi');
				$data['misi'] = $this->input->post('misi');
				$awal_periode = $this->input->post('awal_periode');
				$akhir_periode = $this->input->post('akhir_periode');
				$data['periode'] = $awal_periode.' - '.$akhir_periode;

				# handel file foto
	            $config['upload_path'] = './img_calon/';
	            $config['allowed_types'] = 'gif|jpg|jpeg|png';

	            $this->load->library('upload', $config);

	            $img_ck = $this->upload->do_upload('foto_calon_ketua');
	            $img_cwk = $this->upload->do_upload('foto_calon_wakil_ketua');

	            if ($img_ck && $img_cwk) {
	                // $data['photo_dokter'] = $this->upload->data('file_name');
	                $this->calon->insert('tb_calon',$data);
	                $this->session->set_flashdata('success', 'Berhasil insert data');
	            }else{
	                $this->session->set_flashdata('error', 'Gagal insert data');
	            }
			}
            redirect('Calon','refresh');
		}
	}

	public function edit()
	{
		$data['title'] = "Edit Calon";
		$data['content'] = "admin/calon_v.php";
		$data['page_load'] = "edit";

		$id = $this->uri->segment(3);
		$data['data_calon'] = $this->calon->getOne('tb_calon',$id);

		$this->load->view('admin_temp', $data);
	}

	public function edit_proses()
	{
		if (isset($_POST['update'])) {
			$id = $this->input->post('id_calon');
			$select = $this->calon->getOne('tb_calon', $id);
			$config['upload_path'] = './img_calon/';
			$foto_ketua = $select->foto_c_ket;
			$foto_wakil_ketua = $select->foto_c_w_ket;
			// echo $foto_ketua.' '.$foto_wakil_ketua;die();
			$data['foto_c_ket'] = $_FILES['foto_calon_ketua']['name'];
			$data['foto_c_w_ket'] = $_FILES['foto_calon_wakil_ketua']['name'];

			if ($foto_ketua != "" && $foto_wakil_ketua != "") {
				if ($data['foto_c_ket'] == "" && $data['foto_c_w_ket'] == "") {
					echo "Foto ketua lama ada, foto wakil ketua lama ada, foto ketua baru kosong, foto wakil ketua baru kosong";
				}elseif($data['foto_c_ket'] == "" && $data['foto_c_w_ket'] != ""){
					echo "Foto ketua lama ada, foto wakil ketua lama ada, foto ketua baru kosong, foto wakil ketua baru ada";
				}elseif($data['foto_c_ket'] != "" && $data['foto_c_w_ket'] == ""){
					echo "Foto ketua lama ada, foto wakil ketua lama ada, foto ketua baru ada, foto wakil ketua baru kosong";
				}elseif($data['foto_c_ket'] != "" && $data['foto_c_w_ket'] != ""){
					echo "Foto ketua lama ada, foto wakil ketua lama ada, foto ketua baru ada, foto wakil ketua baru ada";
				}
			}

		}else{
			echo "Gagal";
		}
	}

	public function getAjax()
	{
		$id = $this->uri->segment(3);
		$sql = $this->calon->getOne('tb_calon',$id);
		if ($sql) {
			$ret['data'] = $sql;
			$ret['status'] = 200;
		}else{
			$ret['status'] = 500;
		}
		echo json_encode($ret);
	}

	public function delete()
	{
		if (isset($_POST['delete'])) {
			$id = $this->input->post('id_calon');
			$select = $this->calon->getOne('tb_calon',$id);
			$config['upload_path'] = './img_calon/';
			$foto_ketua = $select->foto_c_ket;
			$foto_wakil_ketua = $select->foto_c_w_ket;

			if ($foto_ketua != "") {
				$hapus_foto = unlink($config['upload_path'].$foto_ketua);
				$sql = $this->calon->delete('tb_calon',$id);
				if ($sql) {
					$this->session->set_flashdata('success','Berhasil hapus data');
				}else{
					$this->session->set_flashdata('error','Gagal hapus data');
				}
			}elseif($foto_wakil_ketua != ""){
				$hapus_foto = unlink($config['upload_path'].$foto_wakil_ketua);
				$sql = $this->calon->delete('tb_calon',$id);
				if ($sql) {
					$this->session->set_flashdata('success','Berhasil hapus data');
				}else{
					$this->session->set_flashdata('error','Gagal hapus data');
				}
			}elseif ($foto_ketua != "" && $foto_wakil_ketua != "") {
				$hapus_foto_ketua = unlink($config['upload_path'].$foto_ketua);
				$hapus_foto_wakil_ketua = unlink($config['upload_path'].$foto_wakil_ketua);
				$sql = $this->calon->delete('tb_calon',$id);
				if ($sql) {
					$this->session->set_flashdata('success','Berhasil hapus data');
				}else{
					$this->session->set_flashdata('error','Gagal hapus data');
				}
			}
			redirect('Calon','refresh');
		}
	}
}

/* End of file Calon.php */
/* Location: ./application/controllers/Calon.php */