<?php
defined('BASEPATH') OR exit('No direct script access is allowed');

class Dashboard extends MY_Controller {

    public function __construct(){
        parent::__construct();

        $auth = auth();

        if(!$auth OR $auth->user_type!=ROLE_ADMIN){
            redirect('Login');
        }
        $this->load->model('Dashboard_model');
    }

    public function index(){
       $data['users']['active_verified'] = $this->Dashboard_model->getActiveVerifiedUsers();
       $data['users']['by_active_products'] = count($this->Dashboard_model->usersByActiveProduct());
       $data['active_products'] = $this->Dashboard_model->activeProducts();
       $data['products_not_attached'] = count($this->Dashboard_model->productsNotAttached());
       $data['qtyActiveAttachedProducts'] = $this->Dashboard_model->activeAttachedProducts();
       // Summarized price for active and attached products
       $data['sum_price_aa_prods'] = $this->Dashboard_model->amountSumActiveAttachedProducts();
       $data['user_products'] = $this->Dashboard_model->summarized_price_users();
       $data['page'] = 'dashboard/index';
       $this->load->view('template/admin',$data);
    }
}