<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Default
$route['default_controller'] = 'index';

/****************** FRONT END *********************/
$route['dashboard'] = 'frontend/dashboard';
$route['login'] = 'frontend/auth/login';
$route['logout'] = 'frontend/auth/logout';
$route['change_password'] = 'frontend/auth/change_password';
$route['deny'] = 'frontend/auth/deny';

//User
$route['user'] = 'frontend/user';
$route['user/page'] = 'frontend/user';
$route['user/page/(:num)'] = 'frontend/user';
$route['user/add'] = 'frontend/user/add';
$route['user/edit/(:num)'] = 'frontend/user/edit/$1';
$route['user/show/(:num)'] = 'frontend/user/show/$1';
$route['user/delete/(:num)'] = 'frontend/user/delete/$1'; 
$route['user/delete_multi'] = 'frontend/user/delete_multi';
$route['user/search'] = 'frontend/user/search';
$route['user/search/page'] = 'frontend/user/search';
$route['user/search/page/(:num)'] = 'frontend/user/search';
$route['user/short_list'] = 'frontend/user/short_list';


/******************** ACP *************************/
$route['acp'] = 'backend/dashboard';
$route['acp/login'] = 'backend/auth/login';
$route['acp/logout'] = 'backend/auth/logout';
$route['acp/change_password'] = 'backend/auth/change_password';
$route['acp/auth/group_permission'] = 'backend/auth/group_permission';
$route['acp/deny'] = 'backend/auth/deny';
$route['acp/code'] = 'backend/code';

// Charts
$route['acp/dashboard/charts'] = 'backend/dashboard/charts';

// User
$route['acp/user'] = 'backend/user';
$route['acp/user/page'] = 'backend/user';
$route['acp/user/page/(:num)'] = 'backend/user';
$route['acp/user/add'] = 'backend/user/add';
$route['acp/user/edit/(:num)'] = 'backend/user/edit/$1';
$route['acp/user/show/(:num)'] = 'backend/user/show/$1';
$route['acp/user/delete/(:num)'] = 'backend/user/delete/$1'; 
$route['acp/user/delete_multi'] = 'backend/user/delete_multi';
$route['acp/user/search'] = 'backend/user/search';
$route['acp/user/search/page'] = 'backend/user/search';
$route['acp/user/search/page/(:num)'] = 'backend/user/search';
$route['acp/user/short_list'] = 'backend/user/short_list';

// Branch
$route['acp/branch'] = 'backend/branch';
$route['acp/branch/page'] = 'backend/branch';
$route['acp/branch/page/(:num)'] = 'backend/branch';
$route['acp/branch/add'] = 'backend/branch/add';
$route['acp/branch/edit/(:num)'] = 'backend/branch/edit/$1';
$route['acp/branch/show/(:num)'] = 'backend/branch/show/$1';
$route['acp/branch/delete/(:num)'] = 'backend/branch/delete/$1';

//Lands
$route['acp/land'] = 'backend/land';
$route['acp/land/page'] = 'backend/land';
$route['acp/land/page/(:num)'] = 'backend/land';
$route['acp/land/add'] = 'backend/land/add';
$route['acp/land/edit/(:num)'] = 'backend/land/edit/$1';
$route['acp/land/show/(:num)'] = 'backend/land/show/$1';
$route['acp/land/delete/(:num)'] = 'backend/land/delete/$1';
$route['acp/land/search'] = 'backend/land/search';
$route['acp/land/search/page'] = 'backend/land/search';
$route['acp/land/search/page/(:num)'] = 'backend/land/search';
$route['acp/land/sortable/(:num)'] = 'backend/land/sortable/$1';
$route['acp/land/li_list'] = 'backend/land/li_list';

//Duple
$route['acp/duple'] = 'backend/duple';
$route['acp/duple/page'] = 'backend/duple';
$route['acp/duple/page/(:num)'] = 'backend/duple';
$route['acp/duple/add'] = 'backend/duple/add';
$route['acp/duple/edit/(:num)'] = 'backend/duple/edit/$1';
$route['acp/duple/show/(:num)'] = 'backend/duple/show/$1';
$route['acp/duple/delete/(:num)'] = 'backend/duple/delete/$1';
$route['acp/duple/search'] = 'backend/duple/search';
$route['acp/duple/search/page'] = 'backend/duple/search';
$route['acp/duple/search/page/(:num)'] = 'backend/duple/search';
$route['acp/duple/li_list'] = 'backend/duple/li_list';

//Row
$route['acp/row'] = 'backend/row';
$route['acp/row/page'] = 'backend/row';
$route['acp/row/page/(:num)'] = 'backend/row';
$route['acp/row/add'] = 'backend/row/add';
$route['acp/row/edit/(:num)'] = 'backend/row/edit/$1';
$route['acp/row/show/(:num)'] = 'backend/row/show/$1';
$route['acp/row/delete/(:num)'] = 'backend/row/delete/$1';
$route['acp/row/search'] = 'backend/row/search';
$route['acp/row/search/page'] = 'backend/row/search';
$route['acp/row/search/page/(:num)'] = 'backend/row/search';
$route['acp/row/sortable/(:num)'] = 'backend/row/sortable/$1';
$route['acp/row/li_list'] = 'backend/row/li_list';

//Logs
$route['acp/logs'] = 'backend/logs';
$route['acp/logs/page'] = 'backend/logs';
$route['acp/logs/page/(:num)'] = 'backend/logs';
$route['acp/logs/search'] = 'backend/logs/search';
$route['acp/logs/search/page'] = 'backend/logs/search';
$route['acp/logs/search/page/(:num)'] = 'backend/logs/search';
$route['acp/logs/show/(:num)'] = 'backend/logs/show/$1';
$route['acp/logs/mine'] = 'backend/logs/mine';
$route['acp/logs/mine/page'] = 'backend/logs/mine';
$route['acp/logs/mine/page/(:num)'] = 'backend/logs/mine';
$route['acp/logs/server'] = 'backend/logs/server';

//Tree
$route['acp/tree'] = 'backend/tree';
$route['acp/tree/page'] = 'backend/tree';
$route['acp/tree/page/(:num)'] = 'backend/tree';
$route['acp/tree/add'] = 'backend/tree/add';
$route['acp/tree/edit/(:num)'] = 'backend/tree/edit/$1';
$route['acp/tree/show/(:num)'] = 'backend/tree/show/$1';
$route['acp/tree/delete/(:num)'] = 'backend/tree/delete/$1'; 

// Whisper
$route['acp/whisper'] = 'backend/whisper';
$route['acp/whisper/page'] = 'backend/whisper';
$route['acp/whisper/page/(:num)'] = 'backend/whisper';
$route['acp/whisper/add'] = 'backend/whisper/add';
$route['acp/whisper/show/(:num)'] = 'backend/whisper/show/$1';
$route['acp/whisper/delete/(:num)'] = 'backend/whisper/delete/$1'; 

$route['acp/migration'] = 'backend/migrate';
$route['acp/unit_test'] = 'backend/unit_test';
$route['acp/dashboard/clean_cached'] = 'backend/dashboard/clean_cached';

// Default router
$route['test'] = 'test';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['products/(:num)']['DELETE'] = 'product/delete/$1';
// GET, PUT, POST, DELETE, PATCH