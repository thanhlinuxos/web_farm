<?php
class Duple_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('duples');
        
    }
    public function default_value()
    {
        return array(
            'id' => NUll,
            'land_id' => '',
            'name' => '',
            'ordinal' => ''
            
        );
 
    }
    
    public function convert_data($data = array())    
    {
        $land = $this->land_model->get_by($data['land_id']);
        $data['land_name'] = $land ? $land['name'] : '';
        return $data;
    }
}