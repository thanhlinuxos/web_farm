<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('backend');
    }

    public function index() {

        $this->load->view('backend/layout/header');
        $this->load->view('backend/layout/dashboard');
        $this->load->view('backend/layout/footer');
    }

}
