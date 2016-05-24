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
        
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[th_users.email]');
            $this->form_validation->set_rules('username', 'Username', 'is_unique[th_users.username]');
            
            if ($this->form_validation->run() == TRUE)
            {
                $post = $this->input->post();
                $post['password'] = md5(md5($post['password']));
                $post['created_at'] = time();
                $result = $this->user_model->insert($post);
                if($result)
                {
                    $this->session->set_flashdata('msg_success', 'Create user successful.');
                    redirect('/acp/user/show/'.$this->user_model->insert_id());
                }
                
            }
        }
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
