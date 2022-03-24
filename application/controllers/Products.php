<?php
defined('BASEPATH') OR exit('No direct script access is allowed');

class Products extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(!auth()){
            redirect('Login');
        }
        //dd($this->session->all_userdata());
        $this->load->model('Products_model');
    }

    public function index(){
        $data['products'] = $this->Products_model->get_products();
      //  $data['mapped_products'] = count($this->Products_model->getMappedProducts());
        $data['page'] = 'products/products_list';
        $this->load->view('template/admin',$data);
    }

    
}