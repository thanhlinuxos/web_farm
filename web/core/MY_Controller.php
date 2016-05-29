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

        $this->user_model->is_login();
        $this->lang->load('backend');  
        $this->data['menu_active'] = $this->router->fetch_class();
    }
}