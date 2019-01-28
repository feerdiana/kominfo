<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function checkAuth(){
		if(($this->session->userdata('session_id')) AND ($this->session->userdata('token')=='8dfc498f63ca6de129bf13bfe228e6d6')){
			redirect(base_url().'apps/dashboard');
			
		}else{			
			echo "<script>window.location = '".base_url()."logiN';</script>";
		}
	}
	
	function login() {
		if(($this->session->userdata('session_id')) AND ($this->session->userdata('token')=='8dfc498f63ca6de129bf13bfe228e6d6')){
			redirect(base_url().'apps/dashboard');
		}
		$data['title']='Sign in';
		$data['content']='auth';
		$this->load->view('template', $data);
	}
	public function cekLogiN() {
		$where = array(
			'username' => en($this->input->post('username')),
			'password' => en($this->input->post('password')),
			'is_active' => 1
		);
		$hasil=$this->db->select('user_id, fullname')->where($where)->get('__users');
		if($hasil->num_rows()>0){
			$hasil_row = $hasil->row_array();
			$data = array(
				"token"=> '8dfc498f63ca6de129bf13bfe228e6d6',
				"session_id"=> $hasil_row['user_id'],
			);
			$this->session->set_userdata($data);
			echo base_url().'apps/dashboard';
		}else{
			echo 'failed';
		}
	}

	public function deleteSession(){
		$this->session->unset_userdata('session_id');
		$this->session->unset_userdata('token');
		$this->session->set_flashdata('warning','Session deleted, please sign in with your account');
		echo "<script>window.location = '".base_url()."logiN';</script>";
	}

}
