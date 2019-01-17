<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sppd_model extends CI_Model
	{
		public function getDataSppd()
		{
			$query = $this->db->get("sppd");
			return $query->result_array();
		}
		public function insertSppd()
		{
			$tgl=$this->input->post('pengambilan');
			$tglBaru=date_format(new DateTime($tgl),"Y-m-d");
			$object = array(
				'nama' => $this->input->post('nama'),
				'pangkat' => $this->input->post('pangkat'),
				'jabatan' => $this->input->post('jabatan'),
				'maksud' => $this->input->post('maksud'),
				'tmp_berangkat' => $this->input->post('tmp_berangkat'),
				'tmp_tujuan' => $this->input->post('tmp_tujuan'),
				'tgl_berangkat' => $tglBaru,
				'tgl_kembali' => $this->input->post('tgl_kembali'),
				'instansi' => $this->input->post('instansi'),
				'rekening' => $this->input->post('rekening'));
			$this->db->insert('sppd', $object);
		}

		public function getSppd($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('sppd');
			return $query->result();
		}

		public function updateById($id)
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'pangkat' => $this->input->post('pangkat'),
				'jabatan' => $this->input->post('jabatan'),
				'maksud' => $this->input->post('maksud'),
				'tmp_berangkat' => $this->input->post('tmp_berangkat'),
				'tmp_tujuan' => $this->input->post('tmp_tujuan'),
				'tgl_berangkat' => $this->input->post('tgl_berangkat'),
				'tgl_kembali' => $this->input->post('tgl_kembali'),
				'instansi' => $this->input->post('instansi'),
				'rekening' => $this->input->post('rekening'));
			$this->db->where('id', $id);
			$this->db->update('sppd', $data);
		}

        public function getAllSppd()
    	{
        	$query = $this->db->get('sppd');
        	if($query->num_rows()>0){
            return $query->result();
        }
    }

    	public function save()
    	{
        	$data= $this->input->post();
        	$this->db->insert('sppd', $data);
    	}

    	public function delete($id)
    	{
        	$this->db->where('id', $id);
        	$this->db->delete('sppd');
    	}

    	public function updateSppd()
    	{
        	$data= $this->input->post();
        	$id= $this->input->post('id');
        	$this->db->where('id', $id);
        	$this->db->update('sppd',$data);
    	}

   } 


?>