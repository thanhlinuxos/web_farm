<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/layout/dashboard', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function clean_cached()
    {
        $bool = $this->logs_model->clean_cached();
        $this->output->response(array('success' => $bool, 'msg' => 'Clean All!'));
    }
    
    public function charts()
    {
        $post = $this->input->post();
        switch ($post['type']){
            case 'user':
                $data = $this->chart_users();
                break;
            case '':
                
                break;
            default :
                
        }
        $this->output->response($data);
        
    }
    
    private function chart_users()
    {
        $data = array();
        $branches = $this->branch_model->get_rows(array('select'=>'id, name'));
        foreach ($branches as $branch) {
            $user = $this->user_model->get_rows(array('where' => 'branch_id='.$branch['id'], 'count_all_results' => TRUE));
            $data[] = array('y' => $user, 'indexLabel' => $branch['name']);
        }
        return $data;
    }
}
