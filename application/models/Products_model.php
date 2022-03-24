<?php
defined('BASEPATH') OR die('No direct script access is allowed');

class Products_model extends CI_Model {
    public function get_products(){
        $auth = auth();
        if($auth->user_type==ROLE_ADMIN):
        $query = $this->db->get(TBL_PRODUCTS);
        elseif($auth->user_type==ROLE_USER):
        $query = $this->db->get_where(TBL_PRODUCTS,['is_enabled'=>'1','is_deleted'=>'0']);
        endif;
        
        return $query->result();
    }
}