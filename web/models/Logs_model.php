<?php
class Logs_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('logs');
    }
    
    public function convert_data($data = array())
    {
        if(count($data) > 0) {
            if(isset($data['created_at'])) {
                $data['created_at_'] = date('d-m-Y H:i', $data['created_at']);
            }
            $data['action_key_'] = $this->lang->line($data['action_key']);
            $data['content_'] = wordwrap($data['content'], 120, "<br />\n", true);
        }
        return $data;
    }

    public function write($action_key, $new_data = NULL, $old_data = NULL)
    {
        if($action_key && $new_data) 
        {
            $write = FALSE;
            if($old_data == NULL) {
                $write = TRUE;
                $content = '';
                foreach ($new_data as $k => $v) {
                    $content .= '<br> ['.$k.']: '.$v;
                }
            } else {
                $content = '';
                foreach ($new_data as $k => $v) {
                    if(isset($old_data[$k]) && $old_data[$k] != $v){
                        $content .= '<br> ['.$k.']: '.$old_data[$k].' => '.$v;
                        $write = TRUE;
                    }
                }
            }
            
            if($write) {
                $user_login = $this->session->userdata('user_login');
                $this->load->library('user_agent');
                if ($this->agent->is_browser()) {
                    $agent = $this->agent->browser().' '.$this->agent->version();
                } elseif ($this->agent->is_robot()) {
                    $agent = $this->agent->robot();
                } elseif ($this->agent->is_mobile()) {
                    $agent = $this->agent->mobile();
                } else{
                    $agent = 'Unidentified User Agent';
                }
                $data = array(
                    'action_key' => $action_key,
                    'content' => $content,
                    'ip' => $this->input->ip_address(),
                    'browser' => $agent,
                    'os' => $this->agent->platform(),
                    'user_id' => $user_login['id'],
                    'username' => $user_login['username'],
                    'fullname' => $user_login['fullname'],
                    'created_at' => time()
                );
                
                return $this->insert($data);
            }
                
        }
        
        return FALSE;
    }
}