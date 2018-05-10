<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Dangki extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
       // $this->load->helper('form');     
    }
    function check_dk(){
        $tk = $this->input->post('username');
        $em = $this->input->post('email');
        $pass = $this->input->post('pass');
        $pass1 = $this->input->post('pass1');
        
        $where1 = array('email'=>$em);
        $where2 = array('username'=>$tk);
        if($this->user_model->check_exists($where1))
        {
            $this->form_validation->set_message(__FUNCTION__,'Email da duoc su dung');
            return false;
        }
        if($this->user_model->check_exists($where2))
        {
            $this->form_validation->set_message(__FUNCTION__,'Username da duoc su dung');
            return false;
        }
        else{
            if($pass == $pass1)
            {
                $p = sha1($pass);
                $data = array(
                    'username'     => $this->input->post('username'),
                    'pass'     => $p,
                    'email' => $this->input->post('email'),
                    'diachi' => $this->input->post('diachi'),
                    'dienthoai' => $this->input->post('dienthoai'),
                );
                $this->db->insert('user', $data); 
                // $a = $this->session->set_userdata('login', $tk);
                // echo $a;               
                return true;
            }
            else
            {
                $this->form_validation->set_message(__FUNCTION__,'Dang ki khong thanh cong');
                return false;
            }
        }     
    }
    function index(){
        $temp['tit']="Admin";
        $this->form_validation->set_rules('username', 'user', 'required');
        $this->form_validation->set_rules('pass', 'Mật khẩu', 'required');
        $this->form_validation->set_rules('pass1', 'Re Mật khẩu', 'required');
        $this->form_validation->set_rules('dangki', 'Dang ki', 'callback_check_dk');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $da['tit'] = 'Admin System';
        if($this->session->userdata('login'))
        {
            $this->data['name'] = $this->session->userdata('login');           
            redirect('layout/index');
            // $this->load->view('main', $da);
            return;
        }
        else
            {
                if($this->input->post())
                {                   
                    $this->form_validation->set_rules('dangki','Dang ki','callback_check_dk');
                    if($this->form_validation->run())
                    {
                        $tk = $this->input->post('username');
                        $this->session->set_userdata('login', $tk);
                        $this->session->set_flashdata('flash_message', 'Đăng nhập thành công');
                        
                        redirect(base_url('layout'));
                        return;
                    }
                }
            } 
        $this->load->view('signup',$da);           
    }
}
?>