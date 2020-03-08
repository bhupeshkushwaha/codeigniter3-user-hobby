<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Users extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        $this->load->library('form_validation'); 
        $this->load->model('user');  

        $this->checkUserLoggedIn = $this->session->userdata('checkUserLoggedIn'); 
    } 
     
    public function index(){ 

        if($this->checkUserLoggedIn){ 

            if( $this->checkUserLoggedIn->role === 'admin' ) {
                redirect('users/admin');
            }

            redirect('users/hobby'); 
        }
        
        redirect('users/login');  
    } 

    public function admin(){ 

        $data = array(); 
        
        if($this->checkUserLoggedIn){ 
        
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
        
            $data['user'] = $this->user->getRows($con); 
             
            $this->load->view('layout/header', $data); 
            $this->load->view('users/admin', $data); 
            $this->load->view('layout/footer'); 
        }
        
        redirect('users/login');  
    } 
 
 
    public function hobby(){ 

        $data = array(); 
        
        if($this->checkUserLoggedIn){ 
        
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
        
            $data['user'] = $this->user->getRows($con); 
             
            $this->load->view('layout/header', $data); 
            $this->load->view('users/account', $data); 
            $this->load->view('layout/footer'); 
        }
        
        redirect('users/login');  
    } 
 
    public function login(){ 

        $data = array(); 
         
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 

        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        if($this->input->post('loginSubmit')){ 

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 

                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'email'=> $this->input->post('email'), 
                        'password' => md5($this->input->post('password')), 
                    ) 
                ); 

                $checkLogin = $this->user->getRows($con); 

                if($checkLogin){ 
                    $this->session->set_userdata('checkUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']); 

                    redirect('users/account/'); 
                }
                
                $data['error_msg'] = 'Wrong email or password, please try again.'; 
            }
            
            $data['error_msg'] = 'Please fill all the mandatory fields.';  
        } 
         
        $this->load->view('layout/header', $data); 
        $this->load->view('users/login', $data); 
        $this->load->view('layout/footer'); 
    } 
 
    public function registration(){ 
        
        $data = $userData = array(); 
         
        if($this->input->post('signupSubmit')){ 

            $this->form_validation->set_rules('full_name', 'Full Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
 
            $userData = array( 
                'full_name' => strip_tags($this->input->post('first_name')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password'))
            ); 
 
            if($this->form_validation->run() == true){ 

                $insert = $this->user->insert($userData); 
                
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 

                    redirect('users/login'); 
                }
                
                $data['error_msg'] = 'Some problems occured, please try again.';  
            }

            $data['error_msg'] = 'Please fill all the mandatory fields.';  
        } 
         
        $data['user'] = $userData; 
         
        $this->load->view('layout/header', $data); 
        $this->load->view('users/registration', $data); 
        $this->load->view('layout/footer'); 
    } 
     
    public function logout(){ 
        $this->session->unset_userdata('checkUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 

        redirect('users/login/'); 
    } 
    
    public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 

        $checkEmail = $this->user->getRows($con); 

        if($checkEmail > 0){ 
            
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 

            return FALSE; 
        }
        
        return TRUE;  
    } 
}