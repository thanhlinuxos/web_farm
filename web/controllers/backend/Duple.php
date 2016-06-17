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
            'select' => 'id',
            'where' => array('deleted' => 0),
            'sort_by' => 'id DESC',
            'limit' => $config['per_page'],
            'offset' => $this->uri->segment(4) ? ($this->uri->segment(4) - 1)*$config['per_page'] : 0
        );
        
        $rows = $this->duple_model->get_rows($conditions);
        $this->data['rows'] = $rows;
        $this->data['branches'] = $this->branch_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/duple/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function search()
    {
        if($this->input->get('land_id')) {
            $this->session->set_userdata('duple_search', array('keyword' => '' , 'branch_id' => '', 'land_id' => $this->input->get('land_id')));
        }
        if($this->input->post('submit')) {
            $post = $this->input->post();
            $this->session->set_userdata('duple_search', array('keyword' => $post['keyword'] , 'branch_id' => $post['branch_id'], 'land_id' => $post['land_id']));
        }
        $duple_search = $this->session->userdata('duple_search');
        //Query string
        $sql_like = $duple_search['keyword']?"(`name` LIKE '%".$duple_search['keyword']."%' ESCAPE '!' ) AND " : "";
        $sql_where = '';
        
        if($duple_search['branch_id']) {
            $land_arr = $this->land_model->get_rows(array('select' => 'id', 'where' => array('branch_id' => $duple_search['branch_id'])));
            $sql_where .= 'land_id IN ( ';
            foreach ($land_arr as $arr) {
                $sql_where .= $arr['id'].',';
            }
            
            $sql_where = substr($sql_where, 0, -1);
            $sql_where .= ') AND';
            //print_r($sql_where);
        }
        $sql_where = $duple_search['land_id'] ? "land_id = '".$duple_search['land_id']."' AND " : '';
        //Count
        $count_all = $this->land_model->get_query("SELECT COUNT(id) FROM ".$this->db->dbprefix."duples WHERE $sql_like $sql_where deleted = 0", FALSE);
         //Pagination
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/duple/search/page');
        $config['total_rows'] = $count_all['COUNT(id)'];
        $config['per_page'] = $this->data['per_page'];
        $config['uri_segment'] = 5;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        //list
        $offset = $this->uri->segment(5) ? ($this->uri->segment(5) - 1)*$config['per_page'] : 0;
        $this->data['rows'] = $this->land_model->get_query("SELECT id FROM ".$this->db->dbprefix."duples WHERE $sql_like $sql_where deleted = 0 LIMIT ".$config['per_page']." OFFSET " . $offset);

        $this->data['branches'] = $this->branch_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->data['lands'] = $this->land_model->get_rows(array('where' => array('branch_id' => $duple_search['branch_id']), 'sort_by' => 'id ASC'));
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
                    $duple_id = $this->duple_model->insert_id();
                    //Logs
                    $duple = $this->duple_model->get_by($duple_id);
                    $this->logs_model->write('duple_add', $duple);
                    //Redirect
                    $this->session->set_flashdata('msg_success', $this->lang->line('duple_has_been_created'));
                    redirect('/acp/duple/show/'.$duple_id);
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
                    //Logs
                    $this->logs_model->write('duple_edit', $post, $duple);
                    //Redirect
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
        if($result) {
            //Logs
            $this->logs_model->write('duple_delete', $duple);
        }
        $this->session->set_flashdata('msg_info', $this->lang->line('duple_has_been_deleted'));
        redirect(base_url('acp/duple'));
    }
    
    public function li_list()
    {
        $post = $this->input->post();
        $land_id = isset($post['land_id']) ? $post['land_id'] : 0;
        $this->data['rows'] = $this->duple_model->get_rows(array('where' => array('land_id' => $land_id)));
        $this->load->view('backend/duple/li_list', $this->data);
    }
    
}
