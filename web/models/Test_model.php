<?php
class Test_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('users');
        
    }
    public function test()
    {
        $this->load->dbutil();
        $dbs = $this->dbutil->list_databases();

        foreach ($dbs as $db)
        {
            echo $db . '<br>';
        }
        var_dump($this->dbutil->database_exists('web_farm')); //true or false
        echo '<br>';
        
        // CSV
//        $query = $this->db->query("SELECT * FROM th_users");
//        $delimiter = ",";
//        $newline = "\r\n";
//        $enclosure = '"';
//        echo $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
        
        // XML
//        $query = $this->db->query("SELECT * FROM th_users");
//        $config = array (
//            'root'          => 'root',
//            'element'       => 'element',
//            'newline'       => "\n",
//            'tab'           => "\t"
//        );
//        echo $this->dbutil->xml_from_result($query, $config);
        
        // BACKUP
//        $prefs = array(
//                'tables'        => array('table1', 'table2'),   // Array of tables to backup.
//                'ignore'        => array(),                     // List of tables to omit from the backup
//                'format'        => 'txt',                       // gzip, zip, txt
//                'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
//                'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
//                'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
//                'newline'       => "\n"                         // Newline character used in backup file
//        );
//        $backup = $this->dbutil->backup($prefs);
//        $this->load->helper('file');
//        write_file(BACKUPPATH . '/'.date('Y-m-d_H-i').'.gz', $backup);
//        $this->load->helper('download');
//        force_download('mybackup.gz', $backup);
    }
}