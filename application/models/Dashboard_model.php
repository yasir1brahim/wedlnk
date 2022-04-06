<?php
defined('BASEPATH') OR die('No direct script access is allowed');

class Dashboard_model extends MY_Model {
    public function getActiveVerifiedUsers(){
        $query = $this->db->select('*')
                    ->where(['user_type'=>(string) ROLE_USER,'is_verified'=>(string) USER_VERIFED,'is_deleted'=>'0'])
                    ->get(TBL_USERS);

        return $query->result();
    }

    public function usersByActiveProduct(){
        $query = $this->db->select('DISTINCT(user_id) uid')
        ->where('is_deleted','0')
        ->get(TBL_PRODUCTS_MAP);

        $user_ids = array_column($query->result_array(),'uid');
        $query = $this->db->select('count(*) as total')
        ->where_in('id',$user_ids)
        ->where(['user_type'=>(string) ROLE_USER,'is_verified'=>(string) USER_VERIFED,'is_deleted'=>'0'])
        ->get(TBL_USERS);

        return $query->row();
    }

    public function activeProducts(){
        $query = $this->db->select('COUNT(*) as total')
        ->where(['is_enabled'=>(string) STATUS_ENABLED,'is_deleted'=>'0'])
        ->get(TBL_PRODUCTS);

        return $query->row()->total;
    }

    public function productsNotAttached(){
        $query = $this->db->query("select count(*) as total from products where id not in (select product_id from products_map)
         and is_enabled='1' and is_deleted='0'");
        return $query->row()->total;
    }

    public function activeAttachedProducts(){
        //select pm.user_id,pm.product_id,pm.price,pm.qty as total from products p join products_map pm on p.id = pm.product_id where p.is_enabled='1' and p.is_deleted='0' and pm.is_deleted='0';
        $query = $this->db->select('pm.user_id,pm.product_id,pm.price,pm.qty')
        ->from(TBL_PRODUCTS.' p')
        ->join(TBL_PRODUCTS_MAP.' pm','p.id=pm.product_id')
        ->where(['p.is_enabled'=>(string) STATUS_ENABLED,'p.is_deleted'=>(string) IS_NOT_DELETED,'pm.is_deleted'=>(string) IS_NOT_DELETED])
        ->get();

        return $query->result();
        }

    }