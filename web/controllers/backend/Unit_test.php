<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Unit_test extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
    }

    public function index() 
    {
        $this->test1();
        $this->test2();

        $this->load->view('backend/unit_test');
    }
    
    private function test1()
    {
        $test = 1 + 1;

        $expected_result = 2;

        $test_name = 'Adds one plus one';

        $this->unit->run($test, $expected_result, $test_name);
    }
    
    private function test2()
    {
        $test = 21 + 21;

        $expected_result = 2;

        $test_name = 'Adds one plus one2';

        $this->unit->run($test, $expected_result, $test_name);
    }
}