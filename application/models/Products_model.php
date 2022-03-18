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

    public function get_product($product_id){
    $query = $this->db->select('*')
            ->where('id',$product_id)
            ->get(TBL_PRODUCTS);

    return $query->row();
    }

    public function mappedProductExist($product_id){
        $query = $this->db->select('count(*) total')
            ->where('user_id',auth()->id)
            ->where('product_id',$product_id)
            ->get(TBL_PRODUCTS_MAP);

        return $query->row()->total;
    }

    public function getMappedProducts(){
        $query = $this->db->select('products.*,products_map.*,products_map.price')
        ->from(TBL_PRODUCTS)
        ->join(TBL_PRODUCTS_MAP,'products.id=products_map.product_id')
        ->where('products_map.user_id',auth()->id)
        ->get();

        return $query->result();
    }
}