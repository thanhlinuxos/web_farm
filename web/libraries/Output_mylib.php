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
    
    public $mime_type = 'application/json';
    
    public $charset = 'UTF-8';

    public $status = 200;
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
        log_message('info', 'Output_mylib Class Initialized');
    }
    
    public function response($data = array(), $mime_type = NULL, $charset = NULL, $status = NULL)
    {
        if($mime_type != NULL) {
            if(!in_array($mime_type, array('application/json', 'application/xml', 'text/plain', 'css', 'jpeg'))) {
                show_error("MIME TYPE: $mime_type not available!");
            }
            $this->mime_type = $mime_type;
        }
        if($charset != NULL) {
            if(!in_array($charset, array('UTF-8'))) {
                show_error("CHARSET: $charset not available!");
            }
            $this->charset = $charset;
        }
        if($status != NULL) {
            $this->status = $status;
        }
        $this->CI->output->set_status_header($this->status);
        $this->CI->output->set_content_type($this->mime_type, $this->charset);
        switch ($this->mime_type)
        {
            case 'application/json':
                $out = $this->CI->output->set_output(json_encode($data));
                break;
            default :
                show_error("Response must be have MIME TYPE!");
        }
        
        echo $out->final_output;
        exit($this->status);
    }
    
}
