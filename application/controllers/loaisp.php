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
        $this->load->helper('array');
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
    function editloai()
    {
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {               
            $this->form_validation->set_rules('tenloai', 'tenloai', 'required',
                array('required'=>'Ten loai khong duoc bo trong'));
            $this->form_validation->set_rules('edit', 'Chinh sua loaisp','callback_check_edit');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == FALSE)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            }
            else 
            {
                $result["success"] = true;
                $result["error_message"] = "Da edit thanh cong!";
            }
            echo json_encode($result);           
        }             
    }
    function check_edit(){
        $id= $this->input->post('ma_hidden');
        $tenloai = $this->input->post('tenloai');
        $where = array('tenloai'=>$tenloai,'id'=>$id);
        if($this->loai_model->check_exists($where))
        {   
            $this->form_validation->set_message('check_edit', 'Loai san pham da ton tai');      
            return false;
        }
        else
            {
                $id= $this->input->post('ma_hidden');  
                $data = array('tenloai'=> $this->input->post('tenloai'));
                $this->db->where('maloai',$id);
                $this->db->update('loaisanpham',$data);
                return true;
            }      
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