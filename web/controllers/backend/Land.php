<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Land extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 25;
    }
    
    public function index()
    {
        //Reset search
        $this->session->set_userdata('land_search', array('keyword' => '' , 'branch_id' => ''));
        //Get config for pagination
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/land/page');
        $config['total_rows'] = $this->land_model->count_all(array('deleted' => 0));
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
        
        $this->data['rows'] = $this->land_model->get_rows($conditions);
        $this->data['branches'] = $this->branch_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/land/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function search()
    {
        if($this->input->get('branch_id')) {
            $this->session->set_userdata('land_search', array('keyword' => '' , 'branch_id' => $this->input->get('branch_id')));
        }
        if($this->input->post('submit')) {
            $post = $this->input->post();
            $this->session->set_userdata('land_search', array('keyword' => $post['keyword'] , 'branch_id' => $post['branch_id']));
        }
        $land_search = $this->session->userdata('land_search');
        //Query string
        $sql_like = $land_search['keyword']?"(`name` LIKE '%".$land_search['keyword']."%' ESCAPE '!' ) AND " : "";
        $sql_where = $land_search['branch_id'] ? "branch_id = '".$land_search['branch_id']."' AND " : '';
        //Count
        $count_all = $this->land_model->get_query("SELECT COUNT(id) FROM ".$this->db->dbprefix."lands WHERE $sql_like $sql_where deleted = 0", FALSE);
         //Pagination
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/land/search/page');
        $config['total_rows'] = $count_all['COUNT(id)'];
        $config['per_page'] = $this->data['per_page'];
        $config['uri_segment'] = 5;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        //list
        $offset = $this->uri->segment(5) ? ($this->uri->segment(5) - 1)*$config['per_page'] : 0;
        $this->data['rows'] = $this->land_model->get_query("SELECT id FROM ".$this->db->dbprefix."lands WHERE $sql_like $sql_where deleted = 0 LIMIT ".$config['per_page']." OFFSET " . $offset);

        $this->data['branches'] = $this->branch_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/land/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function add()
    {
        $this->data['row'] = $this->land_model->default_value(); 
         
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('branch_id', $this->lang->line('branch_name'), 'required|numeric');
            $this->form_validation->set_rules('name', $this->lang->line('land_name'), 'required');
            $this->form_validation->set_rules('axis_x', $this->lang->line('land_axis_x'), 'required');
            $this->form_validation->set_rules('axis_y', $this->lang->line('land_axis_y'), 'required');
            
            if ($this->form_validation->run() == TRUE)
            {
                $success = TRUE;
                //Image
                if($_FILES['image']['name']) {
                    $this->load->library('image_mylib');
                    $image = $this->image_mylib->upload_one('image', 'land', NULL, NULL);
                    if(isset($image['error'])) {
                        $this->data['image_error'] = $image['error'];
                        $success = FALSE;
                    } else {
                        $post['image'] = $image['file_name'];
                    }
                } else {
                    $this->data['image_error'] = $this->lang->line('land_please_select_image');
                    $success = FALSE;
                }
                //Continue
                if($success) {
                    $post['created_at'] = now();
                    $result = $this->land_model->insert($post);
                    if($result)
                    {
                        $land_id = $this->land_model->insert_id();
                        //Logs
                        $land = $this->land_model->get_by($land_id);
                        $this->logs_model->write('land_add', $land);
                        //Redirect
                        $this->session->set_flashdata('msg_success', $this->lang->line('land_has_been_created'));
                        redirect('/acp/land/show/'.$land_id);
                    }                
                }
                $this->data['row'] = $this->land_model->convert_data($post);
            }
        }
        
        $this->data['branchs'] = $this->branch_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/land/add', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function show($id = 0)
    {
        $land = $this->land_model->get_by($id);
        if(!$land){
            $this->session->set_flashdata('msg_error', $this->lang->line('land_not_exist'));
            redirect(base_url('acp/land'));
        }
        $this->data['row'] = $this->land_model->convert_data($land);
        $this->data['row_branch'] = $this->branch_model->get_by(array('id' => $land['branch_id']));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/land/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    function edit($id = 0)
    {
        $land = $this->land_model->get_by($id);
        if(!$land){
            $this->session->set_flashdata('msg_error', $this->lang->line('land_not_exist'));
            redirect(base_url('acp/land'));
        }
        
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('branch_id', $this->lang->line('branch_name'), 'required|numeric');
            $this->form_validation->set_rules('name', $this->lang->line('land_name'), 'required');
            $this->form_validation->set_rules('axis_x', $this->lang->line('land_axis_x'), 'required');
            $this->form_validation->set_rules('axis_y', $this->lang->line('land_axis_y'), 'required');
            
            if ($this->form_validation->run() == TRUE)
            {
                $success = TRUE;
                //Image
                if($_FILES['image']['name']) {
                    $this->load->library('image_mylib');
                    $image = $this->image_mylib->upload_one('image', 'land', NULL, NULL);
                    if(isset($image['error'])) {
                        $this->data['image_error'] = $image['error'];
                        $success = FALSE;
                    } else {
                        $post['image'] = $image['file_name'];
                        unlink(UPLOADPATH.'land/'.$land['image']);
                    }
                }
                
                //Continue
                if($success) {
                    $post['id'] = $id;
                    $result = $this->land_model->update($post);
                    if($result)
                    {
                        //Logs
                        $this->logs_model->write('land_edit', $post, $land);
                        //Redirect
                        $this->session->set_flashdata('msg_success', $this->lang->line('user_has_been_updated'));
                        redirect('/acp/land/show/'.$id);
                    }                
                }
            }
        }
        
        $this->data['row'] = $this->land_model->convert_data($land);
        $this->data['branchs'] = $this->branch_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/land/edit', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function delete($id = 0) {
        $land = $this->land_model->get_by($id);
        if(!$land){
            $this->session->set_flashdata('msg_error', $this->lang->line('land_not_exist'));
            redirect(base_url('acp/land'));
        }
        $result = $this->land_model->delete($id);
        if($result) {
            //Logs
            $this->logs_model->write('land_delete', $land);
        }
        $this->session->set_flashdata('msg_info', $this->lang->line('land_has_been_deleted'));
        redirect(base_url('acp/land'));
    }
    
    public function sortable($id = 0)
    {
        $land = $this->land_model->get_by($id);
        if(!$land){
            if( $this->input->method(TRUE) == 'POST') {
                $this->output->response(array('success' => FALSE, 'msg' => $this->lang->line('land_not_exist')));
            } else {
                $this->session->set_flashdata('msg_error', $this->lang->line('land_not_exist'));
                redirect(base_url('acp/land'));
            }
        }
        
        if( $this->input->method(TRUE) == 'POST')
        {
            $rows = $this->input->post('row');
            foreach ($rows as $k => $v) {
                $duple = $this->duple_model->get_by($v);
                if($duple) {
                    $duple['ordinal'] = $k + 1;
                    $this->duple_model->update($duple);
                }
            }
            $this->output->response(array('success' => TRUE, 'msg' => 'Sap xep doi thanh cong'));
        }
        $this->data['land'] = $land;
        $this->data['duples'] = $this->duple_model->get_rows(array('where' => array('land_id' => $id), 'sort_by' => 'ordinal ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/land/sortable', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function li_list()
    {
        $post = $this->input->post();
        $branch_id = isset($post['branch_id']) ? $post['branch_id'] : 0;
        $this->data['rows'] = $this->land_model->get_rows(array('where' => array('branch_id' => $branch_id)));
        $this->load->view('backend/land/li_list', $this->data);
    }
    
}
