<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Nhap extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('nhap_model');
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
            $temp['ooo']= base_url('sp/loadview');
            $temp['subview'] = 'admin/nhaphang'; //view cua action
            $in = array();
            $temp['list'] = $this->nhap_model->get_list($in);
            $temp['sp'] = $this->sp_model->get_list($in);
            $temp['loaisp'] = $this->loai_model->get_list($in);
            $this->load->view("admin/index",$temp);
        }
        else
        $this->load->view('login_view',$temp);        
    }
    public function get_sp(){
        //$params = $this->input->post();
        //$where = $params['maloai'];
        $ma = $this->input->post('maloai');
        $where= array('maloai'=>$ma);
        $data = $this->sp_model->get_list_sp($where);
        echo json_encode($data);
    }
    function add_hang(){
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {               
            $this->form_validation->set_rules('sp', 'san pham', 'required',array('required'=>'San pham khong duoc bo trong'));
            $this->form_validation->set_rules('soluong', 'so luong', 'required|numeric',array('required'=>'So luong khong duoc bo trong','numeric'=>'So luong khong phai la so'));
            $this->form_validation->set_rules('dongia', 'don gia', 'required',array('required'=>'Don gia khong duoc bo trong','numeric'=>'Don gia phai la so'));
            $this->form_validation->set_rules('tongtien', 'tong tien', 'required',array('required'=>'Tong tien khong duoc bo trong'));
            $this->form_validation->set_rules('ngaynhap', 'ngay nhap', 'required',array('required'=>'Ngay nhap khong duoc bo trong'));
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == FALSE)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            }
            else 
            {
                $data = array(
                    'masp' => $this->input->post('sp'),
                    'soluong'     => $this->input->post('soluong'),
                    'dongia'    => $this->input->post('dongia'),
                    'tongtien'   => $this->input->post('tongtien'),
                    'ngaynhap'=> $this->input->post('ngaynhap'),
                );
                $insert = $this->db->insert('nhap', $data);
                $tong = 0;
                if($insert)
                {
                    $sl_cu = intval($this->input->post('soluongton'));  
                    $sl_moi = intval($this->input->post('soluong'));
                    $tong = $sl_cu + $sl_moi;
                    $masp =  $this->input->post('sp');       
                    $data_sl = array('soluongton'=> $tong);
                    $this->db->where('masp',$masp);
                    $update = $this->db->update('sanpham',$data_sl);
                    if($update){
                        $result["success"] = true;
                        $result["error_message"] = "Da nhap thanh cong!";
                    }else{
                        $result["success"] = false;
                        $result["error_message"] = "Chua cap nhat so luong ton cua hang vua nhap";
                    } 
                }else{
                    $result["success"] = false;
                    $result["error_message"] = "Nhap that bai!";
                }                         
            }
            echo json_encode($result);           
        }             
    }
    public function get_soluong_sp(){
        $masp = $this->input->post('masp');
        $where= array('masp'=>$masp);
        $data = $this->sp_model->get_list_sp($where);
        echo json_encode($data[0]);
    }
    function edit_nhap(){
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {
            $this->form_validation->set_rules('soluongmoi', 'so luong moi', 'numeric',array('required'=>'So luong khong duoc bo trong','numeric'=>'So luong phai la so'));
            $this->form_validation->set_rules('dongia', 'don gia', 'required|numeric',array('required'=>'Don gia khong duoc bo trong','numeric'=>'Don gia phai la so'));
            $this->form_validation->set_rules('tongtien', 'tong tien', 'required',array('required'=>'Tong tien khong duoc bo trong'));
            $this->form_validation->set_rules('ngaynhap', 'ngay nhap', 'required',array('required'=>'Ngay nhap khong duoc bo trong'));
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == FALSE)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            } else{
                $soluong = $this->input->post('soluong');
                $soluongton = $this->input->post('soluongton');
                $soluongmoi = $this->input->post('soluongmoi');
                $soluongton_update = 0;
                if($soluongmoi == "")
                {
                    $soluongmoi = $soluong;
                } else{                    
                    $a = 0;
                    if($soluongmoi >= $soluong){
                        $a = $soluongmoi - $soluong;
                        $soluongton_update = $soluongton + $a;
                    } else {
                        $a = $soluong - $soluongmoi;
                        $soluongton_update = $soluongton - $a;
                    }
                }
                $id = $this->input->post('id');
                $data = array(
                    'soluong'     => $soluongmoi,
                    'dongia'    => $this->input->post('dongia'),
                    'tongtien'   => $this->input->post('tongtien'),
                    'ngaynhap'=> $this->input->post('ngaynhap'),
                );
                $this->db->where('id',$id);
                $update_nhap = $this->db->update('nhap',$data);
                if($update_nhap){
                    $masp = $this->input->post('masp');
                    $mang = array('soluongton'=>$soluongton_update);
                    $this->db->where('masp',$masp);
                    $update_slton = $this->db->update('sanpham',$mang);
                    if($update_slton){
                        $result["success"] = true;
                        $result["error_message"] = "sua doi thanh cong!";
                    } else{
                        $result["success"] = false;
                        $result["error_message"] = "Sua doi thanh cong. Chua cap nhat so luong ton cua san pham!";
                    }
                } else {
                    $result["success"] = false;
                    $result["error_message"] = "Sua doi khong thanh cong";

                }
            }
            echo json_encode($result);
        }
    }
    function delete_nhap(){
        $id = $this->input->post('id');      
        $this->db->where('id',$id);
        $this->db->delete('nhap');
        echo"<script>alert('Da xoa thanh cong!');</script>";
        redirect(base_url('nhap'));     
    }
}
?>