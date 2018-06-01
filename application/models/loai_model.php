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
    public function get($id=null){
        $this->db->select('*');
        if(isset($id)){
            $this->db->where('id_muc',$id);
        }
        return $this->db->get($this->table)->result_array();
    } 
    public function get_name($submenuid=null){
        $this->db->select('*');
        if(isset($submenuid)){
            $this->db->where('maloai',$submenuid);
        }
        return $this->db->get($this->table)->result_array();
    } 
    public function check_exists_edit($arr)
    {
        $this->db->select("*");
        //$this->db->group_start();
        if(isset($arr['tenloai'])){
            $this->db->where('tenloai',$arr['tenloai']);}
        if(isset($arr['maloai'])){
            $this->db->where_not_in('maloai',$arr['maloai']);
        }
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    public function check_exists_add($where){
        $this->db->select("*");
        $this->db->group_start();
            if(isset($where['maloai'])){
                $this->db->where('maloai',$where['maloai']);}
            if(isset($where['tenloai'])){
                $this->db->or_where('tenloai',$where['tenloai']);}
        $this->db->group_end();
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
}
?>