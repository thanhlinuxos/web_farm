<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    
    private $data = array();

    public function __construct() {
        parent::__construct();
        $this->lang->load('backend');
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
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[th_users.email]');
            $this->form_validation->set_rules('username', 'Username', 'is_unique[th_users.username]');
            
            if ($this->form_validation->run() == TRUE)
            {
                $post = $this->input->post();
                $post['password'] = md5(md5($post['password']));
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
            if ($this->form_validation->run() == TRUE)
            {
                $post['id'] = $user['id'];
                $post['password'] = ($post['password'] != '')? md5(md5($post['password'])) : $user['password'];
                $result = $this->user_model->update($post);
                if($result)
                {
                    $this->session->set_flashdata('msg_success', 'Update user successful.');
                    redirect('/acp/user/show/'.$user['id']);
                }
                
            }
            $this->data['row'] = $this->input->post();
        }
        
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

}
