<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppd extends Admin {
	
	function index() {
		$data	= $this->public_data;
		$data['title']='SPPD';
		$data['page']='sppd';
		$data['content']='admin/sppd/index';
		$this->load->view('template', $data);
	}

	function save(){
		$id_sppd = $this->input->post('id_sppd');
		$data = array(
			'id_spt' => $this->input->post('id_spt'),
			'angkutan' => $this->input->post('angkutan'),
			'tempat_berangkat' => $this->input->post('tempat_berangkat'),
			'lama_perjalanan' => $this->input->post('lama_perjalanan'),
			'tanggal_berangkat' => $this->input->post('tanggal_berangkat'),
			'tanggal_kembali' => $this->input->post('tanggal_kembali'),
			'hasil' => $this->input->post('hasil'),
			'catatan' => $this->input->post('catatan'),
		);
		if($id_sppd){
			$this->db->where('id_sppd',$id_sppd)->update('__sppd',$data);
		}else{
			$this->db->insert('__sppd',$data);
		}
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo 'failed'; die;
		}else{
			$this->db->trans_commit();
			echo 'success';
		}
	}

	function printsppd(){
		$page = $this->input->post('page');
		if($page=='excel'){
			echo base_url().'apps/excelsppd?sppd='.$this->input->post('id');
		}elseif($page=='pdf'){
			echo base_url().'apps/pdfsppd?sppd='.$this->input->post('id');
		}else{
			echo base_url().'apps/cetaksppd?sppd='.$this->input->post('id');
		}
	}
	function excelsppd(){
		echo 'on progress..';
		// $this->load->helper('download');
		// force_download('uploads/profile_default.png',NULL);
	}
	function pdfsppd(){
		$this->load->library('Pdf');
		$this->pdf->load_view('admin/sppd/pdfsppd');
        $this->pdf->render();
        $nameFile = date('YmdHis');
        $this->pdf->stream("SPPD_". $nameFile.'.pdf');
	}
	function cetaksppd(){
		$this->load->view('admin/sppd/pdfsppd');
		// $this->load->helper('download');
		// force_download('uploads/profile_default.png',NULL);
	}
}
