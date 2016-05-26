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
        $data['gender_'] = $this->lang->line('user_gender_'.$data['gender']);
        $data['status_'] = $this->lang->line('user_status_'.$data['status']);
        $data['created_at_'] = date('d-m-Y H:i', $data['created_at']);
        return $data;
    }
    
    public function is_login()
    {
        
    }

        public function login($input)
    {
        $result = array('success' => FALSE, 'msg' => '');
        $user = $this->get_by(array('username' => $input['u']));
        if(!$user)
        {
            $result['msg'] = 'Tai khoan khong ton tai!';
        }
        else
        {
            if($user['login_fail'] >= 5)
            {
                $user['status'] = 0;
                $this->update($user);
                $result['msg'] = 'Tai khoan da bi khoa!';
            }
            elseif($user['status'] == 0)
            {
                $result['msg'] = 'Tai khoan da bi khoa!';
            }
            elseif($user['password'] != md5(md5($input['p'])))
            {
                $user['login_fail'] += 1;
                $this->update($user);
                $result['msg'] = 'Mat khau khong dung!';
            }
            else
            {
                $this->session->set_userdata('user_login', array('id' => $user['id'], 'fullname' => $user['fullname']));
                $result['success'] = TRUE;
                $user['login_fail'] = 0;
                $this->update($user);
            }
        }
        
        return $result;
    }
}