<?php
class Donhang_ct_model extends MY_Model{
    function __construct(){
        parent::__construct();
    }
    public $table = 'chitiethoadon';

    public function get_list($arr){
        $this->db->select('idCTDH, idDH, sanpham.masp, chitiethoadon.soluong, chitiethoadon.dongia, sanpham.tensp');
        $this->db->from($this->table);
        if(isset($arr['idDH'])){
            $this->db->where('idDH',$arr['idDH']);
        }
        $this->db->join("sanpham","sanpham.masp = chitiethoadon.masp");
        return $this->db->get()->result_array();
    }
    public function sp_banchay(){
        //san pham ban chay trang main
        $this->db->select('chitiethoadon.masp, sum("chitiethoadon.soluong") as soluong, giamgia, tensp, hinh, mota, nhasx, sanpham.dongia,');
        $this->db->from('chitiethoadon');
        $this->db->join('sanpham', 'chitiethoadon.masp = sanpham.masp');
        $this->db->group_by('soluong');
        $this->db->order_by('soluong','desc');
        $this->db->limit(50,0);
        return $this->db->get()->result_array();
    }
    public function sp_noibat(){
        //san pham ban chay trang main
        $this->db->select('chitiethoadon.masp, sum("chitiethoadon.soluong") as soluong, giamgia, tensp, hinh, mota, nhasx, sanpham.dongia,');
        $this->db->from('chitiethoadon');
        $this->db->where('giamgia >','0');
        $this->db->join('sanpham', 'chitiethoadon.masp = sanpham.masp');
        $this->db->group_by('soluong');
        $this->db->order_by('soluong','desc');
        $this->db->limit(50,0);
        return $this->db->get()->result_array();
    }
}
?>