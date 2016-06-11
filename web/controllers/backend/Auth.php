<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    private $data = array();

    public function __construct() {
        parent::__construct();
        $this->lang->load('backend');
    }

    public function login() 
    {
        $this->load->model('capcha_model');
        
        //Check exist Login
        $user_login = $this->session->userdata('user_login');
        if($user_login)
        {
            redirect(base_url('acp'));
        }
        $this->data['msg'] = '';
        
        //Submit
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('u', $this->lang->line('auth_user'), 'required');
            $this->form_validation->set_rules('p', $this->lang->line('auth_pass'), 'required');
            $post = $this->input->post();
            
            if ($this->form_validation->run() == TRUE)
            {
                if($this->capcha_model->validation($post['capcha']))
                {

                    $result = $this->user_model->backend_login($post);
                    if($result['success'])
                    {
                        //Logs
                        $this->logs_model->write('auth_login_to_system', array('page' => 'Admin'));
                        //Loading
                        $current_uri = $this->session->userdata('current_uri');
                        $url = $current_uri ? base_url($current_uri) : base_url('acp');
                        $this->load->view('backend/auth/loading', array('msg' => $this->lang->line('auth_login_to_system'), 'url' => $url));
                        return true;
                    }
                    else
                    {
                        $this->data['msg'] = $result['msg'];
                    }
                }
                else
                {
                    $this->data['msg'] = "Mã Capcha không đúng!";
                }    
            }
                
        }
        //Render view
        $this->load->helper('captcha');
        
        $vals = array('word' => random_string('numeric', 6),
                        'img_path' => CAPTCHAPATH,
                        'img_url' => base_url('capcha'),
                        'font_path' => FCPATH . 'vendor/font/captcha/captcha5.ttf',
                        'img_width' => 160,
                        'img_height' => 34,
                        'expiration' => 300 // 5 minus
                    );
        $capcha = create_captcha($vals);
        $data = array('captcha_time' => $capcha['time'],
                        'ip_address' => $this->input->ip_address(),
                        'word' => $capcha['word']
                    );
        $this->capcha_model->insert($data);
        $this->data['capcha_image'] = $capcha['image'];
        $this->load->view('backend/auth/login', $this->data);
    }
    
    public function logout()
    {
        //Logs
        $this->logs_model->write('auth_logout_from_sytem', array('page' => 'Admin'));
        $this->user_model->logout();
        $this->load->view('backend/auth/loading', array('msg' => $this->lang->line('auth_logout_from_sytem'), 'url' => base_url('acp/login')));
    }
    
    public function change_password()
    {
        $user_login = $this->session->userdata('user_login');
        if($user_login['change_pass'] == 0)
        {
            redirect(base_url('acp'));
        }
        
        $this->data['msg'] = $this->lang->line('auth_change_password_message');
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('p1', $this->lang->line('auth_current_pasword'), 'required');
            $this->form_validation->set_rules('p2', $this->lang->line('auth_new_password'), 'required');
            $this->form_validation->set_rules('p3', $this->lang->line('auth_confirm_password'), 'required|matches[p2]');
            if ($this->form_validation->run() == TRUE)
            {
                $post = $this->input->post();
                $result = $this->user_model->change_password($post['p1'], $post['p2']);
                
                if($result['success'])
                {
                    // Logs
                    $this->logs_model->write('auth_change_password_successfully', array('page' => 'Admin'));
                    // Redirect    
                    $this->session->set_flashdata('msg_success', $this->lang->line('auth_password_has_been_updated'));
                    $url = $current_uri ? base_url($current_uri) : base_url('acp');
                    redirect($url);
                }
                else
                {
                     $this->data['msg'] = "<small class='help-block' style='color:red;'>".$result['msg']."</small>";
                }
            }
        }
        $this->load->view('backend/auth/change_password', $this->data);
    }
    
    public function group_permission()
    {
        if($this->input->post('group_name'))
        {
            $permission = $this->config->item('permission');
            $this->data['permission_group'] = $permission[$this->input->post('group_name')];
        }
        $this->load->view('backend/auth/group_permission', $this->data);
    }
    
    public function deny()
    {
        $this->load->view('backend/auth/deny', $this->data);
    }
}
