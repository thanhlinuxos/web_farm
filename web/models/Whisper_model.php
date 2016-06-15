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
}