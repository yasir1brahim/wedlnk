<?php
defined('BASEPATH') OR exit('No direct script access is allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if(!auth()){
            redirect('Login');
        }
        //dd($this->session->all_userdata());
        $this->load->model('Dashboard_model');
    }

public function index(){
         $data['users']['active_verified'] = $this->Dashboard_model->getActiveVerifiedUsers();
         //dd(array_column());
        // $data['users']['verified_users'] = $this->Dashboard_model->getVerifiedUsers();
         $data['users']['by_active_products'] = $this->Dashboard_model->usersByActiveProduct()->total;
         $data['active_products'] = $this->Dashboard_model->activeProducts();
         $data['products_not_attached'] = $this->Dashboard_model->productsNotAttached();
         $data['page'] = 'dashboard/index';
         $this->load->view('template/admin',$data);
    }
}