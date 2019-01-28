<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends Admin {
	
	function index() {
		$data	= $this->public_data;
		$data['title']='Petugas';
		$data['page']='petugas';
		$data['content']='admin/petugas/index';
		$this->load->view('template', $data);
	}

	function save(){
		$id_petugas = $this->input->post('id_petugas');
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'pangkat' => $this->input->post('pangkat'),
			'jabatan' => $this->input->post('jabatan'),
			'is_active' => $this->input->post('is_active'),
		);
		if($id_petugas){
			$nip = $this->db->where(array('nip'=>$this->input->post('nip')))->get('__petugas')->num_rows();
			if(($nip>0) && ($this->input->post('nip')!=$this->input->post('nip_old'))){
				echo 'available'; die;
			}else{
				$this->db->where('id_petugas',$id_petugas)->update('__petugas',$data);
			}
		}else{
			$nip = $this->db->where(array('nip'=>$this->input->post('nip')))->get('__petugas')->num_rows();
			if($nip>0){
				echo 'available'; die;
			}else{
				$this->db->insert('__petugas',$data);
			}
		}
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo 'failed'; die;
		}else{
			$this->db->trans_commit();
			echo base_url().'apps/petugas';	die;
		}
	}
}
