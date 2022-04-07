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
        $query = $this->db->select('DISTINCT(pm.user_id) uid')
        ->from(TBL_PRODUCTS_MAP.' pm')
        ->join(TBL_USERS.' u','pm.user_id=u.id')
        ->where(['pm.is_deleted'=>(string) IS_NOT_DELETED,'u.is_deleted'=>(string) IS_NOT_DELETED])
        ->get(TBL_PRODUCTS_MAP);

        return $query->result();
    }

    public function activeProducts(){
        $query = $this->db->select('COUNT(*) as total')
        ->where(['is_enabled'=>(string) STATUS_ENABLED,'is_deleted'=>'0'])
        ->get(TBL_PRODUCTS);

        return $query->row()->total;
    }

    public function productsNotAttached(){
        $query = $this->db->select('p.id,pm.id')
        ->from(TBL_PRODUCTS.' p')
        ->join(TBL_PRODUCTS_MAP.' pm','p.id=pm.product_id','left')
        ->where('pm.id',NULL)
        ->get();

        return $query->result();
    }

    public function activeAttachedProducts(){
        $query = $this->db->select('sum(pm.qty) as qty')
        ->from(TBL_PRODUCTS.' p')
        ->join(TBL_PRODUCTS_MAP.' pm','p.id=pm.product_id')
        ->where(['p.is_enabled'=>(string) STATUS_ENABLED,'p.is_deleted'=>(string) IS_NOT_DELETED,'pm.is_deleted'=>(string) IS_NOT_DELETED])
        ->get();

        return $query->row();
        }

        public function amountSumActiveAttachedProducts(){
            $query = $this->db->select('sum(pm.price*pm.qty) as amount')
            ->from(TBL_PRODUCTS.' p')
            ->join(TBL_PRODUCTS_MAP.' pm','p.id=pm.product_id')
            ->where(['p.is_enabled'=>(string) STATUS_ENABLED,'p.is_deleted'=>(string) IS_NOT_DELETED,'pm.is_deleted'=>(string) IS_NOT_DELETED])
            ->get();

            return $query->row();
            }
        public function summarized_price_users(){
            $query = $this->db->select('u.first_name,u.last_name,sum(pm.price*pm.qty) as amount')
            ->from(TBL_PRODUCTS.' p')
            ->join(TBL_PRODUCTS_MAP.' pm','p.id=pm.product_id')
            ->join(TBL_USERS.' u','pm.user_id=u.id')
            ->where(['p.is_enabled'=>(string) STATUS_ENABLED,'p.is_deleted'=>(string) IS_NOT_DELETED,'pm.is_deleted'=>(string) IS_NOT_DELETED])
            ->group_by('pm.user_id')
            ->get();

            return $query->result();
        }

    }