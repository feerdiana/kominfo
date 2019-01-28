<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends Admin {
	
	function index() {
		$data	= $this->public_data;
		$data['title']='Instansi';
		$data['page']='instansi';
		$data['content']='admin/instansi/index';
		$this->load->view('template', $data);
	}

	function save(){
		$id_instansi = $this->input->post('id_instansi');
		$data = array(
			'nama' => $this->input->post('nama'),
			'tempat' => $this->input->post('tempat'),
			'alamat' => $this->input->post('alamat'),
			'is_active' => $this->input->post('is_active'),
		);
		if($id_instansi){
			$this->db->where('id_instansi',$id_instansi)->update('__instansi',$data);
		}else{
			$this->db->insert('__instansi',$data);
		}
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo 'failed'; die;
		}else{
			$this->db->trans_commit();
			echo 'success';
		}
	}
}
