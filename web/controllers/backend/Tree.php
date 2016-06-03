<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tree extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 25;
    }
    public function index()
    {
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/tree/page');
        $config['total_rows'] = $this->logs_model->count_all(array('deleted' => 0));
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
        $this->data['rows'] = $this->tree_model->get_rows($conditions);
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/tree/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function add()
    {
        $this->data['row'] = $this->tree_model->default_value(); 
        
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('branch_id', $this->lang->line('branch_name'), 'required|numeric');
            $this->form_validation->set_rules('land_id', $this->lang->line('land_name'), 'required|numeric');
            $this->form_validation->set_rules('duple_id', $this->lang->line('duple_name'), 'required|numeric');
            $this->form_validation->set_rules('row_id', $this->lang->line('row_name'), 'required|numeric');
            $this->form_validation->set_rules('quantity', $this->lang->line('tree_quantity'), 'required|numeric|greater_than[0]');
            
            if($this->form_validation->run() == TRUE)
            {
                $result = $this->tree_model->create_tree($post);
                if($result)
                {
                    //Logs
                    $this->logs_model->write('tree_add', $result);
                    //Redirect   
                    $this->session->set_flashdata('msg_success', $this->lang->line('tree_has_been_created'));
                    redirect('/acp/tree/search?row_id='.$post['row_id']);
                }
            }
            print_r($post);
            $this->data['row'] = $this->tree_model->convert_data($post);
        }
        $this->data['branchs'] = $this->branch_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->data['lands'] = $this->land_model->get_rows(array('where' => array('branch_id' => $this->data['row']['branch_id'], 'deleted' => 0), 'sort_by' => 'id ASC'));
        $this->data['duples'] = $this->duple_model->get_rows(array('where' => array('land_id' => $this->data['row']['land_id'], 'deleted' => 0), 'sort_by' => 'id ASC'));
        $this->data['rows'] = $this->row_model->get_rows(array('where' => array('duple_id' => $this->data['row']['duple_id'], 'deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/tree/add', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
}