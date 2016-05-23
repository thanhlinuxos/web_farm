<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'frontend/dashboard';


/******************** ACP *************************/
$route['acp'] = 'backend/dashboard';
$route['acp/login'] = 'backend/auth/login';

//User
$route['acp/user/add'] = 'backend/user/add';

//Default router
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
