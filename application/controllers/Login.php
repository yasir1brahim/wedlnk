<?php
defined('BASEPATH') OR die('No direct script access is allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
    }
    public function index(){
        $data['page'] = 'auth/login';
       $this->load->view('template/auth',$data);
    }

    public function auth_user(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
     
        extract($this->input->post());
    
        if($this->form_validation->run()){
            if($user = $this->Login_model->authtenticate_user($email,md5($password))){
            $this->session->set_userdata('user',$user);
            $url = $user->user_type==ROLE_ADMIN ? 'Dashboard' : 'Products';
            redirect($url);
        } else {
            $this->session->set_flashdata('message',['class'=>'danger','message'=>'Invalid email/password or email is not verified.']);
            redirect('Login');
        }
        } else {

        $data['page'] = 'auth/login';
        $this->load->view('template/auth',$data);

        }
    }

    public function logout(){
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('my_products');
        redirect('Login');
    }
}