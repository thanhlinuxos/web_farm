<?php
class Branch_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('branches');
        
    }
    public function default_value()
    {
        return array(
            'id' => NUll,
            'name' => '',
            'address' => '',
            'phone' => ''
        );
    }
    
    
}