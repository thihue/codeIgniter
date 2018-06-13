<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Danhsach_sp extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
         $this->load->model('sp_model');
         $this->load->model('loai_model');
         $this->load->model('mucsanpham_model');
         $this->load->model('donhang_ct_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('array');
        //$this->load->library(array('form_validation', 'email'));
    }
    function index($sort){
        $this->data['tit']="b.store";
        $this->data['logout'] = base_url('login/logout');
        $this->data['content'] = 'trangchu/danhsachsp';
        $this->data['all'] = 'Tất cả sản phẩm';  
        $this->data['sanpham'] = $this->sp_model->get_list($menuid=null,$submenuid=null,$sort);
        $this->data['select']=$sort;
        $this->load->view("trangchu/master_page",$this->data);   
    }
    function all($sort="5"){
        if($this->input->post()){
            $sort = $this->input->post('sort');
        }
        $this->index($sort);
    }
    function sanpham($menuid="", $submenuid="",$sort="5"){
        if($this->input->post()){
            $sort = $this->input->post('sort');
        }
        $this->data['select']=$sort;
        $this->data['tit']="b.store";
        $this->data['logout'] = base_url('login/logout');
        $this->data['content'] = 'trangchu/danhsachsp';
        $this->data['tenmuc'] = $this->mucsanpham_model->load_menu($menuid);
        $this->data['tenloai'] = $this->loai_model->get_name($menuid,$submenuid)[0];
        $this->data['sanpham'] = $this->sp_model->get_list($menuid,$submenuid,$sort);
        $this->load->view("trangchu/master_page",$this->data);
    }
    function deal($sort="5"){
        if($this->input->post()){
            $sort = $this->input->post('sort');
        }
        $this->data['select']=$sort;
        $this->data['tit']="b.store";
        $this->data['logout'] = base_url('login/logout');
        $this->data['content'] = 'trangchu/danhsachsp';
        $this->data['all'] = 'Deal';
        $this->data['sanpham'] = $this->sp_model->sp_giamgia($sort);
        $this->load->view("trangchu/master_page",$this->data);
    }
    function banchay($sort="5"){
        if($this->input->post()){
            $sort = $this->input->post('sort');
        }
        $this->data['select']=$sort;
        $this->data['tit']="b.store";
        $this->data['logout'] = base_url('login/logout');
        $this->data['content'] = 'trangchu/danhsachsp';
        $this->data['all'] = 'Bán chạy';
        $this->data['sanpham'] = $this->donhang_ct_model->sp_banchay($sort);
        $this->load->view("trangchu/master_page",$this->data);
    }
}