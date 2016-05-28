<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Permission
|--------------------------------------------------------------------------
|
| Permission of Group
|
*/

$config = array(
    'list' => array(
        'user' => 'add,edit,delete',
        'tree' => 'add,edit,delete',
    ),
    'admin' => array(
        'user' => 'add,edit,delete',
        'tree' => 'add,edit,delete',
    ),
    'manager' => array(),
    'technical' => array(),
    'accountancy' => array(),
    'employee' => array()
);
