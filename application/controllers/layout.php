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
            $temp['logout'] = base_url('login/logout');
            $temp['ooo']= base_url('sp/loadview');
            $temp['subview'] = 'admin/content'; //view cua action
            $in = array();
            $temp['list'] = $this->user_model->get_list($in);
            $this->load->view("admin/index",$temp);
        }
        else
        $this->load->view('login_view',$temp);        
    }
    function edituser(){
        $id= $this->input->post('id');
        $tk = $this->input->post('username');
        $em = $this->input->post('email');
        $where1 = array('email'=>$em);
        $where2 = array('username'=>$tk);
        if($this->user_model->check_exists($where1))
            {
                echo"<script>alert('Email da ton tai!');</script>";
            }           
        if($this->user_model->check_exists($where2))
        {
            echo"<script>alert('Username da duoc su dung!');</script>";
        }
        else
            {
                $data = array(
                    'username'=> $this->input->post('username'),
                    'email'=> $this->input->post('email'),
                    'diachi'=> $this->input->post('diachi'),
                    'dienthoai'=> $this->input->post('dienthoai'),
                    'id_group'=> $this->input->post('idgroup')
                );
                $this->db->where('idUser',$id);
                $this->db->update('user',$data);
                $this->index();
            }          
    }
    function deleteuser(){
        $id = $this->input->post('id');
        $user = $this->input->post('user');
        $s = $this->session->userdata('login');
        // echo "$user va $s...";
        // exit();
        $this->db->where('idUser',$id);
        if($s == $user)
        {
            $this->db->delete('user');
            $this->session->unset_userdata('login');
            redirect(base_url('login'));
        }       
            $this->db->delete('user');
            $this->index();            
    }
}