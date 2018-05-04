<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Sp extends MY_Controller {
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
            $temp['b']['info']="Welcome to CI Layout - QHOnline.Info";
            $temp['logout'] = base_url('login/logout');
            $temp['subview'] = 'admin/sanpham'; //view cua action
            $in = array();
            $temp['list'] = $this->user_model->get_list($in);
            $this->load->view("admin/index",$temp);
        }
        else
        $this->load->view('login_view',$temp);
            
    }
}
?>