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
    
    
}