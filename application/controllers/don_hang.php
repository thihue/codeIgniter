<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Don_hang extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('donhang_model');
        $this->load->model('donhang_ct_model');
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
            $temp['subview'] = 'admin/donhang'; //view cua action
            $in = array();
            $temp['new'] = $this->donhang_model->get_list_new($in);
            $temp['nhan'] = $this->donhang_model->get_list_nhan($in);
            $this->load->view("admin/index",$temp);
        }
        else
        redirect(base_url('login'));            
    }
    function duyet(){
        if($this->input->post())
        {
            $id = $this->input->post('id');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date("Y:m:d H:i:s");
            $arr = array('TimeNhanHang'=> $time,'TinhTrang'=>'1');
            $this->db->where('idDH',$id);
            $this->db->update('hoadon',$arr);
            $this->session->set_flashdata("message", "Duyet don hang thanh cong!");
            redirect(base_url('don_hang'));
        } else{
            $this->session->set_flashdata("false", "Khong the duyet don!");
            redirect(base_url('don_hang'));
        }
    }
    function edit_don_hang(){
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {
            $this->form_validation->set_rules('tennguoinhan', 'ten nguoi nhan', 'required',array('required'=>'Ten nguoi nhan khong duoc bo trong'));
            $this->form_validation->set_rules('sdt', 'sdt', 'required|numeric',array('required'=>'So dien thoai khong duoc bo trong','numeric'=>'Dien thoai phai la so'));
            $this->form_validation->set_rules('diachigiao', 'dia chi giao', 'required',array('required'=>'Dia chi giao khong duoc bo trong'));
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == FALSE)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            } else{ 
                $id= $this->input->post('id');  
                $data = array(
                    'tennguoinhan'=> $this->input->post('tennguoinhan'),
                    'sdtnguoinhan'=> $this->input->post('sdt'),
                    'DiaChiGiaoHang'=> $this->input->post('diachigiao')
                );
                $this->db->where('idDH',$id);
                $update = $this->db->update('hoadon',$data);
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
    function delete_don_hang(){
        if($this->input->post())
        {
            $id = $this->input->post('id');
            $this->db->where('idDH',$id);
            $delete_cthd = $this->db->delete('chitiethoadon');
            if($delete_cthd){
                $this->db->where('idDH',$id);
                $delete = $this->db->delete('hoadon');
                if($delete){
                    $this->session->set_flashdata("xoa", "Xoa don hang thanh cong!");
                    redirect(base_url('don_hang'));
                } else{
                    $this->session->set_flashdata("false", "Chua xoa chi tiet don hang!");
                    redirect(base_url('don_hang'));
                }
            } else{
                $this->session->set_flashdata("false", "Xoa don hang that bai!");
                redirect(base_url('don_hang'));
            } 
        } else{
            $this->session->set_flashdata("false", "Xoa don hang that bai!");
            redirect(base_url('don_hang'));
        }
    }
    function huy_duyet(){
        if($this->input->post())
        {
            $id = $this->input->post('id');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = "";
            $arr = array('TimeNhanHang'=> $time,'TinhTrang'=>'0');
            $this->db->where('idDH',$id);
            $this->db->update('hoadon',$arr);
            $this->session->set_flashdata("message", "Da huy duyet don hang!");
            redirect(base_url('don_hang'));
        } else{
            $this->session->set_flashdata("false", "Khong the huy duyet don!");
            redirect(base_url('don_hang'));
        }   
    }
    function chitiet(){
        if($this->input->post()){
            $id = $this->input->post('id');
            $arr = array('idDH'=>$id);
            $data = $this->donhang_ct_model->get_list($arr);
            echo json_encode($data);
        } else{
            $this->session->set_flashdata("false", "Khong the hien thi chi tiet don!");
            redirect(base_url('don_hang'));
        }
    }
}
?>