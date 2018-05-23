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
        $this->load->library('upload');
       // $this->load->helper('form');     
    }
    function index(){            
    }
    function load_image(){
       $masp= $this->input->post('masp');
       $arr = array('masp'=>$masp);
       $data = $this->hinh_model->get_list_hinh($arr);
       echo json_encode($data);
    }
    function delete_image(){
        $result["success"] = false;
        if($this->input->post()){
            $mahinh = $this->input->post('mahinh');
            $this->db->where('mahinh',$mahinh);
            $delete = $this->db->delete('hinh');
            if($delete){
                $result["success"] = true;
            } else{
                $result["success"] = false;
            }
        } else{
            $result["success"] = false;
        }
        echo json_encode($result);
    }
    function upload_image(){
        $config['upload_path'] = 'pp/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024';
        if(isset($_FILES['file']['name'])){
            if(0 < $_FILES['file']['error']){
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else{
                    if(file_exists('pp/' . $_FILES['file']['name'])){
                        echo 'File already exists : pp/' . $_FILES['file']['name'];
                    }else
                        { 
                            $this->load->library('upload', $config);
                            if (!$this->upload->do_upload('file')){
                                $data["image"] = '';
                                echo $this->upload->display_errors();
                            } else{
                                echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
                                // $uploadData = $this->upload->data();
                                // $data["image"] = $uploadData['file'];
                                //$this->db->insert("students", $data);
                                $data = array('upload_data' => $this->upload->data());
                                $mahinh= $this->input->post('mahinh');
                                $image= $data['upload_data']['file_name']; 
                                 
                                $result= $this->upload_model->save_upload($mahinh,$image);
                            }
                        }
                }
        } else{
            $data["image"] = '';
            echo 'Please choose a file';
        }
    }
}
?>