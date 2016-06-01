<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Duple extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 25;
    }
    public function index()
    {
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/duple/page');
        $config['total_rows'] = $this->duple_model->count_all(array('deleted' => 0));
        $config['per_page'] = $this->data['per_page'];
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $conditions = array(
            'where' => array('deleted' => 0),
            'sort_by' => 'id DESC',
            'limit' => $config['per_page'],
            'offset' => $this->uri->segment(4) ? ($this->uri->segment(4) - 1)*$config['per_page'] : 0
        );
        
        $rows = $this->duple_model->get_rows($conditions);
        $this->data['rows'] = $rows;
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/duple/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    public function add()
    {
        $this->data['row'] = $this->duple_model->default_value();
        
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('land_id', $this->lang->line('land_name'), 'required|numeric');
            $this->form_validation->set_rules('name', $this->lang->line('duple_name'), 'required');
            $this->form_validation->set_rules('ordinal', $this->lang->line('duple_ordinal'), 'required');
            if ($this->form_validation->run() == TRUE)
            {
                $post['ordinal'] = $post['ordinal'] ? $post['ordinal'] :$this->duple_model->next_id(); 
                $result = $this->duple_model->insert($post);
                if($result)
                {
                    $this->session->set_flashdata('msg_success', $this->lang->line('duple_has_been_created'));
                    redirect('/acp/duple/show/'.$this->duple_model->insert_id());
                }
            }
        }
        $this->data['lands'] = $this->land_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/duple/add', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function show($id = 0)
    {
        $duple = $this->duple_model->get_by($id);
        if(!$duple)
        {
           $this->session->set_flashdata('msg_success', $this->lang->line('duple_not_exist'));
           redirect('/acp/duple'); 
        }
        $this->data['row'] = $duple;
        $this->data['land'] = $this->land_model->get_by($duple['land_id']);
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/duple/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function edit($id = 0)
    {
        $duple = $this->duple_model->get_by($id);
        if(!$duple)
        {
           $this->session->set_flashdata('msg_success', $this->lang->line('duple_not_exist'));
           redirect('/acp/duple'); 
        }
        
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('land_id', $this->lang->line('land_name'), 'required|numeric');
            $this->form_validation->set_rules('name', $this->lang->line('duple_name'), 'required');
            $this->form_validation->set_rules('ordinal', $this->lang->line('duple_ordinal'), 'required');
            if ($this->form_validation->run() == TRUE)
            {
                $post['id'] = $id;
                $result = $this->duple_model->update($post);
                if($result)
                {
                    $this->session->set_flashdata('msg_success', $this->lang->line('duple_has_been_update'));
                    redirect('/acp/duple/show/'.$id);
                }
            }
        }
        
        $this->data['row'] = $duple;
        $this->data['lands'] = $this->land_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/duple/edit', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function delete($id = 0) {
        $duple = $this->duple_model->get_by($id);
        if(!$duple)
        {
           $this->session->set_flashdata('msg_success', $this->lang->line('duple_not_exist'));
           redirect('/acp/duple'); 
        }
        $result = $this->duple_model->delete($id);
        $this->session->set_flashdata('msg_info', $this->lang->line('duple_has_been_deleted'));
        redirect(base_url('acp/duple'));
    }
    
}
