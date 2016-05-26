<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    private $data = array();


    public function __construct() {
        parent::__construct();
    }

    public function login() 
    {
        $user_login = $this->session->userdata('user_login');
        if($user_login)
        {
            redirect(base_url('acp'));
        }
        $this->data['msg'] = '';
        
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('u', 'Username', 'required');
            $this->form_validation->set_rules('p', 'password', 'required');
            
            if ($this->form_validation->run() == TRUE)
            {
                $post = $this->input->post();
                $result = $this->user_model->login($post);
                if($result['success'])
                {
                    $this->load->view('backend/auth/loading', array('msg' => 'Dang nhap vao he thong', 'url' => '/acp'));
                    return true;
                }
                else
                {
                    $this->data['msg'] = $result['msg'];
                }
            }
        }
        
        $this->load->view('backend/auth/login', $this->data);
    }
    
    public function logout()
    {
        $this->user_model->logout();
    }
    
    public function change_password()
    {
        $user_login = $this->session->userdata('user_login');
        if($user_login['change_pass'] == 0)
        {
            redirect(base_url('acp'));
        }
        
        $this->data['msg'] = "<small class='help-block'>Ban phai thay doi mat khau trong lan dau dang nhap <br /> hoac khi mat khau duoc thiet lap lai</small>";
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('p1', 'password', 'required');
            $this->form_validation->set_rules('p2', 'password', 'required');
            $this->form_validation->set_rules('p3', 'password', 'required|matches[p2]');
            if ($this->form_validation->run() == TRUE)
            {
                $post = $this->input->post();
                $result = $this->user_model->change_password($post['p1'], $post['p2']);
                
                if($result['success'])
                {
                    $this->session->set_flashdata('msg_success', 'Update password successful.');
                    redirect(base_url('acp'));
                }
                else
                {
                     $this->data['msg'] = "<small class='help-block' style='color:red;'>".$result['msg']."</small>";
                }
            }
        }
        $this->load->view('backend/auth/change_password', $this->data);
    }

}
