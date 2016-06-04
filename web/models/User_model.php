<?php
class User_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('users');
    }
    
    public function default_value()
    {
        return array(
            'id' => NUll,
            'branch_id' => '',
            'fullname' => '',
            'username' => '',
            'group' => 'employee',
            'image_' => base_url('assets/backend/img/icon/no_avatar_256x256.png'),
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
        $data['image_'] = base_url('assets/backend/img/icon/no_avatar_256x256.png');
        if(isset($data['image']) && file_exists(UPLOADPATH . 'user/thumbnail/'.$data['image'])) {
            $data['image_'] = base_url('uploads/user/thumbnail/'.$data['image']);
        }
        if(is_numeric($data['branch_id'])) {
            $branch = $this->branch_model->get_by($data['branch_id']);
            $data['branch_name'] = $branch ? $branch['name'] : '';
        }
        $data['gender_'] = $this->lang->line('user_gender_'.$data['gender']);
        $data['status_'] = $this->lang->line('user_status_'.$data['status']);
        if(isset($data['created_at'])) {
            $data['created_at_'] = date('d-m-Y H:i', $data['created_at']);
        }
        return $data;
    }
    
    public function check_permission($controller, $action)
    {
        if($controller == 'dashboard' || in_array($action, array('search', 'sortable', 'li_list'))) {
            return TRUE;
        }
        $user_login = $this->session->userdata('user_login');
        $permission = $user_login['permission'];
        $allow = FALSE;
        if(isset($permission[$controller])) {
            if(in_array($action, $permission[$controller])) {
                $allow = TRUE;
            }
        }
      
        if(!$allow) {
            redirect(base_url('acp/deny'));
        }
        return TRUE;
    }

    public function change_password($old_password = '', $new_password = '')
    {
        $result = array('success' => FALSE, 'msg' => '');
        
        $user_login = $this->session->userdata('user_login');
        $user = $this->get_by(array('id' => $user_login['id']));
        if($user['password'] != md5(md5($old_password)))
        {
            $result['msg'] = $this->lang->line('auth_password_not_available');
        }
        else
        {
            $user['password'] = md5(md5($new_password));
            $user['change_password'] = 0;
            $this->update($user);
            $user_login['change_pass'] = 0;
            $this->session->set_userdata('user_login', $user_login);
            $result['success'] = TRUE;
        }
        
        return $result;
    }
    
    /******************* BACKEND *********************/
    public function backend_is_login()
    {
        $user_login = $this->session->userdata('user_login');
       
        if(!isset($user_login['id']))
        {
            redirect(base_url('acp/login'));
        }
        elseif($user_login['is_admin'] != 1)
        {
            redirect(base_url('deny'));
        }
        elseif($user_login['change_pass'] == 1)
        {
            redirect(base_url('acp/change_password'));
        }
        else
        {
            
        }
        return true;
    }

    public function backend_login($input)
    {
        $result = array('success' => FALSE, 'msg' => '');
        $user = $this->get_by(array('username' => $input['u']));
        if(!$user)
        {
            $result['msg'] = $this->lang->line('user_not_exist');
        }
        else
        {
            if($user['login_fail'] >= 5)
            {
                $user['status'] = 0;
                $this->update($user);
                $result['msg'] = $this->lang->line('user_has_been_locked');
            }
            elseif ($user['group'] != 'admin')
            {
                $result['msg'] = $this->lang->line('user_has_been_deny');
            }
            elseif($user['status'] == 0)
            {
                $result['msg'] = $this->lang->line('user_has_been_locked');
            }
            elseif($user['password'] != md5(md5($input['p'])))
            {
                $user['login_fail'] += 1;
                $this->update($user);
                $result['msg'] = $this->lang->line('auth_password_not_available');
            }
            else
            {
                $permissions = ($user['permission'] != NULL) ? unserialize($user['permission']) : array();
                $tmp = array();
                foreach ($permissions as $k => $v)
                {
                    $tmp[$k] = explode('|', $v);
                }
                $session = array(
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'fullname' => $user['fullname'],
                    'is_admin' => 1,
                    'change_pass' => $user['change_password'],
                    'permission' => $tmp
                );
                $this->session->set_userdata('user_login', $session);
                $result['success'] = TRUE;
                $user['login_fail'] = 0;
                $this->update($user);
            }
        }
        
        return $result;
    }
    
    public function backend_logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('acp/login'));
    }
}