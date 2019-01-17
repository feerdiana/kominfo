<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppd extends CI_Controller {

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

	public function index()
	{
		$this->load->helper('url','form');
		$this->load->model('sppd_model');
		$data['sppd_list'] = $this->sppd_model->getDataSppd();
		$this->load->view('sppd', $data);
	}

	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('sppd_model');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('pangkat', 'pangkat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('maksud', 'maksud', 'trim|required');
		

		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('tambah_sppd_view');
		}
		else
		{			
			$this->sppd_model->insertSppd();
			$this->load->view('tambah_sppd_data');
		}
		

	}

	public function update($id)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('pangkat', 'pangkat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('maksud', 'maksud', 'trim|required');


		$this->load->model('sppd_model');
		$data['sppd'] = $this->sppd_model->getSppd($id);

		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('edit_sppd_view',$data);
		}
		else
		{
			$this->sppd_model->updateById($id);
			$this->load->view('edit_sppd_data');
		}
	}

	public function deleteData($id)
	{
		$this->load->helper("url");
		$this->load->model("sppd_model");
		$this->sppd_model->delete($id);
		redirect('sppd');
	}
}

