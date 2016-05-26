<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class String_lib {

    public function remove_vietnamese($str) {
        $coDau = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă",
            "ằ", "ắ", "ặ", "ẳ", "ẵ",
            "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
            "ì", "í", "ị", "ỉ", "ĩ",
            "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ"
            , "ờ", "ớ", "ợ", "ở", "ỡ",
            "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
            "ỳ", "ý", "ỵ", "ỷ", "ỹ",
            "đ",
            "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă"
            , "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
            "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
            "Ì", "Í", "Ị", "Ỉ", "Ĩ",
            "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ"
            , "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
            "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
            "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
            "Đ", "ê", "ù", "à");

        $khongDau = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a"
            , "a", "a", "a", "a", "a", "a",
            "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
            "i", "i", "i", "i", "i",
            "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o"
            , "o", "o", "o", "o", "o",
            "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
            "y", "y", "y", "y", "y",
            "d",
            "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A"
            , "A", "A", "A", "A", "A",
            "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
            "I", "I", "I", "I", "I",
            "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O"
            , "O", "O", "O", "O", "O",
            "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
            "Y", "Y", "Y", "Y", "Y",
            "D", "e", "u", "a");

        $str = str_replace($coDau, $khongDau, $str);

        return $str;
    }

    public function clean_url($data) {
        // Remove vietnamese
        $data = $this->remove_vietnamese($data);
        // Special characters
        $char = explode(" ", "&nbsp; &amp; &#092; &quot; & ! @ # $ % ^ & * ( ) _ + = ? < > , .");
        // Remove special character and replacing space
        $data = str_replace($char, array("", "", ""), $data);
        $data = strtolower($data);
        $data = str_replace(array("/"), array(" "), $data);
        $data = preg_replace('/[^a-zA-Z0-9 ]/s', '', $data);
        $data = trim($data);
        $data = str_replace(array(" "), array("-"), $data);
        $data = str_replace(array("amp-", "--"), array("", "-"), $data);
        return $data;
    }
    
    public function substr( $string, $from = 0, $to = 40, $type = 0 )
    {

        if ($type == 1) {
            $string = str_replace("&nbsp;", "", $string);
        }

        // Check for string
        if (strlen($string) < $to) {
            return $string;
        }

        // Continue		
        $output = substr($string, $from, $to);

        for ($i = 0; $i < 20; $i++) {
            $to += 1;

            if (substr($output, -1) != " ") {
                $output = substr($string, $from, $to);
            } else {
                break;
            }
        }

        $output = substr($output, 0, strlen($output) - 1);

        if (substr($output, -1) == ".") {
            $output = substr($output, 0, strlen($output) - 1);
        }

        //if ( strlen($output) > strlen($input) )
        if (strlen($string) > $to) {
            $output .= "...";
        }

        return $output;
    }

}
