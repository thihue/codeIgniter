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

    public function get_list_sp($where=null){
        $this->db->select('*');
        $this->db->from('sanpham');
        if(isset($where['maloai'])) {
            $this->db->where('maloai', $where['maloai']);
        }
        // if(isset($where['masp'])) {
        //     $this->db->where('masp', $where['masp']);
        // }
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