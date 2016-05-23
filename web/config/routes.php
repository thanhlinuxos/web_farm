<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'index';
$route['dashboard'] = 'frontend/dashboard';


/******************** ACP *************************/
$route['acp'] = 'backend/dashboard';
$route['acp/login'] = 'backend/auth/login';
$route['acp/logout'] = 'backend/auth/logout';

//User
$route['acp/user'] = 'backend/user';
$route['acp/user/add'] = 'backend/user/add';
$route['acp/user/edit/(:num)'] = 'backend/user/edit/$1';
$route['acp/user/show/(:num)'] = 'backend/user/show/$1';
$route['acp/user/delete/(:num)'] = 'backend/user/delete/$1'; 
$route['acp/user/delete_multi'] = 'backend/user/delete_multi';

//Default router
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
