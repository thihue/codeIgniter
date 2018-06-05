<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('donhang_ct_model');
        $this->load->model('sp_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('array');
        //$this->load->library(array('form_validation', 'email'));
    }
    function index(){
        $this->data['tit']="b.store";
        $this->data['logout'] = base_url('login/logout');
        $this->data['content'] = 'trangchu/main';
        $this->data['sanphambanchay']=$this->donhang_ct_model->sp_banchay();
        $this->data['sanphammoi']=$this->sp_model->sp_moi();
        $this->load->view("trangchu/master_page",$this->data);   
    }
}