<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Land extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 25;
    }
    
    public function index()
    {
        $this->load->library('pagination_mylib');
        
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/land/page');
        $config['total_rows'] = $this->land_model->count_all(array('deleted' => 0));
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
        
        $rows = $this->land_model->get_rows($conditions);
        $this->data['rows'] = $rows;
        
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
                }
                else {
                        $this->data['image_error'] = $this->lang->line('land_please_select_image');
                        $success = FALSE;
                }
                //Continue
                if($success) {
                    $result = $this->land_model->insert($post);
                    if($result)
                    {
                        $this->session->set_flashdata('msg_success', $this->lang->line('land_has_been_created'));
                        redirect('/acp/land/show/'.$this->land_model->insert_id());
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
        $branch = $this->branch_model->get_by(array('id' => $land['branch_id']));
        if(!$land){
            $this->session->set_flashdata('msg_error', $this->lang->line('land_not_exist'));
            redirect(base_url('acp/land'));
        }
        $this->data['row'] = $this->land_model->convert_data($land);
        $this->data['row_branch'] = $branch;
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
                else {
                     //$post['image'] = $land['image'] ;
                }
                //Continue
                if($success) {
                    $post['id'] = $id;
                    $result = $this->land_model->update($post);
                    if($result)
                    {
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
        $this->session->set_flashdata('msg_info', $this->lang->line('land_has_been_deleted'));
        redirect(base_url('acp/land'));
    }
    
}
