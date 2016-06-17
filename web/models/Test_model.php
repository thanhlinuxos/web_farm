<?php
class Test_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('users');
        
    }
    public function test()
    {
        $this->load->dbforge();
        
        if ($this->db->table_exists('logs_' . date('Y')))
        {
            echo 'Table exits <br>';
        }
        
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
        
        var_dump($this->dbforge->create_table('logs_' . date('Y'), TRUE, array('ENGINE' => 'InnoDB')));
    }
}