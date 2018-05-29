<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        // $this->load->model('main_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('array');
        //$this->load->library(array('form_validation', 'email'));
    }
    function index(){
        $temp['tit']="Admin";
            $temp['logout'] = base_url('login/logout');
            $temp['content'] = 'trangchu/main'; //view cua action
            $this->load->view("trangchu/master_page",$temp);   
    }
}