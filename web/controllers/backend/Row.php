<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Row extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 25;
    }
    
    public function index()
    {
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/row/page');
        $config['total_rows'] = $this->row_model->count_all(array('deleted' => 0));
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
        
        $rows = $this->row_model->get_rows($conditions);
        $this->data['rows'] = $rows;
        
        $this->data['duples'] = $this->duple_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/row/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function search()
    {
        if($this->input->get('duple_id')) {
            $this->session->set_userdata('row_search', array('keyword' => '' , 'duple_id' => $this->input->get('duple_id')));
        }
        if($this->input->post('submit')) {
            $post = $this->input->post();
            $this->session->set_userdata('row_search', array('keyword' => $post['keyword'] , 'duple_id' => $post['duple_id']));
        }
        $row_search = $this->session->userdata('row_search');
        //Query string
        $sql_like = $row_search['keyword']?"(`name` LIKE '%".$row_search['keyword']."%' ESCAPE '!' ) AND " : "";
        $sql_where = $row_search['duple_id'] ? "duple_id = '".$row_search['duple_id']."' AND " : '';
        //Count
        $count_all = $this->row_model->get_query("SELECT COUNT(id) FROM ".$this->db->dbprefix."rows WHERE $sql_like $sql_where deleted = 0", FALSE);
         //Pagination
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/row/search/page');
        $config['total_rows'] = $count_all['COUNT(id)'];
        $config['per_page'] = $this->data['per_page'];
        $config['uri_segment'] = 5;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        //list
        $offset = $this->uri->segment(5) ? ($this->uri->segment(5) - 1)*$config['per_page'] : 0;
        $this->data['rows'] = $this->row_model->get_query("SELECT id FROM ".$this->db->dbprefix."rows WHERE $sql_like $sql_where deleted = 0 LIMIT ".$config['per_page']." OFFSET " . $offset);

        $this->data['duples'] = $this->duple_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/row/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function add()
    {
        $this->data['row'] = $this->row_model->default_value();
        
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('duple_id', $this->lang->line('duple_name'), 'required|numeric');
            $this->form_validation->set_rules('name', $this->lang->line('row_name'), 'required');
            if ($this->form_validation->run() == TRUE)
            {
                $post['ordinal'] = $post['ordinal'] ? $post['ordinal'] :$this->row_model->next_id(); 
                $result = $this->row_model->insert($post);
                if($result)
                {
                    $row_id = $this->row_model->insert_id();
                    //Logs
                    $row = $this->row_model->get_by($row_id);
                    $this->logs_model->write('row_add', $row);
                    //Redirect
                    $this->session->set_flashdata('msg_success', $this->lang->line('row_has_been_created'));
                    redirect('/acp/row/show/'.$row_id);
                }
            }
        }
        $this->data['duples'] = $this->duple_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/row/add', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function show($id = 0)
    {
        $row = $this->row_model->get_by($id);
        if(!$row)
        {
           $this->session->set_flashdata('msg_success', $this->lang->line('row_not_exist'));
           redirect('/acp/row'); 
        }
        $this->data['row'] = $row;
        $this->data['duple'] = $this->duple_model->get_by($row['duple_id']);
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/row/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function edit($id = 0)
    {
        $row = $this->row_model->get_by($id);
        if(!$row)
        {
           $this->session->set_flashdata('msg_success', $this->lang->line('row_not_exist'));
           redirect('/acp/row'); 
        }
        
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('duple_id', $this->lang->line('duple_name'), 'required|numeric');
            $this->form_validation->set_rules('name', $this->lang->line('row_name'), 'required');
            if ($this->form_validation->run() == TRUE)
            {
                $post['id'] = $id;
                $result = $this->row_model->update($post);
                if($result)
                {
                    //Logs
                    $this->logs_model->write('row_edit', $post, $row);
                    //Redirect
                    $this->session->set_flashdata('msg_success', $this->lang->line('row_has_been_update'));
                    redirect('/acp/row/show/'.$id);
                }
            }
        }
        
        $this->data['row'] = $row;
        $this->data['duples'] = $this->duple_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/row/edit', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function delete($id = 0) {
        $row = $this->row_model->get_by($id);
        if(!$row)
        {
           $this->session->set_flashdata('msg_success', $this->lang->line('row_not_exist'));
           redirect('/acp/row'); 
        }
        $result = $this->row_model->delete($id);
        if($result) {
            //Logs
            $this->logs_model->write('duple_delete', $row);
        }
        $this->session->set_flashdata('msg_info', $this->lang->line('row_has_been_deleted'));
        redirect(base_url('acp/row'));
    }
    
    public function li_list()
    {
        $post = $this->input->post();
        $duple_id = isset($post['duple_id']) ? $post['duple_id'] : 0;
        $this->data['rows'] = $this->row_model->get_rows(array('where' => array('duple_id' => $duple_id)));
        $this->load->view('backend/row/li_list', $this->data);
    }
}

