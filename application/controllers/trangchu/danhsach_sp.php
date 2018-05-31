<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Danhsach_sp extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
         $this->load->model('top_model');
         $this->load->model('loai_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('array');
        //$this->load->library(array('form_validation', 'email'));
    }
    function index(){
        
        $this->data['tit']="b.store";
        $this->data['logout'] = base_url('login/logout');
        $this->data['content'] = 'trangchu/danhsachsp';
        $this->load->view("trangchu/master_page",$this->data);   
    }
    function sanpham($menuid="", $submenuid=""){
        $this->data['tit']="b.store";
        $this->data['logout'] = base_url('login/logout');
        $this->data['content'] = 'trangchu/danhsachsp';
        $this->load->view("trangchu/master_page",$this->data);   
    }


}