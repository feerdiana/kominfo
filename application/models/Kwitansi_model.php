<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kwitansi_model extends CI_Model
	{
		public function getDataKwitansi()
		{
			$query = $this->db->get("kwitansi");
			return $query->result_array();
		}
		public function insertKwitansi()
		{
			$object = array(
				'no_bku' => $this->input->post('no_bku'),
				'kode_rek' => $this->input->post('kode_rek'),
				'no' => $this->input->post('no'),
				'dari' => $this->input->post('dari'),
				'sejumlah' => $this->input->post('sejumlah'),
				'untuk' => $this->input->post('untuk'),
				'rp' => $this->input->post('rp'));

			$this->db->insert('kwitansi', $object);
		}

		public function getKwitansi($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('kwitansi');
			return $query->result();
		}

		public function updateById($id)
		{
			$data = array(
				'no_bku' => $this->input->post('no_bku'),
				'kode_rek' => $this->input->post('kode_rek'),
				'no' => $this->input->post('no'),
				'dari' => $this->input->post('dari'),
				'sejumlah' => $this->input->post('sejumlah'),
				'untuk' => $this->input->post('untuk'),
				'rp' => $this->input->post('rp'),
			);
			$this->db->where('id', $id);
			$this->db->update('kwitansi', $data);
		}

        public function getAllKwitansi()
    	{
        	$query = $this->db->get('kwitansi');
        	if($query->num_rows()>0){
            return $query->result();
        }
    	}

    	public function save()
    	{
        	$data= $this->input->post();
        	$this->db->insert('kwitansi', $data);
    	}

    	public function delete($id)
    	{
        	$this->db->where('id', $id);
        	$this->db->delete('kwitansi');
    	}

    	public function updateKwitansi()
    	{
        	$data= $this->input->post();
        	$id= $this->input->post('id');
        	$this->db->where('id', $id);
        	$this->db->update('kwitansi',$data);
    	}

   } 


?>