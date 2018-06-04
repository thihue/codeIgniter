<?php
class Sp_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'sanpham';

    public function get_list($menuid=null,$submenuid=null){
        //bang san pham, trang chu san pham theo loai
        $this->db->select('masp, tensp, soluongton, hinh,mota, nhasx, dongia, sanpham.maloai,loaisanpham.tenloai, mucsanpham.id_muc, mucsanpham.tenmuc');
        $this->db->from($this->table);
        $this->db->join("loaisanpham", "sanpham.maloai = loaisanpham.maloai");
        $this->db->join('mucsanpham', 'loaisanpham.id_muc = mucsanpham.id_muc');
        if(isset($submenuid)&&($submenuid!="null")){
            $this->db->where('loaisanpham.maloai',$submenuid);
        }
        if(isset($menuid)&&isset($submenuid)&&($submenuid="null")){
            $this->db->where('mucsanpham.id_muc',$menuid);
        }
        return $this->db->get()->result_array();
    }
    public function load_sp_theo_muc(){
        $this->db->select('masp, tensp, soluongton, hinh, nhasx, dongia, mota, sanpham.maloai, loaisanpham.tenloai, mucsanpham.id_muc');    
        $this->db->from('sanpham');
        $this->db->join('loaisanpham', 'loaisanpham.maloai = sanpham.maloai');
        $this->db->join('mucsanpham', 'loaisanpham.id_muc = mucsanpham.id_muc');
        return $this->db->get()->result_array();
        // http://luanvan.co/luan-van/de-tai-xay-dung-website-ban-hang-thoi-trang-qua-mang-44824/
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