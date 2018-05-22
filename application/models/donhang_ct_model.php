<?php
class Donhang_ct_model extends MY_Model{
    function __construct(){
        parent::__construct();
    }
    public $table = 'chitiethoadon';

    public function get_list_hinh($arr){
        $this->db->select('*');
        $this->db->from('hinh');
        if(isset($arr['masp'])){
            $this->db->where('masp',$arr['masp']);
        }
        return $this->db->get()->result_array();
    }
}
?>