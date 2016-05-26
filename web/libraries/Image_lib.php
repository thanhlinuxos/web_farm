<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image_lib 
{
    public function upload_one($input_name, $directory, $image = array(), $thumbnail = array())
    {
        $result = array();
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if($_FILES[$input_name]['tmp_name'] != '') 
            {
                $this->load->library('directory_lib');
                if(!$this->directory_lib->is_exist($directory))
                {
                    $this->directory_lib->create($directory);
                }
                
                $config = array(
                    'upload_path' => UPLOADPATH . $directory . '/',
                    'allowed_types' => isset($image['allowed_types']) ? $image['allowed_types'] : 'gif|jpg|png',
                    'max_size' => isset($image['max_size']) ? $image['max_size'] : '5120', // 5MB
                    'max_width' => isset($image['max_width']) ? $image['max_width'] : '1024',
                    'max_height' => isset($image['max_height']) ? $image['max_height'] : '768',
                    'encrypt_name' => TRUE
                );
		$this->load->library('upload', $config);

		if ($this->upload->do_upload($input_name))
		{
                    $result = $this->upload->data();
                    //Thumbnail
                    if(count($thumbnail) > 0)
                    {
                        $this->thumbnail($directory, $result, $thumbnail);
                    }
		}
		else
		{
                    $result['error'] = $this->upload->display_errors();
		}
            }
        }
        
        return $result;
    }
    
    public function upload_multi($input_name, $directory, $image = array(), $thumbnail = array())
    {
        $result = array();
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $files = $_FILES;
            $cpt = count($_FILES[$input_name]['name']);
            for($i=0; $i<$cpt; $i++)
            {           
                $_FILES[$input_name]['name']= $files[$input_name]['name'][$i];
                $_FILES[$input_name]['type']= $files[$input_name]['type'][$i];
                $_FILES[$input_name]['tmp_name']= $files[$input_name]['tmp_name'][$i];
                $_FILES[$input_name]['error']= $files[$input_name]['error'][$i];
                $_FILES[$input_name]['size']= $files[$input_name]['size'][$i];    

                $result[] = $this->upload_one($input_name, $directory, $image, $thumbnail);
            }
        }
        return $result;
    }
    
    public function thumbnail($directory, $image, $thumbnail)
    {
        $this->load->library('directory_lib');
        if(!$this->directory_lib->is_exist($directory . '/thumbnail'))
        {
            $this->directory_lib->create($directory . '/thumbnail');
        }
        $config = array(
            'image_library' => 'gd2',
            'source_image'  => UPLOADPATH . $directory . '/' . $image['file_name'],
            'new_image'     => UPLOADPATH . $directory . '/thumbnail/' . $image['file_name'],
            'thumb_marker'  => '',
            'create_thumb'  => TRUE,
            'maintain_ratio'=> TRUE,
            'width'	=> isset($thumbnail['width']) ? $thumbnail['width'] : 220,
            'height'	=> isset($thumbnail['height']) ? $thumbnail['height'] : 180,
            'quality'	=> isset($thumbnail['quality']) ? $thumbnail['quality'] : 90
        );
                
        $this->load->library('image_lib', $config); 

        $this->image_lib->resize();
        
        return true;
    }
}
