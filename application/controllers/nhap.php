<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Nhap extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('nhap_model');
        $this->load->model('loai_model');
        $this->load->model('sp_model');
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
            $temp['ooo']= base_url('sp/loadview');
            $temp['subview'] = 'admin/nhaphang'; //view cua action
            $in = array();
            $temp['list'] = $this->nhap_model->get_list($in);
            $temp['loai'] = $this->loai_model->get_list($in);
            $temp['sp'] = $this->sp_model->get_list($in);
            $this->load->view("admin/index",$temp);
        }
        else
        $this->load->view('login_view',$temp);        
    }
    function nhap(){
        
    }
    function chonsp(){
        $maloai= $this->input->post('loai');
        $where = array('maloai'=>$maloai);
        $qr= $this->sp_model->chonsp($where);
        return $qr;
    }
}
?>