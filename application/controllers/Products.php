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
        $data['mapped_products'] = count($this->Products_model->getMappedProducts());
        $data['page'] = 'products/products_list';
        $this->load->view('template/admin',$data);
    }

    // public function add_to_my_list(){
    //     $product_id = $this->input->get('id');
    //     $qty = $this->input->get('qty');
    //     $price = $this->input->get('price');
        
    //     $my_products = $this->session->userdata('my_products');
    //     $product_ids = array_column($my_products,'product_id');
        
    //     if(!is_array($my_products)){
    //         $my_products = [];
    //         $my_products[] = ['product_id'=>$product_id,'qty'=>$qty,'price'=>$price];
    //         $product_ids[] = $product_id;
            
    //     } else {
    //         if(!in_array($product_id,$product_ids)){
    //         $my_products[] = ['product_id'=>$product_id,'qty'=>$qty,'price'=>$price];
    //         $product_ids[] = $product_id;
    //         } else {
    //             $this->session->set_flashdata('message',['class'=>'danger','message'=>'Product already added to your list.']);        
    //             redirect('Products');
    //         }
    //     }

        public function add_to_my_list(){
            $product_id = $this->input->get('id');
            $qty = $this->input->get('qty');
            $price = $this->input->get('price');
            
            $mappedProduct = $this->Products_model->mappedProductExist($product_id);
            //$product_ids = array_column((array) $my_products,'product_id');
            if(empty($mappedProduct)){
                $state = 'added';
                $state_error = 'adding';
                $product = ['user_id'=>auth()->id,'product_id'=>$product_id,'qty'=>$qty,'price'=>$price];
                $this->db->insert(TBL_PRODUCTS_MAP,$product);
                //$this->session->set_flashdata('message',['class'=>'success','message'=>'Product added to your list.']);
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

    // public function my_product_list(){
    //     $my_products = $this->session->userdata('my_products');
    
    //     $products = array_map(function($my_product){
    //     $db_product = $this->Products_model->get_product($my_product['product_id']);
    //     $my_product['title'] = $db_product->title;
    //     $my_product['description'] = $db_product->description;
    //     $my_product['image'] = $db_product->image;
    //     return (object) $my_product;
    //     },$my_products);
        
    //     $data['products'] = $products;
        
    //     $data['page'] = 'products/my_products_list';
    //     $this->load->view('template/admin',$data); 
    // }

    public function my_product_list(){
        $data['products'] = $this->Products_model->getMappedProducts();
        $data['mapped_products'] = count($data['products']);
        $data['page'] = 'products/my_products_list';
        $this->load->view('template/admin',$data); 
    }
}