<?php
class User_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'user';
    public function check_exists($where)
    {
        //them dieu kien kiem tra email va password
        //$where = array('username' => $user, 'pass' => $password);
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
    public function get_user_info($where = array())
    {
        //tao dieu kien cho cau truy van
        $this->db->where($where);
        $result = $this->db->get('user');
        return $result->row();
    }
    // public function check_exists($where=array())
    // {
    //     $this->db->where($where);
    //     $query = $this->db->get($this->user);
    //     if($query->num_rows()>0){

    //     }
    // }
}


?>