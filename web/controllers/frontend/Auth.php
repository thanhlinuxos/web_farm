<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    private $data = array();

    public function __construct() {
        parent::__construct();
        $this->lang->load('frontend');
    }
    
    public function login() 
    {
        
        $this->load->model('capcha_model');
        
        //Check exist Login
        $user_login = $this->session->userdata('user_login');
        if($user_login)
        {
            redirect(base_url('dashboard'));
        }
        $this->data['msg'] = '';
        
         //Submit
        if($this->input->post('go'))
        {
            $this->form_validation->set_rules('u', $this->lang->line('auth_user'), 'required');
            $this->form_validation->set_rules('p', $this->lang->line('auth_pass'), 'required');
            $post = $this->input->post();
            
            if($this->form_validation->run() == TRUE)
            {
              if($this->capcha_model->validation($post['capcha']))
                {
                    $result = $this->user_model->frontend_login($post);
                    if($result['success'])
                    {
                        //$this->load->view('backend/auth/loading', array('msg' => $this->lang->line('auth_login_to_system'), 'url' => '/acp'));
                        redirect(base_url('dashboard'));
                        return true;
                    }
                    else
                    {
                        echo 'adad';
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
                        'img_path' => FCPATH . 'capcha/',
                        'img_url' => base_url('capcha'),
                        'font_path' => FCPATH . 'vendor/captcha_font/captcha5.ttf',
                        'img_width' => 140,
                        'img_height' => 45,
                        'expiration' => 300 // 5 minus
                    );
        $capcha = create_captcha($vals);
        $data = array('captcha_time' => $capcha['time'],
                        'ip_address' => $this->input->ip_address(),
                        'word' => $capcha['word']
                    );
        $this->capcha_model->insert($data);
        $this->data['capcha_image'] = $capcha['image'];
        
        $this->load->view('frontend/auth/login',$this->data);
    }
    
    public function logout() 
    {
        $this->user_model->frontend_logout();
    }
    
    public function change_password()
    {
        $user_login = $this->session->userdata('user_login');
       
        if($user_login['change_password'] == 0)
        {
            redirect(base_url('dashboard'));
        }
        
        $this->data['msg'] = $this->lang->line('auth_change_password_message');
        if($this->input->post('submit'))
        {
            $this->form_validation->setrules('p1', $this->lang->line('auth_current_pasword'), 'required');
            $this->form_validation->setrules('p2', $this->lang->line('auth_new_password'), 'required');
            $this->form_validation->setrules('p3', $this->lang->line('auth_confirm_password'), 'required|matches[p2]');
            if($this->form_validation->run() == true)
            {
                $post = $this->input->post();
                $result = $this->user_model->change_password($post['p1'], $post['p2']);
                if($result['success'])
                {
                    $this->session->set_flashdata('msg_success', $this->lang->line('auth_password_has_been_updated'));
                    redirect(base_url('dashboard'));
                }
                else
                {
                     $this->data['msg'] = "<small class='help-block' style='color:red;'>".$result['msg']."</small>";
                }
            }
        }
        $this->load->view('frontend/auth/change_password');
    }
}