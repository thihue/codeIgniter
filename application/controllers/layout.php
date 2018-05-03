<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Layout extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
    function index(){
        $temp['tit']="Admin";
        if($this->session->userdata('login'))
        {   
            $temp['dau']="Trang Admin";
            $temp['template']='layout';
            $temp['b']['info']="Welcome to CI Layout - QHOnline.Info";
            $temp['logout'] = base_url('login/logout');
            
            $temp['subview'] = 'admin/content'; //view cua action
            $in = array();
            $temp['list'] = $this->user_model->get_list($in);
            $this->load->view("admin/index",$temp);
        }
        else
        $this->load->view('login_view',$temp);
            
    }

    
    function danhsach(){
        $in = array();
        $temp['list'] = $this->user_model->get_list($in);
                
    }
}