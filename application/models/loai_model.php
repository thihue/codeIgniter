<?php
class Loai_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'loaisanpham';
    public function get_list(){
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }
    public function check_exists($where)
    {
        $this->db->select("*");
        //thuc hien cau truy van
        //$this->db->group_start();
        if(isset($where['tenloai'])){
            $this->db->where('tenloai',$where['tenloai']);}
        if(isset($where['id'])){
            $this->db->where_not_in('maloai',$where['id']);
        }
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
}
?>