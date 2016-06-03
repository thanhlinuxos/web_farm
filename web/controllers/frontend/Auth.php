<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    private $data = array();

    public function __construct() {
        parent::__construct();
        $this->lang->load('frontend');
    }
    
    public function login() 
    {
        $this->load->view('frontend/auth/login');
    }
    
    public function logout() 
    {
        
    }
    
    public function change_password()
    {
        $this->load->view('frontend/auth/change_password');
    }
}