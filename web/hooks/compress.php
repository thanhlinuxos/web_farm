<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

function compress() {  
    $CI = & get_instance();
    $buffer = $CI->output->get_output();
    $buffer = minify_html($buffer);
    $CI->output->set_output($buffer);
    $CI->output->_display();
}
/* End of file compress.php */
/* Location: ./system/application/hooks/compress.php */