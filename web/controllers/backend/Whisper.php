<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Whisper extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 25;
    }
    public function index()
    {
        $USER_LOGIN = $this->session->userdata('user_login');
        $condition = array(
            'select' => 'send_id',
            'distinct' => TRUE,
            'where' => array('receive_id' => $USER_LOGIN['id']),
            'sort_by' => 'id DESC'
        );
        
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/whisper/page');
        $config['total_rows'] = count($this->whisper_model->get_rows($condition));
        $config['per_page'] = $this->data['per_page'];
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        
        $condition['limit'] = $config['per_page'];
        $condition['offset']= $this->uri->segment(4) ? ($this->uri->segment(4) - 1)*$config['per_page'] : 0;
        
        $this->data['rows'] = $this->whisper_model->get_rows($condition);
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
    
    public function show($id = 0)
    {
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/whisper/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function delete()
    {
        
    }
}