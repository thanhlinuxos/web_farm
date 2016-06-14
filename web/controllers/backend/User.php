<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 25;
        $this->data['limit_short'] = 13;
    }

    public function index() 
    {
        //Reset search
        $this->session->set_userdata('user_search', array('keyword' => '', 'branch_id' => ''));
        //Get config for pagination
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/user/page');
        $config['total_rows'] = $this->user_model->count_all(array('deleted' => 0));
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
        $this->data['rows'] = $this->user_model->get_rows($conditions);
        $this->data['branches'] = $this->branch_model->get_rows();
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/user/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
        //print_r($this->user_model->all_query());
    }
    
    public function search()
    {
        if($this->input->post('submit')) {
            $post = $this->input->post();
            $this->session->set_userdata('user_search', array('keyword' => $post['keyword'], 'branch_id' => $post['branch_id']));
        }
        $user_search = $this->session->userdata('user_search');
        //Query string
        $sql_like = $user_search['keyword'] ? "(`username` LIKE '%".$user_search['keyword']."%' ESCAPE '!' OR  `fullname` LIKE '%".$user_search['keyword']."%' ESCAPE '!' ) AND " : '';
        $sql_where = $user_search['branch_id'] ? "branch_id = '".$user_search['branch_id']."' AND " : '';
        //Count
        $count_all = $this->user_model->get_query("SELECT COUNT(id) FROM th_users WHERE $sql_like $sql_where deleted = 0", FALSE);
        //Pagination
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/user/search/page');
        $config['total_rows'] = $count_all['COUNT(id)'];
        $config['per_page'] = $this->data['per_page'];
        $config['uri_segment'] = 5;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        //List
        $offset = $this->uri->segment(5) ? ($this->uri->segment(5) - 1)*$config['per_page'] : 0;
        $this->data['rows'] = $this->user_model->get_query("SELECT id FROM th_users WHERE $sql_like $sql_where deleted = 0 LIMIT ".$config['per_page']." OFFSET " . $offset);

        $this->data['branches'] = $this->branch_model->get_rows();
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/user/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function add() {
        $this->data['row'] = $this->user_model->default_value(); 
        //Permission
        $permission = $this->config->item('permission');
        $this->data['permission_group'] = $permission[$this->data['row']['group']];
        
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('branch_id', $this->lang->line('branch_name'), 'required|numeric');
            $this->form_validation->set_rules('fullname', $this->lang->line('user_fullname'), 'required');
            $this->form_validation->set_rules('email', $this->lang->line('user_email'), 'valid_email|is_unique[th_users.email]');
            $this->form_validation->set_rules('username', $this->lang->line('user_username'), 'is_unique[th_users.username]');
            if($post['username'] != '')
            {
                $this->form_validation->set_rules('password', $this->lang->line('user_password'), 'required');
            }
            
            //Permission
            if(isset($post['permissions']))
            {
                $tmp = array();
                foreach ($post['permissions'] as $permission) {

                    $permission = explode('-', $permission);

                    if(isset($tmp[$permission[0]])){
                        $tmp[$permission[0]] .= '|'.$permission[1];
                    } else {
                        $tmp[$permission[0]] = $permission[1];
                    }
                }
                $post['permission'] = serialize($tmp);
            }
                
            if ($this->form_validation->run() == TRUE)
            {
                $success = TRUE;
                //Image
                if($_FILES['image']['name']) {
                    $this->load->library('image_mylib');
                    $image = $this->image_mylib->upload_one('image', 'user', NULL, array('width'=>256, 'height'=>256));
                    if(isset($image['error'])) {
                        $this->data['image_error'] = $image['error'];
                        $success = FALSE;
                    } else {
                        $post['image'] = $image['file_name'];
                    }
                }
                //Continue
                if($success) {
                    //More data
                    $post['password'] = md5(md5($post['password']));
                    $post['change_password'] = 1;
                    $post['created_at'] = time();

                    $result = $this->user_model->insert($post);
                    if($result)
                    {
                        $user_id = $this->user_model->insert_id();
                        //Logs
                        $user = $this->user_model->get_by($user_id);
                        $this->logs_model->write('user_add', $user);
                        //Redirect
                        $this->session->set_flashdata('msg_success', $this->lang->line('user_has_been_created'));
                        redirect('/acp/user/show/'.$user_id);
                    }                
                }
            }
            $this->data['row'] = $this->user_model->convert_data($post);
            //Permission
            $this->data['permission_group'] = (isset($this->data['row']['permission'])) ? unserialize($this->data['row']['permission']) : array();
        }
        $this->data['branchs'] = $this->branch_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/user/add', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function show($id = 0) {
        $user = $this->user_model->get_by($id);
        if(!$user){
            $this->session->set_flashdata('msg_error', $this->lang->line('user_not_exist'));
            redirect(base_url('acp/user'));
        }
        $this->data['row'] = $this->user_model->convert_data($user);
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/user/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function edit($id = 0) {
        $user = $this->user_model->get_by($id);
        if(!$user){
            $this->session->set_flashdata('msg_error', $this->lang->line('user_not_exist'));
            redirect(base_url('acp/user'));
        }
        $this->data['row'] = $this->user_model->convert_data($user);
        
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('branch_id', $this->lang->line('branch_name'), 'required|numeric');
            $this->form_validation->set_rules('fullname', $this->lang->line('user_fullname'), 'required');
            if($post['email'] != $user['email']) {
                $this->form_validation->set_rules('email', $this->lang->line('user_email'), 'valid_email|is_unique[th_users.email]');
            }
            if($post['username'] != $user['username']) {
                $this->form_validation->set_rules('username', $this->lang->line('user_username'), 'is_unique[th_users.username]');
            }
            if($post['username'] != $user['username'] && $post['username'] != '')
            {
                $this->form_validation->set_rules('password', $this->lang->line('user_password'), 'required');
            }
            
            //Permission
            if(isset($post['permissions']))
            {
                $tmp = array();
                foreach ($post['permissions'] as $permission) {

                    $permission = explode('-', $permission);

                    if(isset($tmp[$permission[0]])){
                        $tmp[$permission[0]] .= '|'.$permission[1];
                    } else {
                        $tmp[$permission[0]] = $permission[1];
                    }
                }
                $post['permission'] = serialize($tmp);
            }
            
            if ($this->form_validation->run() == TRUE)
            {
                $success = TRUE;
                //Image
                if($_FILES['image']['name']) {
                    $this->load->library('image_mylib');
                    $image = $this->image_mylib->upload_one('image', 'user', NULL, array('width'=>256, 'height'=>256));
                    if(isset($image['error'])) {
                        $this->data['image_error'] = $image['error'];
                        $success = FALSE;
                    } else {
                        $post['image'] = $image['file_name'];
                    }
                }
                //Continue
                if($success) {
                    $post['id'] = $user['id'];
                    if($post['password'] != '')
                    {
                        $post['password'] = md5(md5($post['password']));
                        $post['change_password'] = 1;
                    }
                    else
                    {
                        $post['password'] = $user['password'];
                    }
                    $result = $this->user_model->update($post);
                    if($result)
                    {
                        //Logs
                        $this->logs_model->write('user_edit', $post, $user);
                        //Redirect
                        $this->session->set_flashdata('msg_success', $this->lang->line('user_has_been_updated'));
                        redirect('/acp/user/show/'.$user['id']);
                    }
                }
            }
            $this->data['row'] = $this->user_model->convert_data($post);
        }
        
        //Permission
        $this->data['permission_group'] = (isset($this->data['row']['permission'])) ? unserialize($this->data['row']['permission']) : array();
        
        $this->data['branchs'] = $this->branch_model->get_rows(array('where' => array('deleted' => 0), 'sort_by' => 'id ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/user/edit', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function delete($id = 0) {
        $user = $this->user_model->get_by($id);
        if(!$user){
            $this->session->set_flashdata('msg_error', $this->lang->line('user_not_exist'));
            redirect(base_url('acp/user'));
        }
        $result = $this->user_model->delete($id);
        if($result) {
            //Logs
            $this->logs_model->write('user_delete', $user);
        }
        $this->session->set_flashdata('msg_info', $this->lang->line('user_has_been_deleted'));
        redirect(base_url('acp/user'));
    }

    public function delete_multi() {
        
    }
    
    public function short_list() 
    {
        $conditions = array(
            'select' => 'id, fullname, username, group',
            'where' => array('deleted' => 0),
            'sort_by' => 'id DESC',
            'limit' => $this->data['limit_short'],
            'offset' => isset($_POST['page']) ? ($_POST['page'] - 1)*$this->data['limit_short'] : 0
        );
        $this->data['rows'] = $this->user_model->get_rows($conditions);
         
        $count_all = $this->user_model->count_all(array('deleted' => 0));
        $this->data['btn_next'] = $this->data['btn_prev'] = FALSE;
        if($_POST['page'] > 1)
        {
            if(ceil($count_all/$this->data['limit_short']) > $_POST['page'])
            {
                $this->data['btn_next'] = $_POST['page'] + 1;
            }
            $this->data['btn_prev'] = $_POST['page'] - 1;
        }
        else
        {
            $this->data['btn_next'] = $_POST['page'] + 1;
        }
       
        
        $this->load->view('backend/user/short_list', $this->data);    
    }

}
