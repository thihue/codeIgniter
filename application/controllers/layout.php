<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Layout extends MY_Controller{
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
    function edit()
    {
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {               
            $this->form_validation->set_rules('username', 'User', 'required',
                array('required'=>'Username khong duoc bo trong'));
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim',
                array('required'=>'Email khong duoc bo trong',
                'valid_email'=>'Email khong dung dinh dang',
                'trim'=>'Email khong chua khoang trang'));
            $this->form_validation->set_rules('diachi', 'Dia Chi', 'required');
            $this->form_validation->set_rules('dienthoai', 'Dien thoai', 'required');
            $this->form_validation->set_rules('edit', 'Chinh sua user','callback_edituser');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == FALSE)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            } else {
                $id= $this->input->post('id');
                $data = array(
                    'username'=> $this->input->post('username'),
                    'email'=> $this->input->post('email'),
                    'diachi'=> $this->input->post('diachi'),
                    'dienthoai'=> $this->input->post('dienthoai'),
                    'id_group'=> $this->input->post('idgroup')
                );
                $this->db->where('idUser',$id);
                $update = $this->db->update('user',$data);
                if($update){
                    $result["success"] = true;
                    $result["error_message"] = "Da edit thanh cong!";
                } else {
                    $result["success"] = false;
                    $result["error_message"] = "Da edit that bai!";
                }
            }
            echo json_encode($result);           
        }             
    }
    function edituser(){        
        $id= $this->input->post('id');
        $tk = $this->input->post('username');
        $em = $this->input->post('email');
        $where = array('id'=>$id,'email'=>$em,'username'=>$tk);
        if($this->user_model->check_exists($where))
        {   
            $this->form_validation->set_message('edituser', 'Username hoac email da ton tai');      
            return false;
        } else {
            return true;
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
            echo"<script>alert('Da xoa thanh cong!');</script>";
            $this->index();            
    }
}