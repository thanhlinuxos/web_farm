<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logs extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['per_page'] = 100;
    }
    public function index()
    {
        $this->session->set_userdata('logs_search', array('user_id' => '', 'action_key' => '', 'from_date' => '', 'to_date' => ''));
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/logs/page');
        $config['total_rows'] = $this->logs_model->count_all(array('deleted' => 0));
        $config['per_page'] = $this->data['per_page'];
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $conditions = array(
            'where' => array('deleted' => 0),
            'sort_by' => 'id DESC',
            'limit' => $config['per_page'],
            'offset' => $this->uri->segment(4) ? ($this->uri->segment(4) - 1)*$config['per_page'] : 0
        );

        $this->data['rows'] = $this->logs_model->get_rows($conditions);
        $this->data['actions'] = $this->logs_model->get_rows(array('select' => 'action_key', 'distinct' => TRUE, 'sort_by' => 'action_key ASC'));
        $this->data['users'] = $this->logs_model->get_rows(array('select' => 'user_id, username, fullname', 'distinct' => TRUE, 'sort_by' => 'username ASC'));
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/logs/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function search()
    {
        if($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->session->set_userdata('logs_search', array('user_id' => $post['user_id'], 'action_key' => $post['action_key'], 'from_date' => $post['from_date'], 'to_date' => $post['to_date']));
        }
        
        $logs_search = $this->session->userdata('logs_search');
        
        $sql = '';
        if($logs_search['user_id']) {
            $sql .= "user_id='".$logs_search['user_id']."' AND ";
        }
        if($logs_search['action_key']) {
            $sql .= "action_key='".$logs_search['action_key']."' AND ";
        }
        if($logs_search['from_date']) {
            $from_date = strtotime($logs_search['from_date'].' 0:00:00');
            $sql .= "created_at >= '".$from_date."' AND ";
        }
        if($logs_search['to_date']) {
            $to_date = strtotime($logs_search['to_date'].' 23:59:59');
            $sql .= "created_at <= '".$to_date."' AND ";
        }
        //Count
        $count_all = $this->logs_model->get_query("SELECT COUNT(id) FROM th_logs WHERE $sql deleted = 0", FALSE);
        //Pagination
        $config = $this->pagination_mylib->bootstrap_configs();
        $config['base_url'] = base_url('acp/logs/search/page');
        $config['total_rows'] = $count_all['COUNT(id)'];
        $config['per_page'] = $this->data['per_page'];
        $config['uri_segment'] = 5;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        //List
        $offset = $this->uri->segment(5) ? ($this->uri->segment(5) - 1)*$config['per_page'] : 0;
        $this->data['rows'] = $this->logs_model->get_query("SELECT * FROM th_logs WHERE $sql deleted = 0 ORDER BY id DESC LIMIT ".$config['per_page']." OFFSET " . $offset);
        $this->data['actions'] = $this->logs_model->get_rows(array('select' => 'action_key', 'distinct' => TRUE, 'sort_by' => 'action_key ASC'));
        $this->data['users'] = $this->logs_model->get_rows(array('select' => 'user_id, username, fullname', 'distinct' => TRUE, 'sort_by' => 'username ASC'));
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/logs/index', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }

    public function show($id = 0)
    {
        $logs = $this->logs_model->get_by($id);
        if(!$logs)
        {
           $this->session->set_flashdata('msg_success', $this->lang->line('logs_not_exist'));
           redirect('/acp/logs'); 
        }
        $this->data['row'] = $this->logs_model->convert_data($logs);
        
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/logs/show', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function server()
    {
        $this->load->helper(array('file', 'directory'));
        $this->load->library('typography');
        if($this->input->get('date')) {
            $this->session->set_userdata('logs_server_search', $this->input->get('date'));
        }
        if($this->input->post('submit'))
        {
            $this->session->set_userdata('logs_server_search', $this->input->post('date'));
        }
        $logs_search = $this->session->userdata('logs_server_search');
        $date = $logs_search ? $logs_search : date('d-m-Y');
        $datetime = DateTime::createFromFormat('d-m-Y', $date);
        $logs_path = LOGSPATH . $datetime->format('Y') . '/' . $datetime->format('m') . '/log-'.$datetime->format('Y-m-d').'.txt';
        if(file_exists($logs_path)) {
            $logs = read_file($logs_path);
        } else {
            $logs = "Không có tập tin Logs vào ngày: " . $date;
        }
        
        $this->data['row'] = array('logs' => $this->typography->nl2br_except_pre($logs), 'date' => $date);
        $this->data['logs_map'] = directory_map(LOGSPATH);
        $this->load->view('backend/layout/header', $this->data);
        $this->load->view('backend/logs/server', $this->data);
        $this->load->view('backend/layout/footer', $this->data);
    }
    
    public function clean_cached()
    {
        var_dump($this->logs_model->clean_cached());
    }
}
