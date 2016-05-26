<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    private $data = array();


    public function __construct() {
        parent::__construct();
    }

    public function login() 
    {
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
        
    }

}
