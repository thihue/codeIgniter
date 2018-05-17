<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Xuat extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('xuat_model');
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
            $temp['subview'] = 'admin/xuathang'; //view cua action
            $in = array();
            $temp['list'] = $this->xuat_model->get_list($in);
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
    function add_xuat_hang(){
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
            $this->form_validation->set_rules('ngayxuat', 'ngay xuat', 'required',array('required'=>'Ngay xuat khong duoc bo trong'));
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
                    'ngayxuat'=> $this->input->post('ngayxuat'),
                );
                $insert = $this->db->insert('xuat', $data);
                $hieu = 0;
                if($insert)
                {
                    $sl_cu = inval($this->input->post('soluongton'));  
                    $sl_moi = inval($this->input->post('soluong'));
                    $hieu = $sl_cu - $sl_moi;
                    $masp =  $this->input->post('sp');       
                    $data_sl = array('soluongton'=> $hieu);
                    $this->db->where('masp',$masp);
                    $update = $this->db->update('sanpham',$data_sl);
                    if($update){
                        $result["success"] = true;
                        $result["error_message"] = "Da xuat thanh cong!";
                    }else{
                        $result["success"] = false;
                        $result["error_message"] = "Chua cap nhat so luong ton cua hang vua xuat";
                    } 
                }else{
                    $result["success"] = false;
                    $result["error_message"] = "xuat that bai!";
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
    function edit_xuat(){
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {
            $this->form_validation->set_rules('soluongmoi', 'so luong moi', 'numeric',array('required'=>'So luong khong duoc bo trong','numeric'=>'So luong phai la so'));
            $this->form_validation->set_rules('dongia', 'don gia', 'required|numeric',array('required'=>'Don gia khong duoc bo trong','numeric'=>'Don gia phai la so'));
            $this->form_validation->set_rules('tongtien', 'tong tien', 'required',array('required'=>'Tong tien khong duoc bo trong'));
            $this->form_validation->set_rules('ngayxuat', 'ngay xuat', 'required',array('required'=>'Ngay xuat khong duoc bo trong'));
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == FALSE)
            {
                $result["success"] = false;
                $result["error_message"] = validation_errors();
            } else{
                // masp: $('#masp').val(),
				// soluong: $('#soluong').val(),
				// soluongton: $('#slcu').val(),
				// soluongmoi: $('#soluongmoi').val(),
				// dongia: $('#dongia').val(),
				// tongtien: $('#tongtien').val(),
                // ngaynhap: $('#ngaynhap').val()
                
                
                $masp = $this->input->post('masp');
                $soluong = intval($this->input->post('soluong'));
                $soluongton = intval($this->input->post('soluongton'));
                $soluongmoi = intval($this->input->post('soluongmoi'));
                $soluongton_update = 0;
                if($soluongmoi == 0)
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
                $data = array(
                    'soluong'     => $soluongmoi,
                    'dongia'    => $this->input->post('dongia'),
                    'tongtien'   => $this->input->post('tongtien'),
                    'ngayxuat'=> $this->input->post('ngayxuat'),
                );
                $this->db->where('masp',$masp);
                $update_xuat = $this->db->update('xuat',$data);
                if($update_xuat){
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
    function delete_xuat(){
        $id = $this->input->post('id');      
        $this->db->where('id',$id);
        $this->db->delete('xuat');
        echo"<script>alert('Da xoa thanh cong!');</script>";
        $this->index();      
    }
}
?>