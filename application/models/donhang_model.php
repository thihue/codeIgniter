<?php
class Donhang_model extends MY_Model{
    function __construct(){
        parent::__construct();
    }
    public $table = 'hoadon';

    public function get_list_hinh($arr){
        $this->db->select('*');
        $this->db->from('hinh');
        if(isset($arr['masp'])){
            $this->db->where('masp',$arr['masp']);
        }
        return $this->db->get()->result_array();
    }
    public function get_list_new(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('TinhTrang',0);
        return $this->db->get()->result_array();
    }
    public function get_list_nhan(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('TinhTrang',1);
        return $this->db->get()->result_array();
    }
}
?>