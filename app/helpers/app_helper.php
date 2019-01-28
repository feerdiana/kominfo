<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function potong_text($text,$max=50,$dot=true){
	$data=strip_tags($text);
	$data=substr($data,0,$max);
	if($dot==true){
		$data.=" ...";
	}
	return $data;
}

function select($i,$j){
	if($i==$j){
		return "selected";
	}
}

function Currency($number) {
	return 'Rp '.number_format($number,2,',','.');
}

function rupiah($number) {
	return 'Rp '.number_format($number,2,',','.');
}
function rp($number) {
	return 'Rp '.number_format($number,0,',','.');
}

function is_access($modul){
	$CI =& get_instance();
	$user = $CI->session->userdata('session_id');
	$is_access = $CI->db->select('role_id')->from('__roles AS A')->join('__users AS B', 'B.group_id = A.group_id')
				->where(array('B.user_id' => $user, 'A.module_id' => $modul, 'A.is_active'=>1,'B.is_active'=>1))
				->get()->num_rows();
	if($is_access<1){
		$CI->session->set_flashdata('warning','Do not have access to the page');	
		echo "<script>window.history.back();</script>";
	}
}

function is_show($modul){
	$CI =& get_instance();
	$user = $CI->session->userdata('session_id');
	$is_access = $CI->db->select('role_id')->from('__roles AS A')->join('__users AS B', 'B.group_id = A.group_id')
				->where(array('B.user_id' => $user, 'A.module_id' => $modul, 'A.is_active'=>1,'B.is_active'=>1))
				->get()->num_rows();
	if($is_access>0){
		return true;
	}else{
		return false;
	}
}

function dt($datetime){
	return date_format(date_create($datetime),"d M Y H:i:s");
}

function tgl($datetime){
	return date_format(date_create($datetime),"d-M-y");
}

function date_long($datetime){
	return date_format(date_create($datetime),"d F Y");
}

function date_time(){
	return date('Y-m-d H:i:s');
}
function date_now(){
	return date('Y-m-d');
}


function imgcaptcha(){
	$CI =& get_instance();
	$files = glob('./captcha/*');	
	foreach($files as $file){
		if(is_file($file)){
			unlink($file);
		}
	}
	$CI->load->helper('captcha');
	$vals = array(
		'img_path'		=> './captcha/',
		'img_url'		=> base_url().'captcha/',
		'expiration'	=> 7200,
		'pool'			=> 'abcdeCDRSTijk01UVfgh234lmnopqrEFGHIJ56789KLMNOPQstuvwxyzABWXYZ',
	);
	$cap = create_captcha($vals);
	$CI->session->set_userdata('authcaptcha', $cap['word']);
	return $cap['image'];
}

function session_user(){
	$CI =& get_instance();
	return $CI->session->userdata('session_id');
}

function fullname($usr){
	$CI =& get_instance();
	$row = $CI->db->select('fullname')->where('user_id',de($usr))->get('__users')->row();
	if($row){
		return $row->fullname;
	}
}

function acak($type,$panjang){
	if($type=='number'){
		$karakter = '1234567890';
	}else{
		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	}
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}

