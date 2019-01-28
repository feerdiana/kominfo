<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    protected $public_data=array();
    
	public function __construct() {
		parent::__construct();
        if((!$a=$this->session->userdata('session_id')) OR ($this->session->userdata('token')!='8dfc498f63ca6de129bf13bfe228e6d6')){
			echo "<script>window.location = '".base_url()."destroY';</script>"; die;
		}else{
			$where = array(
				'user_id' =>$a,
				'is_active' =>1
			);
			$userInfo=$this->db->select('fullname')->where($where)->get('__users')->row_array();
			if($userInfo==null){
				echo "<script>window.location = '".base_url()."destroY';</script>"; die;
			}
			$this->public_data['info']['user_fullname']=$userInfo['fullname'];
			
		}
    }
}
