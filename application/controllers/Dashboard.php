<?php
defined('BASEPATH') OR exit('No direct script access is allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $auth = auth();

        if(!$auth OR $auth->user_type!=ROLE_ADMIN){
            redirect('Login');
        }
    }

    public function index(){

    }
}