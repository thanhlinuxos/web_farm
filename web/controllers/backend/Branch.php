<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Branch extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 25;
    }
    public function index()
    {
        //Get config for pagination
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/branch/page');
        $config['total_rows'] = $this->branch_model->count_all(array('deleted' => 0));
        $config['per_page'] = $this->data['per_page'];
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $conditions = array(
            'select' => 'id',
            'where' => array('deleted' => 0),
            'sort_by' => 'id DESC',
            'limit' => $config['per_page'],
            'offset' => $this->uri->segment(4) ? ($this->uri->segment(4) - 1)*$config['per_page'] : 0
        );
        
        $this->data['rows'] = $this->branch_model->get_rows($conditions);
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/branch/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function add(){
        $this->data['row'] = $this->branch_model->default_value();
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('name', $this->lang->line('branch_name'), 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $post['created_at'] = now();
                $result = $this->branch_model->insert($post);
                if($result)
                {
                    $branch_id = $this->branch_model->insert_id();
                    //Logs
                    $branch = $this->branch_model->get_by($branch_id);
                    $this->logs_model->write('branch_add', $branch);
                    //Redirect   
                    $this->session->set_flashdata('msg_success', $this->lang->line('branch_has_been_created'));
                    redirect('/acp/branch/show/'.$branch_id);
                }
            }
        }
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/branch/add', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function show($id = 0)
    {
        $branch = $this->branch_model->get_by($id);
        if(!$branch){
            $this->session->set_flashdata('msg_error', $this->lang->line('branch_not_exist'));
            redirect(base_url('acp/branch'));
        }
        $this->data['row'] = $branch;
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/branch/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    public function edit($id = 0)
    {
        $branch = $this->branch_model->get_by($id);
        if(!$branch)
        {
            $this->session->set_flashdata('msg_error', $this->lang->line('branch_not_exist'));
            redirect(base_url('acp/branch'));
        }
        if($this->input->post('submit'))
        {
           $post = $this->input->post();
           $this->form_validation->set_rules('name', $this->lang->line('branch_name'), 'required'); 
           if($this->form_validation->run() == TRUE)
           {
                $post['id'] = $id;
                $result = $this->branch_model->update($post);
                if($result)
                {
                    //Logs
                    $this->logs_model->write('branch_edit', $post, $branch);
                    //Redirect
                    $this->session->set_flashdata('msg_success', $this->lang->line('branch_has_been_updated'));
                    redirect('/acp/branch/show/'.$id);
                }
           }
        }
        
        $this->data['row'] = $branch;
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/branch/edit', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function delete($id = 0) {
        $branch = $this->branch_model->get_by($id);
        if(!$branch){
            $this->session->set_flashdata('msg_success', $this->lang->line('branch_not_exist'));
            redirect(base_url('acp/branch'));
        }
        $result = $this->branch_model->delete_data($id);
        if($result) {
            //Logs
            $this->logs_model->write('branch_delete', $branch);
        }
        $this->session->set_flashdata('msg_success', $this->lang->line('branch_has_been_deleted'));
        redirect(base_url('acp/branch'));
    }
}

