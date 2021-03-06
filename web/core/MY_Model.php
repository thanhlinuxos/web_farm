<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Model Class
 *
 * CodeIgniter will be assigned to.
 *
 * @package     CodeIgniter
 * @subpackage	Core Model
 * @category	My Model
 * @author	Thanh Nguyen
 */

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
            $this->load->driver('cache', $this->config->item('cache'));
            $this->table = $this->db->dbprefix($table);
            
            if(!$this->fields = $this->cache->get($this->table . '_list_fields')) {
                $this->fields = $this->db->list_fields($this->table);
                $this->cache->save($this->table . '_list_fields', $this->fields, 36000);
            }
            if(!$fields = $this->cache->get($this->table . '_fields')) {
                $fields = $this->db->field_data($this->table);
                $this->cache->save($this->table . '_fields', $fields, 36000);
            }
            
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
     * Get data from DB or Cache
     * @param Numberic
     * @output a row
     */
    public function get_by_id($id = 0)
    {
        if($this->cache->get($this->table . '_' . $id)) {
            $row = $this->cache->get($this->table . '_' . $id);
        } else {
            $row = $this->get_by($id);
            if($row) {
                $this->cache->save($this->table . '_' . $id, $row, 36000); // 10 hours
            }
        }
        return $row;
    }

        /**
     * Get one row
     * @param Array OR Numberic
     * @output a row
     */
    public function get_by($conditions = array(), $latest = FALSE) {
        if(is_numeric($conditions)) {
            $this->db->where($this->key, $conditions);
            $this->db->where('deleted', 0);
        }else if (is_array($conditions) && count($conditions) > 0) {
            foreach ($conditions as $field => $data) {
                if (!in_array($field, $this->fields)) {
                    show_error("CRUD : '$this->table' don't have in '$field'");
                }
            }
            //Check delete status
            if (!isset($conditions['deleted'])) {
                $conditions['deleted'] = 0;
            }
            $this->db->where($conditions);
        } else {
            show_error("Method: get_by() CRUD : Param must be ARRAY OR NUMBERIC and NOT empty!");
        }
        $query = $this->db->get($this->table);
        return $latest ? $query->last_row('array'): $query->first_row('array');
    }

    /**
     * @param
     * @output rows
     */
    public function get_rows($input = array())
    {
        // SELECT
        // string field1, field2, ...
        if(isset($input['select'])) {
            if(is_string($input['select']) && $input['select']) {
                $this->db->select($input['select']);
            } else {
                show_error("Method: get_row() CRUD : Param SELECT must be STRING and NOT empty!");
            }
        }
        // DISTINCT
        // boolean TRUE
        if(isset($input['distinct']) && $input['distinct'] === TRUE) {
            if(is_bool($input['distinct'])) {
                $this->db->distinct();
            } else {
                show_error("Method: get_row() CRUD : Param DISTINCT must be BOOLEAN!");
            }  
        }
        // MAX
        // string field
        if(isset($input['select_max'])) {
            $this->db->select_max($input['select_max']);
        }  
        // MIN
        // string field
        if(isset($input['select_min'])) {
            $this->db->select_min($input['select_min']);
        }
        // AVG
        // string field
        if(isset($input['select_avg'])) {
            $this->db->select_avg($input['select_avg']);
        }
        // SUM
        // string field
        if(isset($input['select_sum'])) {
            $this->db->select_avg($input['select_sum']);
        }
        // JOIN
        // array(table_name, condition, type)
        if(isset($input['join']) && is_array($input['join'])) {
            $input['join'][2] = isset($input['join'][2]) ? $input['join'][2] : NULL;
            $this->db->join($input['join'][0], $input['join'][1], $input['join'][2]);
        }
        // MULTI JOIN
        // array (array(table_name, condition, type), ...)
        if(isset($input['joins']) && is_array($input['joins'])) {
            foreach ($input['joins'] as $join) {
                $join[2] = isset($join[2]) ? $join[2] : NULL;
                $this->db->join($join[0], $join[1], $join[2]);
            }
        }
        // WHERE
        // string or array(field1 => value1, field2 => value2, ...)
        if (isset($input['where'])) {
            if(is_array($input['where']) && count($input['where']) > 0) {
                if (!isset($input['where']['deleted'])) {
                    $input['where']['deleted'] = 0;
                }
                $this->db->where($input['where']);
            } else if(is_string($input['where']) && $input['where']) {
                $this->db->where($input['where']);
                if(strpos($input['where'], 'deleted') === FALSE) {
                    $this->db->where('deleted', 0);
                }
            } else {
                show_error("Method: get_row() CRUD : Param WHERE must be ARRAY OR STRING and NOT empty!");
            }
        } else {
            $this->db->where('deleted', 0);
        }
        // WHERE IN
        // string field and array(value1, value2, ...)
        if (isset($input['where_in'])) {
            $this->db->where_in($input['where_in'][0], $input['where_in'][1]);
        }
        // WHERE NOT IN
        // string field and array(value1, value2, ...)
        if (isset($input['where_not_in'])) {
            $this->db->where_not_in($input['where_not_in'][0], $input['where_not_in'][1]);
        }
        
        // LIKE 
        // array(field, match, type)
        if (isset($input['like'])) {
            if(is_array($input['like'][0]) && count($input['like'][0]) > 0) {
                $tmp = array();
                foreach($input['like'][0] as $field) {
                    $tmp[$field] = $input['like'][1];
                }
                $this->db->like($tmp);
            } else {
                $input['like'][2] = (isset($input['like'][2]) && in_array($input['like'][2], array('before', 'after', 'both'))) ? $input['like'][2]: NULL;
                $this->db->like($input['like'][0], $input['like'][1], $input['like'][2]);
            }
        }
        // OR LIKE
        // array(field, match, type)
        if(isset($input['or_like'])) {
            $input['or_like'][2] = (isset($input['or_like'][2]) && in_array($input['or_like'][2], array('before', 'after', 'both'))) ? $input['or_like'][2]: NULL;
            $this->db->or_like($input['or_like'][0], $input['or_like'][1], $input['or_like'][2]);
        }
        
        // GROUP BY
        // string field or array(field1, field2, ...)
        if(isset($input['group_by'])) {
            if((is_array($input['group_by']) && count($input['group_by']) > 0) || (is_string($input['group_by']) && $input['group_by'])) {
                $this->db->group_by($input['group_by']);
            } else {
                show_error("Method: get_row() CRUD : Param GROUP BY must be ARRAY OR STRING and NOT empty!");
            }  
        }
        // ORDER BY
        // string "field1 ASC, field2 DESC"
        if (isset($input['sort_by'])) {
            $this->db->order_by($input['sort_by']);
        }

        // LIMIT
        // number 
        if (isset($input['limit'])) {
            if(is_numeric($input['limit'])) {
                $offset = isset($input['offset']) ? intval($input['offset']) : 0;
                $this->db->limit($input['limit'], $offset);
            } else {
                show_error("Method: get_row() CRUD : Param LIMIT must be NUMBER!");
            }
            
        }
        // COUNT RESULTS
        // boolean TRUE
        if(isset($input['count_all_results']) && $input['count_all_results'] === TRUE) {
            return $this->db->count_all_results($this->table);
        }
        // GET DATA
        $query = $this->db->get($this->table);
        
        return $query->result_array();
    }
    
    /**
     * Get data with string query
     * @param type $str
     * @param type $type
     * @return boolean
     */
    public function get_query($str = '', $type = TRUE)
    {
        if($str != '')
        {
            $query = $this->db->query($str);
        
            return $type ? $query->result_array() : $query->row_array();
        }
        return FALSE;
    }

    /**
     * Get Primary Key
     * return @string
     */
    public function get_primary_key() {
        return $this->key;
    }

    /**
     * Get Fields
     * return @array
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
        if(is_array($where)) {
            if(!isset($where['deleted'])) {
                $where['deleted'] = 0;
            }
            $this->db->where($where);
        } else if(is_string($where)) {
            if(strpos($where, 'deleted') === FALSE) {
                $this->db->where('deleted', 0);
            }
            $this->db->where($where);
        } else {
            $this->db->wherewhere('deleted', 0);
        }
        return $this->db->count_all_results($this->table);
    }

    /**
     * Insert Data
     * @param $input
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
     * Insert multi rows
     * @param array
     * @return boolean
     */
    public function insert_batch($data = array())
    {
        $tmp = array();
        foreach ($data as $row) {
            if(!is_array($row)) {
                return FALSE;
            }
            $d = array();
            foreach ($this->fields as $f) {
                if (isset($row[$f])) {
                    $d[$f] = $row[$f];
                }
            }
            $tmp[] = $d;
        }
        return $this->db->insert_batch($this->table, $tmp);
    }
    
    /**
     * Get Insert ID
     * @return number
     */
    public function insert_id() {
        return $this->db->insert_id();
    }
    
    /**
     * Get Next ID
     * @return number
     */
    public function next_id() {
        $query = $this->db->query("SELECT Auto_increment FROM information_schema.tables WHERE table_name='".$this->table."'");
        $row = $query->row_array();
        return $row['Auto_increment'];
    }
    
    /**
     * Replace data
     * @param array
     * @return boolean
     */
    public function replace($input = array())
    {
        $data = array();
        foreach ($this->fields as $v) {
            if (isset($input[$v])) {
                $data[$v] = $input[$v];
            }
        }
        
        return $this->db->replace($this->table, $data);;
    }
    

    /**
     * Update data
     * @return boolean
     */
    public function update($o, $where = array()) 
    {
        if (!is_array($where) || count($where) == 0) {
            if (isset($o[$this->key])) {
                $this->db->where($this->key, $o[$this->key]);
                // Clear cache
                $this->cache->delete($this->table . '_' . $o[$this->key]);
                unset($o[$this->key]);
            } else {
                show_error('Method: update() CRUD : Can not found value key for update');
            }
        } else {
            foreach ($where as $field => $data) {
                if (!in_array($field, $this->fields)) {
                    show_error("CRUD : '$this->table' don't have in '$field'");
                }
            }
            $this->db->where($where);
            // Clear cache
            $row = $this->get_by($where);
            if($row) {
                $this->cache->delete($this->table . '_' . $row['id']);
            }
        }

        $data = array();

        foreach ($o as $k => $v) {
            if (in_array($k, $this->fields)) {
                $data[$k] = $v;
            }
        }

        return $this->db->update($this->table, $data);
    }

    /**
     * Update code
     * @return boolean
     */
    public function update_code($code = "") {
        $this->db->query("UPDATE {$this->table} SET code=concat('{$code}',RIGHT(concat('000000',id),6)) WHERE code IS NULL OR code = ''");
        return TRUE;
    }
    
    /**
     * Update deleted = time()
     * @return boolean
     */
    public function delete($conditions = array())
    {
        if(is_numeric($conditions)) {
            $this->db->where($this->key, $conditions);
            // Clear cache
            $this->cache->delete($this->table . '_' . $conditions);
        }
        else if (is_array($conditions) && count($conditions) > 0) 
        {
            foreach ($conditions as $field => $data) {
                if (!in_array($field, $this->fields)) {
                    show_error("CRUD : '$this->table' don't have in '$field'");
                }
            }
            $this->db->where($conditions);
            // Clear cache
            $rows = $this->get_rows(array('select' => 'id', 'where' => $conditions));
            if($rows) {
                foreach ($rows as $row) {
                    $this->cache->delete($this->table . '_' . $row['id']);
                }
            }
        }
        return $this->db->update($this->table, array('deleted' => time()));
    }
    
    /**
     * Clear all cached
     * @return boolean
     */
    public function clean_cached()
    {
        return $this->cache->clean();
    }
    
    /**
     * get db platform
     * @return String
     */
    public function platform()
    {
        return $this->db->platform() . ' ' .$this->db->version();
    }

    /**
     * Get All Query String
     * @return array
     */
    public function all_query()
    {
        $result = array();
        $times = $this->db->query_times; 
        foreach ($this->db->queries as $key => $query) {
            $result[] = "Execution Time: " . $times[$key] . " -> " . $query;
        }
        
        return $result;
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
            show_error("Method: __call() CRUD : Method '$method' not found");
        }
    }

}

