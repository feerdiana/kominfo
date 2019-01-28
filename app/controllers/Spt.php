<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spt extends Admin {
	
	function index() {
		$data	= $this->public_data;
		$data['title']='SPT';
		$data['page']='spt';
		if($this->input->get('id')){
			$data['content']='admin/spt/petugas';
		}else{
			$data['content']='admin/spt/index';
		}
		$this->load->view('template', $data);
	}

	function save(){
		$id_spt = $this->input->post('id_spt');
		$data = array(
			'nomor' => $this->input->post('nomor'),
			'dasar' => $this->input->post('dasar'),
			'id_instansi' => $this->input->post('id_instansi'),
			'tanggal' => $this->input->post('tanggal'),
			'keperluan' => $this->input->post('keperluan'),
		);
		if($id_spt){
			$this->db->where('id_spt',$id_spt)->update('__spt',$data);
		}else{
			$this->db->insert('__spt',$data);
		}
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo 'failed'; die;
		}else{
			$this->db->trans_commit();
			echo 'success';
		}
	}
	function savePetugas(){
		$id_spt_pet = $this->input->post('id_spt_pet');
		$data = array(
			'id_spt' => $this->input->post('id_spt'),
			'id_petugas' => $this->input->post('id_petugas'),
		);
		if($id_spt_pet){
			$this->db->where('id_spt_pet',$id_spt_pet)->update('__spt_petugas',$data);
		}else{
			$this->db->insert('__spt_petugas',$data);
		}
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo 'failed'; die;
		}else{
			$this->db->trans_commit();
			echo 'success';
		}
	}
	function deletePetugas(){
		$id_spt_pet = de($this->input->get('id'));
		$this->db->where('id_spt_pet',$id_spt_pet)->delete('__spt_petugas');
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo 'failed delete'; die;
		}else{
			$this->db->trans_commit();
			redirect(base_url().'apps/spt?id='.$this->input->get('spt'));
		}
	}
}
