<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *--------------------------------------------------------------------------
 *  My config
 *--------------------------------------------------------------------------
 *
 * Group List
 * Permission of Group
 *
 */

$config = array(
    'groups' => array('admin', 'manager', 'technical', 'accountancy', 'employee'),
    'permission' => array(
        'list' => array(
            'user' => 'add|edit|delete',
            'permission' => 'add|edit',
            'agency' => 'add|edit|delete',
            'land' => 'add|edit|delete',
            'duple' => 'add|edit|delete',
            'tree' => 'add|edit|delete',
            'processes_forest' => 'add|edit|delete',
            'soil_preparation' => 'add|edit|delete',
            'materials' => 'add|edit|delete',
        ),
        'admin' => array(
            'user' => 'add|edit|delete',
            'permission' => 'edit',
            'agency' => 'add|edit|delete',
            'land' => 'add|edit|delete',
            'duple' => 'add|edit|delete',
            'tree' => 'add|edit|delete',
            'processes_forest' => 'add|edit|delete',
            'soil_preparation' => 'add|edit|delete',
            'materials' => 'add|edit|delete',
        ),
        'manager' => array(
            'user' => 'add|edit',
        ),
        'technical' => array(
            'processes_forest' => 'add|edit|delete',
            'soil_preparation' => 'add|edit|delete',
        ),
        'accountancy' => array(
            'materials' => 'add|edit',
        ),
        'employee' => array()
    ) 
);
