<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('form_validation', 'session', 'pagination');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'form');
$autoload['config'] = array('my_config');
$autoload['language'] = array();
$autoload['model'] = array('user_model','branch_model','land_model');
