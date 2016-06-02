<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Output_mylib 
{
    /**
      * CI Singleton
      *
      * @var object
      */
    protected $CI;
    
    /**
    * Class constructor
    *
    * Loads the Image_mylib file.
    *
    * @uses	CI_Lang::$is_loaded
    *
    * @return	void
    */
    public function __construct()
    {
            $this->CI =& get_instance();
            $this->CI->load->helper('directory');
            log_message('info', 'Image_mylib Class Initialized');
    }
    
    public function response($data = array())
    {
        $out = $this->CI->output->set_content_type('application/json')->set_output(json_encode($data));
        echo $out->final_output;
        exit;
    }
    
}
