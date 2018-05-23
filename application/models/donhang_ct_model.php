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
}
?>