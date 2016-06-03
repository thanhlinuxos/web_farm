<?php
class Tree_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('trees');
    }
    
    public function default_value()
    {
        return array(
            'id' => NUll,
            'branch_id' => '',
            'land_id' => '',
            'duple_id' => '',
            'row_id' => '',
            'status' => '',
            'quantity' => 0
        );
    }
    
    public function convert_data($data = array())
    {
        
        return $data;
    }
    
    public function create_tree($post = array())
    {
        
    }
}