<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Whisper extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 25;
    }
    public function index()
    {
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/whisper/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function add()
    {
        $this->data['row'] = $this->whisper_model->default_value();
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('receive[]', $this->lang->line('branch_name'), 'required');
            $this->form_validation->set_rules('content', $this->lang->line('branch_name'), 'required');
            if($this->form_validation->run() == TRUE)
            {
                
            }
            
            $this->data['row'] = $post;
        }
        $this->data['users'] = $this->user_model->get_rows(array('select' => 'id, fullname, username', 'where' => array('group !=' => 'employee')));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/whisper/add', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function delete()
    {
        
    }
}