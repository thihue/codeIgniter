<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Hinh extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('sp_model');
        $this->load->model('hinh_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
       // $this->load->helper('form');     
    }
    function index(){            
    }
    function load_image(){
       $masp= $this->input->post('masp');
       $arr = array('masp'=>$masp);
       $data = $this->hinh_model->get_list_hinh($arr);
       echo json_encode($data);
    }
}
?>