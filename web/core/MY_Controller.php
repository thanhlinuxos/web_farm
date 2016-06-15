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
        
        if($this->uri->segment(1) == 'acp') {
            $this->user_model->backend_is_login();
            $this->lang->load('backend');
        } else {
            $this->user_model->frontend_is_login();
            $this->lang->load('frontend');
        }
        $this->user_model->check_permission($this->router->fetch_class(), $this->router->fetch_method());
        $this->data['menu_active'] = $this->router->fetch_class();
    }
    
    /**
     * 
     * @param type $method
     * @param type $params
     */
//    public function _remap($method, $params = array())
//    {
//        echo $method; 
//        print_r($params);
//        exit;
//    }
    
    /**
     * Get last output
     * @param type $output
     */
//    public function _output($output)
//    {
//        var_dump($output);
//        exit;
//    }
}