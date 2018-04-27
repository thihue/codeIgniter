<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class User extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');     
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
    function index(){
        $this->login();
    }
    function login()
    {
        $this->form_validation->set_rules('text', 'user', 'required');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required');
        $this->form_validation->set_rules('login', 'Đăng nhập', 'callback_check_dn');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $da['tit'] = 'Admin System';
        if($this->session->userdata('login'))
        {
            $this->data['name'] = $this->session->userdata('login');
            $this->load->view('main', $da);
            return;
        }
        else
            {
                if($this->input->post())
                {                   
                    $this->form_validation->set_rules('login','Dang nhap','callback_check_dn');
                    if($this->form_validation->run())
                    {
                        $tk = $this->input->post('text');
                        // $mk = $this->input->post('password');
                        // $where = array('user' => $taik, 'password' => $mk);
                        // $tk = $this->user_model->get_user_info($where);

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
        //redirect('/user/login');
        $this->load->view('login_view',$da);
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