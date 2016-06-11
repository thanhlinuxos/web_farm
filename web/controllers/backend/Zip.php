<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Zip extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('zip');
    }
    public function index()
    {
        $name = 'mydata1.txt';
        $data = 'A Data String!';

        $this->zip->add_data($name, $data);

        // Write the zip file to a folder on your server. Name it "my_backup.zip"
        $this->zip->archive(ZIPPATH . 'my_backup.zip'); 

        // Download the file to your desktop. Name it "my_backup.zip"
        $this->zip->download('my_backup.zip');
    }
}