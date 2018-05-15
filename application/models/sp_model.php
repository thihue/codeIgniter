<?php
class Sp_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'sanpham';

    public function get_list(){
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }

    public function get_list_sp($maloai=null){
        $this->db->select('*');
        $this->db->from('sanpham');
        if(isset($maloai)) {
            $this->db->where('maloai', $maloai);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function chonsp($where){
        $this->db->select('*');
        $this->db->from('sanpham');
        $this->db->join('loaisanpham', 'sanpham.maloai = loaisanpham.maloai');
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