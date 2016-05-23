<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login() {
        
        if($this->input->post('u'))
        {
            $this->load->view('backend/auth/loading', array('msg' => 'Dang nhap vao he thong', 'url' => '/acp'));
        }
        else
        {
            $this->load->view('backend/auth/login');
        }
    }
    
    public function logout()
    {
        
    }

}
