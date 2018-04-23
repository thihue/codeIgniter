<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Logout_controller extends MY_Controller {
    function __construct(){
        parent::__construct();

        
        // $this->load->view('login_view');
        $this->load->library("session");
        $this->load->library('form_validation');
    }   
    function load(){

        $this->load->model('logout_model');
        $this->load->view('logout');
    }
    
}
?>