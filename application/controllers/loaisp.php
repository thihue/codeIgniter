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
    }
    function index(){
        $temp['tit']="Admin";
        if($this->session->userdata('login'))
        {   
            $temp['dau']="Trang Admin";
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
                array('required'=>'Tên loại không được bỏ trống'));
            $this->form_validation->set_rules('edit', 'Chinh sua loaisp','callback_check_edit');
            // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == FALSE)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            }
            else 
            {
                $ma= $this->input->post('ma1'); 
                $data = array('tenloai'=> $this->input->post('tenloai'),);
                $this->db->where('maloai',$ma);
                $update = $this->db->update('loaisanpham',$data);
                if($update)
                {
                    $result["success"] = true;
                    $result["error_message"] = "Chỉnh sửa thành công!";
                } else {
                    $result["success"] = false;
                    $result["error_message"] = "Chỉnh sửa thất bại!";
                }
            }
            echo json_encode($result);           
        }             
    }
    function check_edit(){
        $ma= $this->input->post('ma1');
        $tenloai = $this->input->post('tenloai');
        $where = array('tenloai'=>$tenloai,'maloai'=>$ma);
        if($this->loai_model->check_exists_edit($where))
        {   
            $this->form_validation->set_message('check_edit', 'Loại sản phẩm đã tồn tại');      
            return false;
        }
        else
            {
                return true;
            }      
    }
    function deleteloai(){
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        $ma = $this->input->post('ma');
        $a = array('maloai'=>$ma);
        if($this->sp_model->check_exists($a)){
            $result["success"] = false;
            $result["error_message"] = "Không được phép xóa, Có sản phẩm còn tồn tại trong loại!";
        }else{
            $this->db->where('maloai',$ma);
            $delete = $this->db->delete('loaisanpham');
            if($delete){
                $result["success"] = true;
                $result["error_message"] = "Xóa thành công!";
            }else{
                $result["success"] = false;
                $result["error_message"] = "Xóa thất bại!";
            }          
        }
        echo json_encode($result);       
    }
    function addloai(){
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {
            $this->form_validation->set_rules('tenloai','ten loai','required',array('required'=>'Tên loại không được bỏ trống'));
            $this->form_validation->set_rules('ma','ma loai','required',array('required'=>'Mã loại không được bỏ trống'));
            $this->form_validation->set_rules('maloai','maloai','callback_check_add');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == false)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            }
            else
            {
                $data = array(
                    'maloai'     => $this->input->post('ma'),
                    'tenloai'     => $this->input->post('tenloai'),
                );
                $insert = $this->db->insert('loaisanpham', $data); 
                if($insert){
                    $result["success"] = true;
                    $result["error_message"] = "Đã thêm thành công!";
                }else{
                    $result["success"] = false;
                    $result["error_message"] = "Thêm thất bại";
                }     
            }
            echo json_encode($result);
        }     
    }
    function check_add(){
        $ma = $this->input->post('ma');
        $tenloai = $this->input->post('tenloai');
        $arr = array('maloai'=>$ma,'tenloai'=>$tenloai);
        if($this->loai_model->check_exists_add($arr))
        {
            $this->form_validation->set_message('check_add', 'Mã loại đã tồn tại'); 
            return false;
        } else{
            return true;
        }
    }
}
?>