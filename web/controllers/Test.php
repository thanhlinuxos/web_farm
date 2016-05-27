<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    private $data = array();
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->input->post('submit'))
        {
            $this->load->library('image_mylib');
            $data = $this->image_mylib->upload_multi('test', 'test/test');
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            
        }
        $this->load->view('test', $this->data);
    }
}
