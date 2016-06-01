<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logs extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 100;
    }
    public function index()
    {
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/logs/page');
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
        
        $rows = $this->logs_model->get_rows($conditions);
        $this->data['rows'] = $rows;
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/logs/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
   
    public function show($id = 0)
    {
        $logs = $this->logs_model->get_by($id);
        if(!$logs)
        {
           $this->session->set_flashdata('msg_success', $this->lang->line('logs_not_exist'));
           redirect('/acp/logs'); 
        }
        $this->data['row'] = $this->logs_model->convert_data($logs);
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/logs/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
}
