<?php
class Land_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('lands');
    }
    
    public function default_value()
    {
        return array(
            'id' => NUll,
            'branch_id' => '',
            'name' => '',
            'axis_x' => '',
            'axis_y' => '',
            'image_' => base_url('assets/backend/img/icon/no_image_256x256.png'),
            
        );
    }
    
    public function convert_data($data = array())
    {
        $data['image_'] = base_url('assets/backend/img/icon/no_image_256x256.png');
        if(isset($data['image'])) {
            $data['image_'] = base_url('uploads/land/'.$data['image']);
        }
        
        return $data;
    }
}
