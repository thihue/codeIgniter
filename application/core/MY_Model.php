<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model {
    // Ten table
    var $table = 'user';

    // function update($id, $data)
    // {
    //     if (!$id)
    //     {
    //         return FALSE;
    //     }		
    //     $where = array();
    //     $where[$this->key] = $id;
    //     //$this->update_rule($where, $data); 	
    //     return TRUE;
    // }
    function get_info($id, $field = '')
    {
        if (!$id)
        {
            return FALSE;
        }       
        $where = array();
        $where[$this->key] = $id;       
        return;
    }
}