<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Directory Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Thanh Nguyen
 */

// ------------------------------------------------------------------------

if ( ! function_exists('directory_exist'))
{
    /**
     * Check directory exist
     *
     * @param	mixed	will be cast as int
     * @param	string
     * @return	boolean
     */
    function directory_exist($directory = '')
    {
        return is_dir(UPLOADPATH . $directory);
    }
}

if ( ! function_exists('create_directory'))
{
    /**
     * Create directory
     *
     * @param	mixed	will be cast as int
     * @param	string
     * @return	string
     */
    function create_directory($directory = '')
    {
        $path_array = explode("/", $directory); 
		
        $path = substr(UPLOADPATH, 0, -1);

        for($i=0; $i<count($path_array); $i++)
        {
            if($path_array[$i] != "")
            {
                $path .= "/".$path_array[$i];

                if(!is_dir($path))
                {
                    @mkdir($path, 0777);
                    @chmod($path, 0777);
                }
            }	
        }

        return $path;
    }
}