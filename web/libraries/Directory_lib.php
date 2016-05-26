<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Directory_lib 
{
    public function is_exist($directory)
    {
        return is_dir(UPLOADPATH . $directory);
    }
    
    public function create($directory)
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