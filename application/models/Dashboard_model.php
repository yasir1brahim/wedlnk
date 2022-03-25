<?php
defined('BASEPATH') OR die('No direct script access is allowed');

class Dashboard_model extends CI_Model {
    public function getActiveVerifiedUsers(){
        $query = $this->db->select('*')
                    ->where(['user_type'=>(string) ROLE_USER,'is_verified'=>(string) USER_VERIFED,'is_deleted'=>'0'])
                    ->get(TBL_USERS);

        return $query->result();
    }
}