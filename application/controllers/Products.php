<?php
defined('BASEPATH') OR exit('No direct script access is allowed');

class Products extends MY_Controller {

    private $methods_allowed = [
        ROLE_USER => [
        'index','add_to_my_list','my_product_list'
        ],
        ROLE_ADMIN => ['index']
    ];
    public function __construct(){

        parent::__construct();

        if(!auth() OR !in_array($this->router->method,$this->methods_allowed[auth()->user_type])){
            redirect('Login');
        }
        $this->load->model('Products_model');
    }

    public function index(){
        $data['products'] = $this->Products_model->get_products();
        $data['mapped_products'] = count($this->Products_model->getMappedProducts());
        $data['page'] = 'products/products_list';
        $this->load->view('template/admin',$data);
    }

    public function add_to_my_list(){
        if(!auth()->user_type!=ROLE_USER) redirect('Products');
        $product_id = $this->input->get('id');
        $qty = $this->input->get('qty');
        $price = $this->input->get('price');

        $mappedProduct = $this->Products_model->mappedProductExist($product_id);
        if(empty($mappedProduct)){
            $state = 'added';
            $state_error = 'adding';
            $product = ['user_id'=>auth()->id,'product_id'=>$product_id,'qty'=>$qty,'price'=>$price];
            $this->db->insert(TBL_PRODUCTS_MAP,$product);
        } else {
            $state = 'updated';
            $state_error = 'updating';
            $this->db->set(['qty'=>$qty,'price'=>$price,'modified_at'=>date('Y-m-d H:i:s')])
                    ->where('product_id',$product_id)
                    ->update(TBL_PRODUCTS_MAP);
        }


    $flash_message = $this->db->affected_rows() ? ['class'=>'success','message'=>'Product '.$state.' successfully to your list.'] :
    ['class'=>'danger','message'=>'Error '.$state_error.' product to your list.'];

    $this->session->set_flashdata('message',$flash_message);
    redirect('Products');
}

public function my_product_list(){
    $data['products'] = $this->Products_model->getMappedProducts();
    $data['mapped_products'] = count($data['products']);
    $data['page'] = 'products/my_products_list';
    $this->load->view('template/admin',$data);
}

    
}