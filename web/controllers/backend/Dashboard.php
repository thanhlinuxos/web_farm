<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/layout/dashboard', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

}
