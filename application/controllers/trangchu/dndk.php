
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dndk extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('array');
        //$this->load->library(array('form_validation', 'email'));
    }
    function index(){
        $this->data['tit']="b.store";
        $this->data['logout'] = base_url('login/logout');
        $this->data['content'] = 'trangchu/dangnhapdky';
        $this->load->view("trangchu/master_page",$this->data);
    }
}