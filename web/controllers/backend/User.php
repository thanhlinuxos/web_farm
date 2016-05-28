<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    
    private $data = array();

    public function __construct() {
        parent::__construct();
        $this->user_model->is_login();
        $this->lang->load('backend');
        $this->data['limit_short'] = 13;
    }

    public function index() {   
        $config = $this->pagination->bootstrap_configs();
        $config['base_url'] = base_url('acp/user/page');
        $config['total_rows'] = $this->user_model->count_all(array('deleted' => 0));
        $config['per_page'] = 25;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $conditions = array(
            'where' => array('deleted' => 0),
            'sort_by' => 'id DESC',
            'limit' => $config['per_page'],
            'offset' => $this->uri->segment(4) ? ($this->uri->segment(4) - 1)*$config['per_page'] : 0
        );
        $this->data['rows'] = $this->user_model->get_rows($conditions);
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/user/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function add() {
        $this->data['row'] = $this->user_model->default_value(); 
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[th_users.email]');
            $this->form_validation->set_rules('username', 'Username', 'is_unique[th_users.username]');
            if($post['username'] != '')
            {
                $this->form_validation->set_rules('password', 'Password', 'required');
            }
            if ($this->form_validation->run() == TRUE)
            {
                
                $post['password'] = md5(md5($post['password']));
                $post['change_password'] = 1;
                $post['created_at'] = time();
                $result = $this->user_model->insert($post);
                if($result)
                {
                    $this->session->set_flashdata('msg_success', 'Create user successful.');
                    redirect('/acp/user/show/'.$this->user_model->insert_id());
                }
                
            }
            $this->data['row'] = $this->input->post();
        }
        
        //List
        $conditions = array(
            'where' => array('deleted' => 0),
            'sort_by' => 'id DESC',
            'limit' => $this->data['limit_short'],
            'offset' => 0
        );
        $this->data['rows'] = $this->user_model->get_rows($conditions);
        $this->data['show_more'] = $this->user_model->count_all(array('deleted' => 0)) > $this->data['limit_short'] ? TRUE : FALSE;
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/user/add', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function show($id = NULL) {
        $user = $this->user_model->get_by(array('id' => $id));
        if(!$user){
            $this->session->set_flashdata('msg_error', 'User not exist.');
            redirect(base_url('acp/user'));
        }
        $this->data['row'] = $this->user_model->convert_data($user);
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/user/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function edit($id = NULL) {
        $user = $this->user_model->get_by(array('id' => $id));
        if(!$user){
            $this->session->set_flashdata('msg_error', 'User not exist.');
            redirect(base_url('acp/user'));
        }
        $this->data['row'] = $user;
        
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            if($post['email'] != $user['email']) {
                $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[th_users.email]');
            }
            if($post['username'] != $user['username']) {
                $this->form_validation->set_rules('username', 'Username', 'is_unique[th_users.username]');
            }
            if($post['username'] != $user['username'] && $post['username'] != '')
            {
                $this->form_validation->set_rules('password', 'Password', 'required');
            }
            if ($this->form_validation->run() == TRUE)
            {
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
                    $this->session->set_flashdata('msg_success', 'Update user successful.');
                    redirect('/acp/user/show/'.$user['id']);
                }
            }
            $this->data['row'] = $this->input->post();
        }
        
        //List
        $conditions = array(
            'where' => array('deleted' => 0),
            'sort_by' => 'id DESC',
            'limit' => $this->data['limit_short'],
            'offset' => 0
        );
        $this->data['rows'] = $this->user_model->get_rows($conditions);
        $this->data['show_more'] = $this->user_model->count_all(array('deleted' => 0)) > $this->data['limit_short'] ? TRUE : FALSE;
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/user/edit', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function delete($id = NULL) {
        $user = $this->user_model->get_by(array('id' => $id));
        if(!$user){
            $this->session->set_flashdata('msg_error', 'User not exist.');
            redirect(base_url('acp/user'));
        }
        $result = $this->user_model->delete(array('id' => $id));
        $this->session->set_flashdata('msg_info', 'User has been deleted.');
        redirect(base_url('acp/user'));
    }

    public function delete_multi() {
        
    }
    
    public function short_list() 
    {
        $conditions = array(
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
