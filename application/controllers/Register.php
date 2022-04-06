<?php
defined('BASEPATH') OR die('No direct script access is allowed');

class Register extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Register_model');
    }
    public function index(){
        $data['page'] = 'auth/register';
       $this->load->view('template/auth',$data);
    }

    public function register_user(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name','First Name','required|alpha|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('last_name','Last Name','required|alpha|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique['.TBL_USERS.'.email]|max_length[50]');

            $this->form_validation->set_rules('password','Password','required|min_length[6]|password_check[1,1,1]|max_length[30]');
            $this->form_validation->set_rules('confirm_password','Confirm Password','required|min_length[6]|max_length[30]|matches[password]');
            $this->form_validation->set_error_delimiters('<p style="color:red">','</p>');

            if($this->form_validation->run()){
                extract($this->input->post());
                
                $data = [
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'email'=>$email,
                    'password'=>md5($password)
                ];
                
                if($res = $this->Register_model->save($data,TBL_USERS)){
                    $verify_code = md5(rand(100000,999999));
                    $this->Register_model->save(['verify_code'=>$verify_code],TBL_USERS,$res['id']);
                    $email_html = $this->load->view('template/email',['verify_url'=>base_url('verify-user?v='.$verify_code)],TRUE);
                        
                    $email_contents = [
                        'to'=>$email,
                        'subject'=>'Abc.org account verification',
                        'body'=>$email_html,
                    ];
                    
                    $this->send_email($email_contents);
                    
                    $this->session->set_flashdata('message',['class'=>'success','message'=>'User registered successfully. Please verify your email address.']);
                    redirect('login');
                } else {
                    $this->session->set_flashdata('message',['class'=>'danger','message'=>'Unable to process your requrest.']);
                    redirect('login');
                }
            } else {
                $this->load->view('template/auth',['page'=>'auth/register']);
            }

    }
    
    public function verify_user(){
     $verify_code = $this->input->get('v');
     $res =$this->Register_model->verify_user($verify_code);
     if($res->affect){
         
         $this->session->set_userdata('user',$res->user);
         $this->session->set_flashdata('message',['class'=>'success','message'=>'Your email is verified now.']);
         redirect('Products');
     } else {
        $this->session->set_flashdata('message',['class'=>'danger','message'=>'Verification code expired.']);
         redirect('Login');
     }
     
    }


}