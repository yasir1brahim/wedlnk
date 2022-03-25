<?php
defined('BASEPATH') OR exit('No direct script access is allowed');

class Dashboard extends CI_Controller {

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
       $data['users']['by_active_products'] = $this->Dashboard_model->usersByActiveProduct()->total;
       $data['active_products'] = $this->Dashboard_model->activeProducts();
       $data['products_not_attached'] = $this->Dashboard_model->productsNotAttached();
       $activeAttachedProducts = $this->Dashboard_model->activeAttachedProducts();
       $data['qtyActiveAttachedProducts'] = array_sum(array_column($activeAttachedProducts,'qty'));
       // Summarized price for active and attached products
       $sum_price_aa_prods = 0;
       $userProducts = [];

       foreach($activeAttachedProducts as $activeAttachedProduct){
        $sum_price_aa_prods+=$activeAttachedProduct->price*$activeAttachedProduct->qty;

        if(!array_key_exists($activeAttachedProduct->user_id,$userProducts)){
            $userProducts[$activeAttachedProduct->user_id] = [$activeAttachedProduct->price];
         } else {
            $userProducts[$activeAttachedProduct->user_id][] = $activeAttachedProduct->price;
         }

       }
       $data['sum_price_aa_prods'] = $sum_price_aa_prods;
       $data['user_products'] = $userProducts;
       $data['page'] = 'dashboard/index';
       $this->load->view('template/admin',$data);
    }
}