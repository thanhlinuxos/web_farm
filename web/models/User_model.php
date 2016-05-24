<?php
class User_model extends CI_Model {
    public function __construct()
    {
        parent::__construct('users');
    }
    
    public function default_value()
    {
        return array(
            'id' => NUll,
            'fullname' => '',
            'username' => '',
            'group' => 'employee',
            'phone' => '',
            'email' => '',
            'address' => '',
            'gender' => 1,
            'birthday' => '',
            'note' => '',
            'status' => 1
        );
    }
    
    public function convert_data($data = array())
    {
        
        return $data;
    }
}