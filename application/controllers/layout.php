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
    function edit()
    {
        
        if($this->input->post())
        {               
            $this->form_validation->set_rules('username', 'User', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('diachi', 'Dia Chi', 'required');
            $this->form_validation->set_rules('dienthoai', 'Dien thoai', 'required');
            $this->form_validation->set_rules('edituser', 'Chinh sua user', 'callback_edituser');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run())
            {
                
            }
        } 
        $this->index();           
    }
    function edituser(){        
        $id= $this->input->post('id');
        $tk = $this->input->post('username');
        $em = $this->input->post('email');
        $where = array('id'=>$id,'email'=>$em,'username'=>$tk);
        if($this->user_model->check_exists($where))
        {
            $this->form_validation->set_message(__FUNCTION__,'Username hoac email da ton tai');
            return false;
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
            $this->index();            
    }
}