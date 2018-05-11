<?php
class User_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'user';
    public function get_list(){
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }
    public function check_exists($where)
    {
        //$where = array('username' => $user, 'pass' => $password);
        $this->db->select("*");
        $this->db->group_start();
        if(isset($where['username'])){
        $this->db->where('username',$where['username']);}
        if(isset($where['email'])){
        $this->db->or_where('email',$where['email']);}
        $this->db->group_end();
        if(isset($where['id'])){
            $this->db->where_not_in('idUser',$where['id']);
        }
        
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    public function check_exist($where)
    {
        //$where = array('username' => $user, 'pass' => $password);
        $this->db->select("*");
        $this->db->where('username',$where['username']);
        $this->db->where('email',$where['email']);
        $this->db->where_not_in('idUser',$where['id']);
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
}
?>
