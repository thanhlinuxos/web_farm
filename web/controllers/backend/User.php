<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('backend/layout/header');
        $this->load->view('backend/user/index');
        $this->load->view('backend/layout/footer');
    }

    public function add() {
        $this->load->view('backend/layout/header');
        $this->load->view('backend/user/add');
        $this->load->view('backend/layout/footer');
    }

    public function show($id = NULL) {
        $this->load->view('backend/layout/header');
        $this->load->view('backend/user/show');
        $this->load->view('backend/layout/footer');
    }

    public function edit($id = NULL) {
        $this->load->view('backend/layout/header');
        $this->load->view('backend/user/edit');
        $this->load->view('backend/layout/footer');
    }

    public function delete() {
        
    }

    public function delete_multi() {
        
    }

}
