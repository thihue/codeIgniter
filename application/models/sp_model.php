<?php
class Sp_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'sanpham';

    public function get_list($menuid=null,$submenuid=null,$sort=null){
        //bang san pham, trang chu san pham theo loai,tat ca san pham
        $this->db->select('masp, tensp, soluongton, hinh,mota,giamgia, nhasx, dongia, sanpham.maloai,loaisanpham.tenloai, mucsanpham.id_muc, mucsanpham.tenmuc');
        $this->db->from($this->table);
        $this->db->join("loaisanpham", "sanpham.maloai = loaisanpham.maloai");
        $this->db->join('mucsanpham', 'loaisanpham.id_muc = mucsanpham.id_muc');
        if(isset($submenuid)&&($submenuid!="null")){
            $this->db->where('loaisanpham.maloai',$submenuid);
        }
        switch ($sort){
            case '1': $this->db->order_by('tensp','asc');break;
            case '2': $this->db->order_by('tensp','desc');break;
            case '3': $this->db->order_by('dongia','asc');break;
            case '4': $this->db->order_by('dongia','desc');break;
            default : null;
        }
        if(isset($menuid)&&isset($submenuid)&&($submenuid="null")){
            $this->db->where('mucsanpham.id_muc',$menuid);
        }
        return $this->db->get()->result_array();
    }
    public function sp_giamgia($sort=null){
        //san pham giam gia trang main, menu deal
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('giamgia >','0');
        switch ($sort){
            case '1': $this->db->order_by('tensp','asc');break;
            case '2': $this->db->order_by('tensp','desc');break;
            case '3': $this->db->order_by('dongia','asc');break;
            case '4': $this->db->order_by('dongia','desc');break;
            default : null;
        }
        return $this->db->get()->result_array();
    }
    public function sp_moi(){
        //san pham moi trang main
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('masp','desc');
        $this->db->limit(200,0);
        return $this->db->get()->result_array();
    }
    
    public function get_list_sp($where=null){
        //option sp theo loai sp
        $this->db->select('*');
        $this->db->from('sanpham');
        if(isset($where['maloai'])) {
            $this->db->where('maloai', $where['maloai']);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function check_exists($where)
    {
        //kiem tra co ton tai san pham
        $this->db->select("*");
        $this->db->where($where);
        //thuc hien cau truy van
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
}
?>