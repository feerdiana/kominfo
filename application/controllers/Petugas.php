<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
 		if($this->session->userdata('logged_in')){
 			$session_data = $this->session->userdata('logged_in');
 			$data['username'] = $session_data['username'];
 			$data['level'] = $session_data['level'];
 			$current_controller = $this->router->fetch_class();
 			$this->load->library('acl');
 			if (! $this->acl->is_public($current_controller))
 			{
 				if (! $this->acl->is_allowed($current_controller, $data['level']))
 				{
 					echo '<script>alert("Anda Tidak Memiliki Hak Akses")</script>';
 					redirect('login/logout','refresh');
 				}
 			}
 		}else{
 			redirect('login','refresh');
 		}
 	}

	public function byID($idPegawai)
	{
		$this->load->helper('url');
		$data['idPegawai'] = $idPegawai;
		$this->load->model('Spt_model');
		$data['spt'] = $this->Spt_model->getSpt($idPegawai);
		$this->load->model('Petugas_model');
		$data["petugas_list"] = $this->Petugas_model->getPetugasByIdJabatan($idPegawai);
		$this->load->view('petugas_view', $data);
	}

	public function create($idPegawai)
	{
		$data['idPegawai'] = $idPegawai;
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
		$this->load->model('Petugas_model');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('tambah_petugas_view',$data);
		}
		else
		{
			$this->Petugas_model->insertPetugas($idPegawai);
			redirect('Petugas/byID/'.$idPegawai,'refresh');

		}
	}

	public function update($idPegawai,$id_petugas)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'trim|required');
		$this->load->model('Petugas_model');
		$data['idPegawai'] = $idPegawai;
		$data['id_petugas'] = $id_petugas;
		$data['petugas'] = $this->Petugas_model->getPetugas($id_petugas);

		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('edit_petugas_view',$data);
		}
		else
		{
			$this->Petugas_model->updateById($id_petugas);
			redirect('Petugas/byID/'.$idPegawai,'refresh');
		}
	}

	public function deleteData($idPegawai,$id_petugas)
	{
		$this->load->helper("url");
		$this->load->model("Petugas_model");
		$this->Petugas_model->delete($id_petugas);
		redirect('Petugas/byID/'.$idPegawai,'refresh');
	}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */
 ?>