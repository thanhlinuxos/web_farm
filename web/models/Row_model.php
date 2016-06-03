<?php
class Row_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('rows');

    }
    
    public function default_value()
    {
        return array(
            'id' => NUll,
            'duple_id' => '',
            'name' => '',
            'ordinal' => ''
            
        );
 
    }
    
    public function convert_data($data = array())    
    {
        $duple = $this->duple_model->get_by($data['duple_id']);
        $data['duple_name'] = $duple ? $duple['name'] : '';
        return $data;
    }
}

