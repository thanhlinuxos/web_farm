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
            'user' => 'index|add|edit|show|delete',
            'permission' => 'index|add|edit',
            'logs' => 'index|add|edit|show',
            'branch' => 'index|add|edit|show|delete',
            'land' => 'index|add|edit|show|delete',
            'duple' => 'index|add|edit|show|delete',
            'row' => 'index|add|edit|show|delete',
            'tree' => 'index|add|edit|show|delete',
            'processes_forest' => 'index|add|edit|show|delete',
            'soil_preparation' => 'index|add|edit|show|delete',
            'materials' => 'index|add|edit|show|delete',
            'code' => 'index'
        ),
        'admin' => array(
            'user' => 'index|add|edit|show|delete',
            'permission' => 'edit',
            'logs' => 'index|show',
            'branch' => 'index|add|edit|show|delete',
            'land' => 'index|add|edit|show|delete',
            'duple' => 'index|add|edit|show|delete',
            'row' => 'index|add|edit|show|delete',
            'tree' => 'index|add|edit|show|delete',
            'processes_forest' => 'index|add|edit|show|delete',
            'soil_preparation' => 'index|add|edit|show|delete',
            'materials' => 'index|add|edit|show|delete',
            'code' => 'index'
        ),
        'manager' => array(
            'user' => 'index|add|show|edit',
        ),
        'technical' => array(
            'processes_forest' => 'index|add|edit|show|delete',
            'soil_preparation' => 'index|add|edit|show|delete',
        ),
        'accountancy' => array(
            'materials' => 'index|add|show|edit',
        ),
        'employee' => array()
    ) 
);
