<?php
class Top_model extends MY_Model{
    function __construct(){
        parent::__construct();
    }
    public $table = 'mucsanpham';

    public function load_menu(){
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }
}
?>