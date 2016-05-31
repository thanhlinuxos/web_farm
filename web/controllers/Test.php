<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    private $data = array();
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->user_model->get_rows(array(
            'joins' => array(
                            array('th_branches', 'th_branches.id = th_users.branch_id'),
                            array('th_lands', 'th_branches.id = th_lands.branch_id'),
                        )
            //'select' => '1',
            //'distinct' => '',
            //'where' => array('id !=' => 0, 'fullname' => 'abc'),
            //'like' => array(array('username', 'fullname'), 'test'),
            //'group_by' => 'fullname',
        ));
        echo $this->db->last_query();
        //$this->load->view('test', $this->data);
    }
    
    public function ajax(){
        $this->load->view('ajax');
    }
}
