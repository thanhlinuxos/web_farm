<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_capcha extends CI_Migration {

    public function up() {
//        $this->dbforge->add_field(array(
//            'id' => array(
//                'type' => 'TINYINT',
//                'constraint' => 3,
//                'unsigned' => TRUE,
//                'auto_increment' => TRUE
//            ),
//            'name' => array(
//                'type' => 'VARCHAR',
//                'constraint' => '100',
//            ),
//            'address' => array(
//                'type' => 'VARCHAR',
//                'constraint' => '255',
//                'null' => TRUE,
//            ),
//            'phone' => array(
//                'type' => 'VARCHAR',
//                'constraint' => '15',
//                'null' => TRUE,
//            ),
//            'deleted' => array(
//                'type' => 'INT',
//                'constraint' => '10',
//                'default' => 0,
//                'unsigned' => TRUE
//            )
//        ));
        $this->dbforge->add_key('id',TRUE);
        $this->dbforge->create_table('capcha');
    }

    public function down() {
        $this->dbforge->drop_table('capcha');
    }

}