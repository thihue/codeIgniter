<?php
if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Hinh extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('hinh_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
       // $this->load->helper('form');     
    }
    function load_image(){
       $masp= $this->input->post('masp');
       $arr = array('masp'=>$masp);
       $data = $this->hinh_model->get_list_hinh($arr);
       echo json_encode($data);
    }
    function delete_image(){
        $result = array(
            "success"=> "",
            "error_message"=> "",
        );
        if($this->input->post()){
            $path = $this->input->post('anh');
            $mahinh = $this->input->post('mahinh');
            $this->db->where('mahinh',$mahinh);
            $delete = $this->db->delete('hinh');
            if($delete){
                $xoa_link = unlink('pp/'.$path);
                if($xoa_link){
                    $result["success"] = true;
                    $result["error_message"] = "Xóa hình ảnh thành công ";
                } else{
                    $result["success"] = false;
                    $result["error_message"] = "Chưa xóa file ảnh ";
                } 
            } else{
                $result["success"] = false;
                $result["error_message"] = "Xóa hình ảnh thất bại ";
            }
        } else{
            $result["success"] = false;
            $result["error_message"] = "Khong co ma hinh ";
        }
        echo json_encode($result);
    }
    function upload_image(){
        $result = array(
            "success"=> false,
            "error_message"=> "",
            "mahinh" =>"",
            "tenhinh"=>""
        );
        $config['upload_path'] = 'pp/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '30000';
        $filename = $_FILES['file']['name'];
        if(!empty($filename)){
            // $ran = ran();
            // $_FILES['file']['name'] = $_FILES['file']['name'].$ran;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')){
                $data1 = array('upload_data' => $this->upload->data());
                // $data["image"] = $uploadData['file'];
                //$image= $data['upload_data']['file_name']; 
                $data = array(
                    'anh' => $data1['upload_data']['file_name'], 
                    'masp'=>$this->input->post('masp'),
                );
                $insert = $this->db->insert('hinh',$data);
                // $sql = "SELECT MAX(mahinh) from hinh";
                // $mahinh = $this->db->get()->result_array();
                $insert_id = $this->db->insert_id();
                if($insert){
                    $result["success"] = true;
                    $result["error_message"] = "Upload hình ảnh thành công";
                    $result["mahinh"] = $insert_id;
                    $result["tenhinh"] = $data1['upload_data']['file_name'];
               
                } else{
                    $result["success"] = false;
                    $result["error_message"] =  "Chưa update hình vào cơ sở dữ liệu ";
                }
            }       
        } else{
            $result["success"] = false;
            $result["error_message"] = "Chọn ảnh để Upload";
        }
        echo json_encode($result);
    }
}
?>