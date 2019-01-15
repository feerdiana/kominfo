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
			$tgl=$this->input->post('Waktu_Pelaksanaan');
			$tglBaru=date_format(new DateTime($tgl),"Y-m-d");
			$object = array(
				'No_Surat' => $this->input->post('No_Surat'),
				'Perihal' => $this->input->post('Perihal'),
				'Petugas' => $this->input->post('Petugas'),
				'Waktu_Pelaksanaan' => $tglBaru,
				'Hasil' => $this->input->post('Hasil'));
			$this->db->insert('spt', $object);
		}

		public function getSpt($No_Surat)
		{
			$this->db->where('No_Surat', $No_Surat);
			$query = $this->db->get('spt');
			return $query->result();
		}

		public function updateByNo_Surat($No_Surat)
		{
			$data = array(
				//'No_Surat' => $this->input->post('No_Surat'),
				'Perihal' => $this->input->post('Perihal'),
				'Petugas' => $this->input->post('Petugas'),
				'Waktu_Pelaksanaan' => $this->input->post('Waktu_Pelaksanaan'),
				'Hasil' => $this->input->post('Hasil')
			);
			$this->db->where('No_Surat', $No_Surat);
			$this->db->update('spt', $data);
		}

		public function delete($No_Surat)
		{ 
        	if ($this->db->delete("spt", "No_Surat = ".$No_Surat)) { 
            return true; 
        }
      } 
	}

?>