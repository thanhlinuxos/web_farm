<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->library('migration');

        if ( ! $this->migration->current())
        {
            show_error($this->migration->error_string());
        }
        echo 'CURRENT VERSION: ' . $this->migration->current() . "<br>";
        echo 'LATEST VERSION: ' . $this->migration->latest();
        // Roll  back
        // $this->migration->version(1);
    }

}