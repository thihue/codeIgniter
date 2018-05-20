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
            $temp['list'] = $this->sp_model->get_list($in);
            $temp['loai'] = $this->loai_model->get_list($in);
            $this->load->view("admin/index",$temp);
        }
        else
        redirect(base_url('login'));            
    }
    function editsp(){
        $id= $this->input->post('ma');  
        $data = array(
            'tensp'=> $this->input->post('tensp'),
            'dongia'=> $this->input->post('dongia'),
            'mota'=> $this->input->post('mota'),
            'nhasx'=> $this->input->post('nhasx')
         );
         $this->db->where('masp',$id);
         $this->db->update('sanpham',$data);
         $this->index();
    }
    function deletesp(){
        $ma = $this->input->post('ma');
        $a = array('masp'=>$ma);
        if($this->sp_model->check_exists($a)){
            echo"<script>alert('Khong duoc phep xoa!');</script>";
            $this->index();
        }else{
            $this->db->where('masp',$ma);
            $this->db->delete('sanpham');
            echo"<script>alert('Da xoa thanh cong!');</script>";
            $this->index();
        }          
    }
    function addsp(){
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {               
            $this->form_validation->set_rules('loai', 'loai san pham', 'required',array('required'=>'Loai san pham khong duoc bo trong'));
            $this->form_validation->set_rules('tensp', 'ten san pham', 'required|numeric',array('required'=>'Ten san pham khong duoc bo trong','numeric'=>'So luong khong phai la so'));
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
                $this->db->insert('sanpham', $data); 
                $insert = $this->index();
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