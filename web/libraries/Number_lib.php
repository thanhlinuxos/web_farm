<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Number_lib {

    public function currency_vnd($input = 0) {
        $input = number_format($input, "0", ",", ".");
        $input .= " VNĐ";
        return $input;
    }

}
