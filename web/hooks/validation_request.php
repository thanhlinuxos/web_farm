<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

function validation_request() {
    $CI = & get_instance();
    $headers = $CI->input->request_headers();
    if($headers['Host'] !== 'web_farm.local') {
        exit('<strong>W</strong><strong>A</strong><strong>R</strong><strong>N</strong><strong>I</strong><strong>N</strong><strong>G</strong>');
    }
   
}
/* End of file validation_request.php */
/* Location: ./system/application/hooks/validation_request.php */