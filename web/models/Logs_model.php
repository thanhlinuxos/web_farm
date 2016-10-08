<?php
class Logs_model extends MY_Model 
{
    public function __construct()
    {
        $this->load->dbforge();
        $table = 'logs_' . date('Y');
        if (!$this->db->table_exists($table)) {
            $this->create_table($table);
        }
        $logs_search = $this->session->userdata('logs_search');
        $table_name = isset($logs_search['table_name']) ? $logs_search['table_name'] : $table;
        // Construct
        parent::__construct($table_name);
    }
    
    public function convert_data($data = array())
    {
        if(count($data) > 0) {
            if(isset($data['created_at'])) {
                $data['created_at_'] = date('d-m-Y H:i', $data['created_at']);
            }
            $data['action_key_'] = $this->lang->line($data['action_key']);
            $data['content_'] = wordwrap($data['content'], 120, "<br />\n", true);
        }
        return $data;
    }

    public function write($action_key, $new_data = NULL, $old_data = NULL)
    {
        if($action_key && $new_data) 
        {
            $write = FALSE;
            if($old_data == NULL) {
                $write = TRUE;
                $content = '';
                foreach ($new_data as $k => $v) {
                    $content .= '<br> ['.$k.']: '.$v;
                }
            } else {
                $content = '';
                foreach ($new_data as $k => $v) {
                    if(isset($old_data[$k]) && $old_data[$k] != $v){
                        $content .= '<br> ['.$k.']: '.$old_data[$k].' => '.$v;
                        $write = TRUE;
                    }
                }
            }
            
            if($write) {
                $logs_search = $this->session->userdata('logs_search');
                $logs_search['table_name'] = 'logs_'.date('Y');
                $this->session->set_userdata('logs_search', $logs_search);
                
                $user_login = $this->session->userdata('user_login');
                
                if ($this->agent->is_browser()) {
                    $agent = $this->agent->browser().' '.$this->agent->version();
                } else if($this->agent->is_robot()) {
                    $agent = $this->agent->robot();
                } else if($this->agent->is_mobile()) {
                    $agent = $this->agent->mobile();
                } else {
                    $agent = 'Unidentified User Agent';
                }
                $data = array(
                    'action_key' => $action_key,
                    'content' => $content,
                    'ip' => $this->input->ip_address(),
                    'browser' => $agent,
                    'os' => $this->agent->platform(),
                    'user_id' => $user_login['id'],
                    'username' => $user_login['username'],
                    'fullname' => $user_login['fullname'],
                    'created_at' => time()
                );
                
                return $this->insert($data);
            }
                
        }
        
        return FALSE;
    }
    
    public function table_list()
    {
        $list = array();
        $this->load->driver('cache', $this->config->item('cache'));
        
        if(!$tables = $this->cache->get($this->db->database . '_list_tables')) {
            $tables = $this->db->list_tables();
            $this->cache->save($this->db->database . '_list_tables', $tables, 36000);
        }
            
        foreach ($tables as $table)
        {
            if(strpos($table, $this->db->dbprefix('logs')) !== FALSE) {
                $list[] = str_replace($this->db->dbprefix, '', $table);
            }
        }
        arsort($list);
        return $list;
    }

    private function create_table($table_name = NULL)
    {
        if($table_name !== NULL)
        {
            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 10,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'action_key' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'null' => TRUE,
                ),
                'content' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'ip' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => TRUE,
                ),
                'browser' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'os' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => TRUE,
                ),
                'user_id' => array(
                    'type' => 'SMALLINT',
                    'constraint' => '5',
                    'default' => '0',
                    'unsigned' => TRUE,
                ),
                'username' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'null' => TRUE,
                ),
                'fullname' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'null' => TRUE,
                ),
                'created_at' => array(
                    'type' => 'INT',
                    'constraint' => '10',
                    'default' => '0',
                    'unsigned' => TRUE,
                ),
                'deleted' => array(
                    'type' => 'INT',
                    'constraint' => '10',
                    'default' => '0',
                    'unsigned' => TRUE,
                )
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table($table_name, TRUE, array('ENGINE' => 'InnoDB'));
            // Clean cache
            $this->cache->delete($this->db->database . '_list_tables');
        }
    }
}