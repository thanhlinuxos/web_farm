<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * CodeIgniter will be assigned to.
 *
 * @package	CodeIgniter
 * @subpackage	Core Controller
 * @category	My Controller
 * @author	Thanh Nguyen
 */

class MY_Controller extends CI_Controller
{
    protected $data = array();
    
    public function __construct() {
        parent::__construct();
        
        $this->uri->segment(1) == 'acp'? $this->user_model->backend_is_login() : $this->user_model->frontend_is_login();
        $this->user_model->check_permission($this->router->fetch_class(), $this->router->fetch_method());
        $this->lang->load('backend');  
        $this->data['menu_active'] = $this->router->fetch_class();
    }
}