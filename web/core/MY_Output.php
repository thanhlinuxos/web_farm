<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Output Class
 *
 * CodeIgniter will be assigned to.
 *
 * @package	CodeIgniter
 * @subpackage	Core Output
 * @category	My Output
 * @author	Thanh Nguyen
 */

class MY_Output extends CI_Output
{
    public $mime_type = 'application/json';
    
    public $charset = 'UTF-8';

    public $status = 200;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function response($data = array(), $mime_type = NULL, $charset = NULL, $status = NULL)
    {
        if($mime_type !== NULL) {
            $this->mime_type = $mime_type;
        }
        
        switch ($this->mime_type)
        {
            case 'application/json':
                $out = $this->set_output(json_encode($data));
                break;
            default :
                show_error("Response must be have MIME TYPE!");
        }
        
        $this->set_status_header($this->status);
        $this->set_content_type($this->mime_type, $this->charset);
        echo $out->final_output;
        exit($this->status);
    }
}