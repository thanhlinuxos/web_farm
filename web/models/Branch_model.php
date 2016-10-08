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
    
    public function convert_data($data = array())
    {
        
        return $data;
    }
    
    public function delete_data($id)
    {
        // Check User
        
        // Check Land
        
        return $this->delete($id);
    }
}