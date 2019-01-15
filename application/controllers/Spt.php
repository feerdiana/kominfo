<?php
ob_start();
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Spt extends CI_Controller {
 
 	/*public function __construct()
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
 					redirect('login/logout','refresh');
 				}
 			}
 		}else{
 			redirect('login','refresh');
 		}
 	}*/

 	public function Index()
 	{
 		//$session_data=$this->session->userdata('logged_in');
 		//$data['username']=$session_data['username'];
 		//$this->load->view('home',$data);

 		$this->load->helper('url','form');
		$this->load->model('spt_model');
		$data['spt_list'] = $this->spt_model->getDataSpt();
		$this->load->view('spt', $data);
 	}

 	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('spt_model');
		$this->form_validation->set_rules('Perihal', 'Perihal', 'trim|required');
		$this->form_validation->set_rules('Petugas', 'Petugas', 'trim|required');
		$this->form_validation->set_rules('Waktu_Pelaksanaan', 'Waktu Pelaksanaan', 'trim|required');

		

		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('tambah_spt_view');
		}
		else
				$this->pegawai_model->insertPegawai();
				$this->load->view('tambah_spt_data');
		}

	}

	public function update($No_Surat)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('spt_model');
		$this->form_validation->set_rules('Perihal', 'Perihal', 'trim|required');
		$this->form_validation->set_rules('Petugas', 'Petugas', 'trim|required');
		$this->form_validation->set_rules('tglLahir', 'Tgl Lahir', 'trim|required');
		

		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('tambah_spt_view');
		}
		else
		{
			
			$this->pegawai_model->insertPegawai();
			$this->load->view('tambah_pegawai_data');
		}
	}

	public function deleteData($No_Surat)
	{
		$this->load->helper("url");
		$this->load->model("spt_model");
		$this->spt_model->delete($No_Surat);
		redirect('spt');
	}
 
 }
 
 /* End of file Pegawai.php */
 /* Location: ./application/controllers/Pegawai.php */ ?>