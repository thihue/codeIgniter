<?php
class Xuat_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'xuat';
    public function get_list(){
        $this->db->select('id,xuat.masp,soluong,xuat.dongia,xuat.tongtien,ngayxuat,soluongton,sanpham.tensp');
        $this->db->from($this->table);
        $this->db->join("sanpham", "sanpham.masp = xuat.masp");
        return $this->db->get()->result_array();
    }
}
?>