<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Petugas_model extends CI_Model
	{
		public function getDataPetugas()
		{
			$query = $this->db->get("petugas");
			return $query->result_array();
		}
		public function getPetugasByIdJabatan($id)
		{
			$query = $this->db->query("select * from petugas where fk_pegawai='$id'");
			return $query->result_array();
		}
		public function insertPetugas()
		{
			
			$object = array(
				'id_petugas' => $this->input->post('id_petugas'),
				'nama_petugas' => $this->input->post('nama_petugas'),
				'nip' => $this->input->post('nip'),
				'pangkat' => $this->input->post('pangkat'),
				'jabatan' => $this->input->post('jabatan'),
				'fk_pegawai' => $this->input->post('fk_pegawai')
			);
			$this->db->insert('petugas', $object);
		}

		public function getPetugas($id)
		{
			$this->db->where('id_petugas', $id);
			$query = $this->db->get('petugas');
			return $query->result();
		}

		public function updateById($id)
		{
			$data = array(
				'nama_petugas' => $this->input->post('nama_petugas'),
				'nip' => $this->input->post('nip'),
				'pangkat' => $this->input->post('pangkat'),
				'jabatan' => $this->input->post('jabatan'),
			);
			$this->db->where('id_petugas', $id);
			$this->db->update('petugas', $data);
		}

		public function delete($id)
		{ 
        	if ($this->db->delete("petugas", "id_petugas = ".$id)) { 
            return true; 
        }
      } 
	}

?>