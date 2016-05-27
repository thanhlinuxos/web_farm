<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Number Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Thanh Nguyen
 */

// ------------------------------------------------------------------------

if ( ! function_exists('currency_vnd'))
{
    /**
     * Formats a numbers as currency
     *
     * @param	mixed	will be cast as int
     * @param	int
     * @return	string
     */
    function currency_vnd($num = 0)
    {
        $num = number_format($num, "0", ",", ".");
        $num .= " VNĐ";
        return $num;
    }
}

if ( ! function_exists('currency_dola'))
{
    /**
     * Formats a numbers as currency
     *
     * @param	mixed	will be cast as int
     * @param	int
     * @return	string
     */
    function currency_dola($num = 0)
    {
        $num = number_format($num, "2", ".", ",");
        $num = "$".$num;
        return $num;
    }
}