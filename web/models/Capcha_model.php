<?php
class Capcha_model extends MY_Model 
{
    public function __construct()
    {
        parent::__construct('capcha');
    }
    
    public function validation($capcha = NULL)
    {
        $expiration = time()- 300; // 5 minus limit
        $this->db->query("DELETE FROM th_capcha WHERE captcha_time < ".$expiration);
        
        $sql = "SELECT COUNT(*) AS count FROM th_capcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($capcha, $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        return $row->count ? TRUE : FALSE;
    }
}