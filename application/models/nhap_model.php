<?php
class Nhap_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'nhap';
    public function get_list(){
        // $this->db->select('*');
        // return $this->db->get($this->table)->result_array();
        $this->db->select('id,nhap.masp,soluong,nhap.dongia,nhap.tongtien,ngaynhap,soluongton,sanpham.tensp');
        $this->db->from($this->table);
        $this->db->join("sanpham", "sanpham.masp = nhap.masp");
        return $this->db->get()->result_array();
    }
}
?>