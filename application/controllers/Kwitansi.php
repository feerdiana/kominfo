<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwitansi extends CI_Controller {

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
		$this->load->model('kwitansi_model');
		$data['kwitansi_list'] = $this->kwitansi_model->getDataKwitansi();
		$this->load->view('kwitansi', $data);
	}

	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('kwitansi_model');
		$this->form_validation->set_rules('no_bku', 'no_bku', 'trim|required');
		$this->form_validation->set_rules('kode_rek', 'kode_rek', 'trim|required');
		$this->form_validation->set_rules('no', 'no', 'trim|required');
		$this->form_validation->set_rules('dari', 'dari', 'trim|required');
		$this->form_validation->set_rules('sejumlah', 'sejumlah', 'trim|required');
		$this->form_validation->set_rules('untuk', 'untuk', 'trim|required');
		$this->form_validation->set_rules('rp', 'rp', 'trim|required');


		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('tambah_kwitansi_view');
		}
		else
		{			
			$this->kwitansi_model->insertKwitansi();
			$this->load->view('tambah_kwitansi_data');
		}
		

	}

	public function update($id)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_bku', 'no_bku', 'trim|required');
		$this->form_validation->set_rules('kode_rek', 'kode_rek', 'trim|required');
		$this->form_validation->set_rules('no', 'no', 'trim|required');
		$this->form_validation->set_rules('dari', 'dari', 'trim|required');
		$this->form_validation->set_rules('sejumlah', 'sejumlah', 'trim|required');
		$this->form_validation->set_rules('untuk', 'untuk', 'trim|required');
		$this->form_validation->set_rules('rp', 'rp', 'trim|required');

		$this->load->model('kwitansi_model');
		$data['kwitansi'] = $this->kwitansi_model->getKwitansi($id);

		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('edit_kwitansi_view',$data);
		}
		else
		{
			$this->kwitansi_model->updateById($id);
			$this->load->view('edit_kwitansi_data');
		}
	}

	public function deleteData($id)
	{
		$this->load->helper("url");
		$this->load->model("kwitansi_model");
		$this->kwitansi_model->delete($id);
		redirect('kwitansi');
	}
}

