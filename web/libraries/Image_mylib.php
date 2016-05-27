<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image_mylib 
{
    /**
      * CI Singleton
      *
      * @var object
      */
    protected $CI;
    
    /**
    * Class constructor
    *
    * Loads the Directory_mylib file.
    *
    * @uses	CI_Lang::$is_loaded
    *
    * @return	void
    */
    public function __construct()
    {
            $this->CI =& get_instance();
            $this->CI->load->helper('directory');
            log_message('info', 'Image_mylib Class Initialized');
    }

    /**
    * Upload a image
    * @param    input file, directory, array
    * @return	array
    */
    public function upload_one($input_name, $directory, $image = array(), $thumbnail = array())
    {
        $result = array();
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if($_FILES[$input_name]['tmp_name'] != '') 
            {
                if(!directory_exist($directory))
                {
                    create_directory($directory);
                }
                
                $config = array(
                    'upload_path' => UPLOADPATH . $directory . '/',
                    'allowed_types' => isset($image['allowed_types']) ? $image['allowed_types'] : 'gif|jpg|png',
                    'max_size' => isset($image['max_size']) ? $image['max_size'] : '5120', // 5MB
                    'max_width' => isset($image['max_width']) ? $image['max_width'] : '1024',
                    'max_height' => isset($image['max_height']) ? $image['max_height'] : '768',
                    'encrypt_name' => TRUE
                );
		$this->CI->load->library('upload', $config);

		if ($this->CI->upload->do_upload($input_name))
		{
                    $result = $this->CI->upload->data();
                    //Thumbnail
                    if(count($thumbnail) > 0)
                    {
                        $this->thumbnail($directory, $result, $thumbnail);
                    }
		}
		else
		{
                    $result['error'] = $this->CI->upload->display_errors();
		}
            }
        }
        
        return $result;
    }
    
    /**
    * Upload multi image
    * @param    input file, directory, array
    * @return	array
    */
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
    
    /**
    * Creat thumbnail
    * @param    input file, directory, array
    * @return	boolean
    */
   private function thumbnail($directory, $image, $thumbnail)
    {
        if(!directory_exist($directory . '/thumbnail'))
        {
            create_directory($directory . '/thumbnail');
        }
        
        $image_source = UPLOADPATH . $directory . '/' . $image['file_name'];
        $image_dest = UPLOADPATH . $directory . '/thumbnail/' . $image['file_name'];
        if (copy($image_source, $image_dest))
        {
            $this->CI->load->library('image_lib');

            $thumb_width = isset($thumbnail['width']) ? $thumbnail['width'] : 220;
            $thumb_height = isset($thumbnail['height']) ? $thumbnail['height'] : 180;
            $thumb_rate = $thumb_width/$thumb_height;

            $image_width = $image['image_width'];
            $image_height= $image['image_height'];
            $image_rate = $image_width/$image_height;

            if($image_rate > $thumb_rate)
            {
                $size_height = $image['image_height'];
                $size_width = $size_height * $thumb_rate;
                $x_axis = ($image['image_width'] - $size_width) / 2;
                $y_axis = 0;
            }
            else
            {
                $size_width = $image['image_width'];
                $size_height= $size_width / $thumb_rate;
                $y_axis = ($image['image_height'] - $size_height) / 2;
                $x_axis = 0;
            }
            echo $size_width . '<br>';
            echo $size_height . '<br>';
            echo $x_axis . '<br>';
            echo $y_axis . '<br>';
            exit;
            
            
            //Crop
            $this->CI->image_lib->initialize(array(
                'source_image'      => $image_dest,
                'x_axis'            => $x_axis,
                'y_axis'            => $y_axis
            ));
            $this->CI->image_lib->crop();
            $this->CI->image_lib->clear();
            
            //Resize
            $this->CI->image_lib->initialize(array(
                'source_image'      => $image_dest,
                'maintain_ratio'    => TRUE,
                'width'             => $size_width,
                'height'            => $size_height
            ));
            $this->CI->image_lib->resize();    

    //        $config = array(
    //            'image_library' => 'gd2',
    //            'source_image'  => UPLOADPATH . $directory . '/' . $image['file_name'],
    //            'new_image'     => UPLOADPATH . $directory . '/thumbnail/' . $image['file_name'],
    //            'thumb_marker'  => '',
    //            'create_thumb'  => TRUE,
    //            'maintain_ratio'=> TRUE,
    //            'width'	=> isset($thumbnail['width']) ? $thumbnail['width'] : 220,
    //            'height'	=> isset($thumbnail['height']) ? $thumbnail['height'] : 180,
    //            'quality'	=> isset($thumbnail['quality']) ? $thumbnail['quality'] : 90
    //        );
    //                
    //        $this->CI->load->library('image_lib', $config); 
    //
    //        $this->CI->image_lib->resize();
        }
        return true;
    }
}
