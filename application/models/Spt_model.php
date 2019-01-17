<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Spt_model extends CI_Model
	{
		public function getDataSpt()
		{
			$query = $this->db->get("spt");
			return $query->result_array();
		}

		public function insertSpt()
		{
			$tgl=$this->input->post('tanggal');
			$tglBaru=date_format(new DateTime($tgl),"Y-m-d");
			$object = array(
				'no_surat' => $this->input->post('no_surat'),
				'perihal' => $this->input->post('perihal'),
				'tanggal' => $tglBaru,
				'petugas' => $this->input->post('petugas'),
				'tujuan' => $this->input->post('tujuan'),
				'hasil' => $this->input->post('hasil'));
			$this->db->insert('spt', $object);
		}

		public function getSpt($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('spt');
			return $query->result();
		}

		public function updateById($id)
		{
			$data = array(
				'no_surat' => $this->input->post('no_surat'),
				'perihal' => $this->input->post('perihal'),
				'tanggal' => $this->input->post('tanggal'),
				'petugas' => $this->input->post('petugas'),
				'tujuan' => $this->input->post('tujuan'),
				'hasil' => $this->input->post('hasil')
			);
			$this->db->where('id', $id);
			$this->db->update('spt', $data);
		}

		public function delete($id)
		{ 
        	if ($this->db->delete("spt", "id = ".$id)) { 
            return true; 
        }
      } 
	}

?>