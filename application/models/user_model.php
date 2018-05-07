<?php
class User_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'user';
    public function get_list(){
        $this->db->select('id, username');
        return $this->db->get($this->table)->result_array();
    }
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
    // public function check_user($where){
    //     $this->db->select("*");
    //     $this->db->where($where);
    // }
    public function get_user_info($where = array())
    {
        //tao dieu kien cho cau truy van
        $this->db->where($where);
        $result = $this->db->get('user');
        return $result->row();
    }
    function update($id, $data)
    {
        if (!$id)
        {
            return FALSE;
        }		
        $where = array();
        $where[$this->key] = $id;
        //$this->update_rule($where, $data); 	
        return TRUE;
    }
}
?>