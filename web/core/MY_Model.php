<?php

/**
 * CodeIgniter
 * @package	CodeIgniter
 * @author	Thanh Nguyen
 * @copyright	Copyright (c) 2016
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $table = null;
    protected $key = null;
    protected $fields = array();
    protected $CI = null;
    
    /**
     * Class constructor
     *
     * @return	void
     */
    public function __construct($table = null) {
        parent::__construct();
        $this->initialize($table);
    }

    /**
     * Initialize model
     */
    private function initialize($table = null) {
        $this->CI = &get_instance();

        $this->CI->load->database();

        if (!is_null($table)) {
            $this->table = $this->db->dbprefix($table);

            $this->fields = $this->db->list_fields($this->table);

            $fields = $this->db->field_data($this->table);

            foreach ($fields as $row) {
                if ($row->primary_key) {
                    $this->key = $row->name;

                    break;
                }
            }//foreach
        } else {
            show_error("CRUD : __construct() must have table name");
        }
    }

    /**
     * Get one row
     * @param Array
     * @output a row
     */
    public function get_by($conditions = array()) {
        if (is_array($conditions) && count($conditions) > 0) {
            foreach ($conditions as $field => $data) {
                if (!in_array($field, $this->fields)) {
                    show_error("CRUD : '$this->table' don't have in '$field'");
                }
            }

            //Check delete status
            if (!isset($conditions['deleted'])) {
                $conditions['deleted'] = 0;
            }

            //Query
            $this->db->where($conditions);
            $query = $this->db->get($this->table);
            return $query->row_array();
        } else {
            show_error("CRUD : Param must be array and not empty");
        }
    }

    /**
     * @param Array(
     *              'select' => ...
     *              'where' => ...
     *              'sort_by' => ...
     *              'limit' => ...
     *              'distinct' => ...)
     * @output rows
     */
    public function get_rows($input = array()) {
        if (isset($input['select'])) {
            $this->db->select($input['select']);
        }
        
        if (isset($input['distinct'])) {
            
        }

        if (isset($input['where'])) {
            $this->db->where($input['where']);
        }

        if (isset($input['sort_by'])) {
            $this->db->order_by($input['sort_by']);
        }

        if (isset($input['limit'])) {
            $offset = isset($input['offset']) ? $input['offset'] : 0;
            $this->db->limit($input['limit'], $offset);
        }
        $query = $this->db->get($this->table);
        
        return $query->result_array();
    }

    public function get_sum($field = '', $where = null) {
        if ($field == '') {
            return false;
        }

        if (!in_array($field, $this->fields)) {
            show_error("CRUD : '$field' not in fields of table '$this->table'");
        }

        if (!is_null($where)) {
            $this->db->where($where);
        }

        $this->db->select_sum($field);

        $query = $this->db->get($this->table);

        $row = $query->row_array();

        return $row[$field];
    }

    /**
     * Get Primary Key
     */
    public function get_primary_key() {
        return $this->key;
    }

    /**
     * Get Fields
     */
    public function get_fields() {
        return $this->fields;
    }

    /**
     * Count
     * @param type $where
     * @return number
     */
    public function count_all($where = null) {
        if (!is_null($where)) {
            $this->db->where($where);
        }
        return $this->db->count_all_results($this->table);
    }

    /**
     * Insert Data
     * @param type $input
     * @return boolean
     */
    public function insert($input = array()) {
        $data = array();
        foreach ($this->fields as $v) {
            if (isset($input[$v])) {
                $data[$v] = $input[$v];
            }
        }

        return $this->db->insert($this->table, $data);
    }

    /**
     * Get Insert ID
     * @return number
     */
    public function insert_id() {
        return $this->db->insert_id();
    }

    /**
     * Update data
     * @return boolean
     */
    public function update($o, $where = array()) {
        if (!is_array($where) || count($where) == 0) {
            if (isset($o[$this->key])) {
                $this->db->where($this->key, $o[$this->key]);
                unset($o[$this->key]);
            } else {
                show_error('CRUD : Can not found value key for update');
            }
        } else {
            foreach ($where as $field => $data) {
                if (!in_array($field, $this->fields)) {
                    show_error("CRUD : '$this->table' don't have in '$field'");
                }
            }
            $this->db->where($where);
        }

        $data = array();

        foreach ($o as $k => $v) {
            if (in_array($k, $this->fields)) {
                $data[$k] = $v;
            }
        }

        return $this->db->update($this->table, $data);
    }

    public function update_code($code = "") {
        $this->db->query("UPDATE {$this->table} SET code=concat('{$code}',RIGHT(concat('000000',id),6)) WHERE code IS NULL OR code = ''");
    }

    public function delete($conditions = array()) {
        if (is_array($conditions) && count($conditions) > 0) {
            foreach ($conditions as $field => $data) {
                if (!in_array($field, $this->fields)) {
                    show_error("CRUD : '$this->table' don't have in '$field'");
                }
            }
        }
        $this->db->where($conditions);
        return $this->db->update($this->table, array('deleted' => time()));
    }

    // --------------------------------------------------------------------

    /**
     * __call magic
     *
     * Allows models to access CI's loaded classes using the same
     * syntax as controllers.
     *
     * @param	string	$method, $agruments
     */
    public function __call($method, $agruments) {
        if (!method_exists($this, $method) && method_exists($this->db, $method)) {
            //$agruments = array_merge(array($this->table), $agruments);
            return call_user_func_array(array($this->db, $method), $agruments);
        } else {
            show_error("CRUD : Method '$method' not found");
        }
    }

}

