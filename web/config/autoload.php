<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('form_validation', 'session', 'pagination', 'pagination_mylib');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'form', 'string');
$autoload['config'] = array('my_config');
$autoload['language'] = array();
$autoload['model'] = array('user_model','branch_model','land_model','duple_model', 'logs_model', 'row_model','tree_model', 'whisper_model');