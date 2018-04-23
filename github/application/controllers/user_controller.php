<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class User_controller extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');       
    }
    function check_dn()
    {    
        $tk = $this->input->post('text');
        $pass = $this->input->post('password');
        $where = array('username'=>$tk,'pass'=>$pass);
        if($this->user_model->check_exists($where))
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message(__FUNCTION__,'Dang nhap khong thanh cong');
            return false;
        }
    }
    function login()
    {
        $da['tit'] = 'Admin System';
        if($this->session->userdata('login'))
        {
            $this->data['name'] = $this->session->userdata('login');
            $this->load->view('main', $da);
            return;
        }
        else
            {
                $params = $this->input->post();
                if($this->input->post())
                {
                    $this->form_validation->set_rules('login','login','callback_check_dn');
                    if($this->form_validation->run())
                    {
                        $tk = $this->input->post('text');
                        $this->session->set_userdata('login', $tk);
                        $this->session->set_flashdata('flash_message', 'Đăng nhập thành công');
                        $this->load->view('main', $da);
                        return;
                    }
                }
            } 
        $this->load->view('login_view',$da);             
    }
    
    public function logout()
    {
        $da['tit'] = 'Admin System';
        if($this->session->userdata('login'))
        {
            $this->session->unset_userdata('login');
        }
        $this->session->set_flashdata('flash_message', 'Đăng xuất thành công');
        redirect('http://localhost/abc/user_controller/login');
        //$this->load->view('login_view',$da);
    }
    /*
    public function tai_form(){
        $this->load->library("pagination");
        $this->session->set_userdata("ten", "gia tri");     
        $this->session->userdata("ten");

        $b = $this->load->view('login_view','',true);
        echo $b;
        $this->load->model('user_model');
        $model = $this->user_model->user();
    }*/
}
?>