<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Sp extends MY_Controller {
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
            $temp['subview'] = 'admin/sanpham'; //view cua action
            $in = array();
            $temp['list'] = $this->sp_model->get_list($submenuid=null);
            $temp['loai'] = $this->loai_model->get_list($in);
            $this->load->view("admin/index",$temp);
        }
        else
        redirect(base_url('login'));            
    }
    function editsp(){
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {
            $this->form_validation->set_rules('tensp', 'ten san pham', 'required',array('required'=>'Ten san pham khong duoc bo trong'));
            $this->form_validation->set_rules('dongia', 'don gia', 'required',array('required'=>'Don gia khong duoc bo trong','numeric'=>'Don gia phai la so'));
            $this->form_validation->set_rules('nhasx', 'nha san xuat', 'required',array('required'=>'Nha san xuat khong duoc bo trong'));
            $this->form_validation->set_rules('mota', 'mo ta', 'required',array('required'=>'Mo ta khong duoc bo trong'));
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == FALSE)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            } else{ 
                $masp= $this->input->post('masp');  
                $data = array(
                    'tensp'=> $this->input->post('tensp'),
                    'maloai'=> $this->input->post('loaisp'),
                    'dongia'=> $this->input->post('dongia'),
                    'mota'=> $this->input->post('mota'),
                    'nhasx'=> $this->input->post('nhasx')
                );
                $this->db->where('masp',$masp);
                $update = $this->db->update('sanpham',$data);
                if($update)
                {
                    $result["success"] = true;
                    $result["error_message"] = "sua thanh cong!";
                } else {
                    $result["success"] = false;
                    $result["error_message"] = "sua that bai!";
                }
            }
            echo json_encode($result);
        }
    }
    function deletesp(){
        $ma = $this->input->post('masp');
        $this->db->where('masp',$ma);
        $delete = $this->db->delete('sanpham');
        if($delete){
            $this->db->where('masp',$ma);
            $delete_hinh = $this->db->delete('hinh');
            if($delete_hinh){
                echo "<script>alert('Da xoa thanh cong!');</script>";
                redirect(base_url('sp'));
            }else{
                echo "<script>alert('Da xoa that bai!');</script>";
            }
        } else{
            echo "<script>alert('Da xoa that bai!');</script>";
        }    
    }
    function addsp(){
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {
            $this->form_validation->set_rules('tensp', 'ten san pham', 'required',array('required'=>'Ten san pham khong duoc bo trong'));
            $this->form_validation->set_rules('dongia', 'don gia', 'required',array('required'=>'Don gia khong duoc bo trong','numeric'=>'Don gia phai la so'));
            $this->form_validation->set_rules('nhasx', 'nha san xuat', 'required',array('required'=>'Tong tien khong duoc bo trong'));
            $this->form_validation->set_rules('mota', 'mo ta', 'required',array('required'=>'Ngay xuat khong duoc bo trong'));
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == FALSE)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            } else { 
                $data = array(
                    'maloai'=> $this->input->post('loaisp'),
                    'tensp'=> $this->input->post('tensp'),
                    'dongia'=> $this->input->post('dongia'),
                    'mota'=> $this->input->post('mota'),
                    'nhasx'=> $this->input->post('nhasx')
                );
                $insert = $this->db->insert('sanpham', $data); 
                if($insert)
                {
                    $result["success"] = true;
                    $result["error_message"] = "Them thanh cong!";
                } else {
                    $result["success"] = false;
                    $result["error_message"] = "Them that bai!";
                }
            }
            echo json_encode($result);
        }    
    }
}
?>