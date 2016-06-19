<?php
class Whisper_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('whispers');
        
    }
    public function default_value()
    {
        return array(
            'id' => NUll,
            'receive' => array(),
            'content' => ''
        );
    }
    
    public function convert_data($data = array())
    {
        // Sender
        $sender = $this->user_model->get_by_id($data['send_id']);
        $data['sender'] = $sender ? $sender['fullname'] : '';
        // Receiver
        $receiver = $this->user_model->get_by_id($data['receive_id']);
        $data['receiver'] = $receiver ? $receiver['fullname'] : '';
        //Created at
        $data['created_at_'] = $data['created_at'] > 0 ? date('d-m-Y', $data['created_at']) : '';
        
        return $data;
    }
    
    public function insert_data($input = array())
    {
        $user_login = $this->session->userdata['user_login'];
        $data = array();
        $tmp = array(
            'send_id' => $user_login['id'],
            'content' => $input['content'],
            'created_at' => now()
        );
        foreach ($input['receive'] as $receive) {
            $tmp['receive_id'] = $receive;
            $data[] = $tmp;
        }
       
        return $this->insert_batch($data);
    }
}