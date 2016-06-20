<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    private $data = array();
    
    public function __construct() {
        parent::__construct();
        //  Path to simple_html_dom
        require_once APPPATH . 'third_party/simple_html_dom.php';
    }
    
    public function index()
    {
        $this->load->helper('smiley');
        $this->load->library('table');

        $image_array = get_clickable_smileys(base_url('assets/smileys') . '/', 'smileys_alias');
        
        $col_array = $this->table->make_columns($image_array, 8);
        
        $data['smiley_table'] = $this->table->generate($col_array);
      
        $this->load->view('test', $data);
        
//        $this->load->model('test_model');
//        $this->test_model->test();
//        $this->user_model->get_rows(array(
//            'joins' => array(
//                            array('th_branches', 'th_branches.id = th_users.branch_id'),
//                            array('th_lands', 'th_branches.id = th_lands.branch_id'),
//                        )
            //'select' => '1',
            //'distinct' => '',
            //'where' => array('id !=' => 0, 'fullname' => 'abc'),
            //'like' => array(array('username', 'fullname'), 'test'),
            //'group_by' => 'fullname',
//        ));
//        echo $this->db->last_query();
//        $this->load->view('test', $this->data);
        
        //  Create object of Simple_html_dom class
//        $html = new Simple_html_dom();
//
//        //  Use Simple_html_dom class function load_file
//        $html->load_file('http://vnexpress.net');
//
//        //  Use Simple_html_dom class function
//        foreach ($html->find('.title_news') as $element) {
//            print_r($element->find('a'));
//            exit;
//        }
        
//        $this->load->library('encrypt');
//        $msg = "My secret message It's important for you to know that the encoded messages the encryption function generates will ";
//
//        $encrypted_string = $this->encrypt->encode($msg);
//        echo $encrypted_string;
//        echo "<br>";
//        echo $this->encrypt->decode($encrypted_string);
        
//        $this->load->library('table');
//
//        $query = $this->db->query("SELECT * FROM th_branches");
//
//        echo $this->table->generate($query);
        
//        $this->load->library('typography');
//        $string = "<span>ádasdsa \n dasdads";
//        echo $this->typography->nl2br_except_pre($string);
       
    }
    
    public function convert()
    {
        
    }

        public function ajax(){
        $this->load->view('ajax');
    }
    
    
}
