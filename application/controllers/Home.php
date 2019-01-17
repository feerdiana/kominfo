<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') == null){
            redirect('Login','refresh');
        }
    }

    public function index()
    {
       $this->load->view('home.php');
    }

    public function gridDinamis()
    {
        $this->load->view('GridDinamisView');
    }

    public function getAllSppd()
    {
        $this->load->model('Sppd_model');
        $result = $this->Sppd_model->getAllSppd(); 
        header("Content-Type: application/json");
        echo json_encode($result);
    }
 
    public function addSppd(){
      $this->load->model('Sppd_model');
        $this->Sppd_model->save();
    }

     public function updateSppd(){
      $this->load->model('Sppd_model');
        $this->Sppd_model->updateSppd();
    }
    
    public function deleteSppd()
    {
        $this->load->model('Sppd_model');
        $id = $this->input->post('id'); 
        $this->Sppd_model->delete($id);
    }



}

/* End of file Home.php */

?>