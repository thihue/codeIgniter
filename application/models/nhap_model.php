<?php
class Nhap_model extends MY_Model{
    function __construct(){
        parent::__construct();
        //$this->table = 'user';
    }
    public $table = 'nhap';
    public function get_list(){
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }
}
?>