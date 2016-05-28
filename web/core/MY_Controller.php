<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Thanh Nguyen
 */

class MY_Controller extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->user_model->is_login();
        $this->lang->load('backend');       
    }
}