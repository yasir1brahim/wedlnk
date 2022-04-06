<?php
defined('BASEPATH') OR die('No direct script access is allowed');

class Register_model extends CI_Model {
    public function verify_user($verify_code){
        $this->db->set('is_verified',(string) USER_VERIFED)
        ->where('verify_code',$verify_code)
        ->update(TBL_USERS);

        $user = $this->db->get_where(TBL_USERS,['verify_code'=>$verify_code])->row();
        
        return (object) ['affect'=>$this->db->affected_rows(),'user'=>$user];
    }
}