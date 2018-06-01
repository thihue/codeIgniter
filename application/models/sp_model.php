<?php
class Sp_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'sanpham';

    public function get_list(){
        $this->db->select('masp, tensp, soluongton, hinh, nhasx, dongia, mota, sanpham.maloai, loaisanpham.tenloai');
        $this->db->from($this->table);
        $this->db->join("loaisanpham", "sanpham.maloai = loaisanpham.maloai");
        return $this->db->get()->result_array();
    }
    public function load_sp_theo_muc(){
        $this->db->select('masp, tensp, soluongton, hinh, nhasx, dongia, mota, sanpham.maloai, loaisanpham.tenloai, mucsanpham.id_muc');    
        $this->db->from('sanpham');
        $this->db->join('loaisanpham', 'table1.id = table2.id');
        $this->db->join('table3', 'table1.id = table3.id');
        // http://luanvan.co/luan-van/de-tai-xay-dung-website-ban-hang-thoi-trang-qua-mang-44824/
    }
    public function get_list_sp($where=null){
        $this->db->select('*');
        $this->db->from('sanpham');
        if(isset($where['maloai'])) {
            $this->db->where('maloai', $where['maloai']);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function get_sp_theo_loai($submenuid=null){
        $this->db->select('*');
        if(isset($submenuid)){
            $this->db->where('maloai',$submenuid);
        }
        return $this->db->get($this->table)->result_array();
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