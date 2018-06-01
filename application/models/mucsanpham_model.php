<?php
class Mucsanpham_model extends MY_Model{
    function __construct(){
        parent::__construct();
    }
    public $table = 'mucsanpham';

    public function load_menu($menuid=null){
        $this->db->select('*');
        if(isset($menuid)){
            $this->db->where('id_muc',$menuid);
        } 
        return $this->db->get($this->table)->result_array();
    }
}
?>