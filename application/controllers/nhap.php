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
    public function get_sp()
    {
        $params = $this->input->post();
        $maloai = $params['maloai'];
        $data = $this->sp_model->get_list_sp($maloai);
        echo json_encode($data);
    }
    function add_hang()
    {
        $result = array(
            "success"=> false,
            "error_message"=> ""
        );
        if($this->input->post())
        {               
            $this->form_validation->set_rules('sp', 'san pham', 'required',array('required'=>'San pham khong duoc bo trong'));
            $this->form_validation->set_rules('soluong', 'so luong', 'required|numeric',array('required'=>'So luong khong duoc bo trong','numeric'=>'So luong khong phai la so'));
            $this->form_validation->set_rules('dongia', 'don gia', 'required',array('required'=>'Don gia khong duoc bo trong'));
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
                    $sl_cu = $this->input->post('soluongton');  
                    $sl_moi = $this->input->post('soluong');
                    $tong = $sl_cu + $sl_moi;
                    $masp =  $this->input->post('sp');       
                    $data_sl = array('soluongton'=> $tong);
                    $this->db->where('masp',$masp);
                    $this->db->update('sanpham',$data_sl);
                    $result["success"] = true;
                    $result["error_message"] = "Da edit thanh cong!";
                } 
                else
                    {
                        $result["success"] = false;
                        $result["error_message"] = "Da edit that bai!";
                    }              
            }
            echo json_encode($result);           
        }             
    }
}
?>