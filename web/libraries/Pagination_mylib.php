<?php
/**
 * CodeIgniter
 *
 * @package	CodeIgniter
 * @author	Thanh Nguyen
 * @copyright	Copyright (c) 2016
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pagination Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Pagination
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/pagination.html
 */
class Pagination_mylib {
    
    
    // --------------------------------------------------------------------

    /**
     * Configs for bootstrap pagination
     *
     * @param	
     * @return	array()
     */
    public function bootstrap_configs()
    {
        $config = array();
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';     
        return $config;
    }

}
