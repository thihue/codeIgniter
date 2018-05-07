<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Timkiem extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
       // $this->load->helper('form');     
    }
    function index(){
        $temp['tit']="Admin";
        if($this->session->userdata('login'))
        {   
            $temp['dau']="Trang Admin";
            $temp['template']='layout';
            $temp['logout'] = base_url('login/logout');
            $temp['subview'] = 'admin/ggsearch'; //view cua action
            $this->load->view("admin/index",$temp);
        }
        else
        redirect(base_url('login'));
            
    }
}
?>