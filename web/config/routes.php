<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'index';
$route['dashboard'] = 'frontend/dashboard';


/******************** ACP *************************/
$route['acp'] = 'backend/dashboard';
$route['acp/login'] = 'backend/auth/login';
$route['acp/logout'] = 'backend/auth/logout';
$route['acp/change_password'] = 'backend/auth/change_password';
$route['acp/auth/group_permission'] = 'backend/auth/group_permission';
$route['acp/deny'] = 'backend/auth/deny';

//User
$route['acp/user'] = 'backend/user';
$route['acp/user/page'] = 'backend/user';
$route['acp/user/page/(:num)'] = 'backend/user';
$route['acp/user/add'] = 'backend/user/add';
$route['acp/user/edit/(:num)'] = 'backend/user/edit/$1';
$route['acp/user/show/(:num)'] = 'backend/user/show/$1';
$route['acp/user/delete/(:num)'] = 'backend/user/delete/$1'; 
$route['acp/user/delete_multi'] = 'backend/user/delete_multi';
$route['acp/user/short_list'] = 'backend/user/short_list';
//Default router
$route['test'] = 'test';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//Branch
$route['acp/branch'] = 'backend/branch';
$route['acp/branch/page'] = 'backend/branch';
$route['acp/branch/page/(:num)'] = 'backend/branch';
$route['acp/branch/add'] = 'backend/branch/add';
$route['acp/branch/edit/(:num)'] = 'backend/branch/edit/$1';
$route['acp/branch/show/(:num)'] = 'backend/branch/show/$1';
$route['acp/branch/delete/(:num)'] = 'backend/branch/delete/$1';
