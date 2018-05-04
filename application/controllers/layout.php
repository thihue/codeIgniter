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
    
        $data = array(
            'username'=> $this->input->post('username')
         );
         $this->db->where('id',$id);
         $this->db->update('user',$data);
         $this->index(); 

    }
    function deleteuser(){

    }
}