<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Loaisp extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('loai_model');
        $this->load->model('sp_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
       // $this->load->helper('form');     
    }
    function index(){
        $temp['tit']="Admin";
        if($this->session->userdata('login'))
        {   
            $temp['dau']="Trang Admin";
            $temp['template']='layout';
            $temp['logout'] = base_url('login/logout');
            $temp['subview'] = 'admin/loaisanpham'; //view cua action
            $in = array();
            $temp['list'] = $this->loai_model->get_list($in);
            $this->load->view("admin/index",$temp);
        }
        else
        redirect(base_url('login'));            
    }
    function editloai(){
        $id= $this->input->post('ma');  
        $data = array(
            'tenloai'=> $this->input->post('tenloai')
         );
         $this->db->where('maloai',$id);
         $this->db->update('loaisanpham',$data);
         $this->index();
    }
    function deleteloai(){
        $ma = $this->input->post('ma');
        $a = array('maloai'=>$ma);
        if($this->sp_model->check_exists($a)){
            echo"<script>alert('Khong duoc phep xoa!');</script>";
            $this->index();
        }else{
            $this->db->where('maloai',$ma);
            $this->db->delete('loaisanpham');
            echo"<script>alert('Da xoa thanh cong!');</script>";
            $this->index();
        }          
    }
    function addloai(){
        $ma = $this->input->post('ma');
        $arr = array('maloai'=>$ma);
        if($this->loai_model->check_exists($arr))
        {
            echo"<script>alert('Ma loai da ton tai!');</script>";
            $this->index();
        }
        else{
            $data = array(
                'maloai'     => $this->input->post('ma'),
                'tenloai'     => $this->input->post('tenloai'),
            );
            $this->db->insert('loaisanpham', $data); 
            $this->index();
        }
        
    }
}
?>