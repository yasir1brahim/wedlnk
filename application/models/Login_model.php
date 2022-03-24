<?php
defined('BASEPATH') OR die('No direct script access is allowed');

class Login_model extends CI_Model {
    public function authtenticate_user($email,$password){
    return $this->db->where(
        ['email'=>$email,'password'=>$password,'is_verified'=>(string) USER_VERIFED,'is_enabled'=>(string) STATUS_ENABLED,'is_deleted'=>'0']
        )->get(TBL_USERS)->row();
    }
}