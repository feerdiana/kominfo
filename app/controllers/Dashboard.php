<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin {
	
	function home() {
		$data	= $this->public_data;
		$data['title']='Dashboard';
		$data['page']='dashboard';
		$data['content']='admin/dashboard/dashboard';
		$this->load->view('template', $data);
	}
}
