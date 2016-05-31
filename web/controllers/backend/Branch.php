<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Branch extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['limit_short'] = 13;
        $this->load->model('branch_model');
    }
    public function index(){
        $this->load->library('pagination_mylib');
        
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/branch/page');
        $config['total_rows'] = $this->branch_model->count_all(array('deleted' => 0));
        $config['per_page'] = 2;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $conditions = array(
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
                $result = $this->branch_model->insert($post);
                if($result)
                {
                    redirect('/acp/branch/show/'.$this->branch_model->insert_id());
                }
            }
        }
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/branch/add', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function show($id = NULL)
    {
        $branch = $this->branch_model->get_by(array('id' => $id));
        if(!$branch){
            redirect(base_url('acp/branch'));
        }
        $this->data['row'] = $branch;
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/branch/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    public function edit($id = NULL)
    {
        $branch = $this->branch_model->get_by(array('id' => $id));
        if(!$branch)
        {
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
                    redirect('/acp/branch/show/'.$id);
                }
           }
        }
        
        $this->data['row'] = $branch;
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/branch/edit', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function delete($id = NULL) {
        $branch = $this->branch_model->get_by(array('id' => $id));
        if(!$branch){
            redirect(base_url('acp/branch'));
        }
        $result = $this->branch_model->delete(array('id' => $id));
        redirect(base_url('acp/branch'));
    }
}

