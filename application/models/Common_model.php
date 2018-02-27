<?php

class Common_model extends CI_Model {

    function get_all_orderby($table, $order) {
        $query = $this->db->order_by($order);
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_where($table, $where = '') {
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }
	function direct_query($sql) {
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_where_limit($table, $where, $limit) {
        $query = $this->db->where($where);
        $query = $this->db->limit($limit);
        $query = $this->db->get($table);
        return $query->result();
    }
	function getfields_where_order($table,$fields='*', $where = '', $order) {
		$this->db->select($fields);
        $query = $this->db->order_by($order);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }
	function get_singel_field_where_order($table,$field, $where = '', $order) {
		$this->db->select($field);
        $query = $this->db->order_by($order);
        $query = $this->db->get_where($table, $where)->result();
        return (!empty($query)) ? $query[0]->$field : '';
    }

    function get_orwhere($table, $where = '', $whereor = '', $order) {
        $this->db->where($where);
        $this->db->or_where($whereor);
        $query = $this->db->order_by($order);
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_wherenotin($table, $where = '', $where_notin = '', $where_notin_value = '', $order) {
        $this->db->where($where);
        $this->db->where_not_in($where_notin, $where_notin_value);
        $query = $this->db->order_by($order);
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_wherenotin_limit($table, $where = '', $where_notin = '', $where_notin_value = '', $order, $limit) {
        $this->db->where($where);
        $this->db->where_not_in($where_notin, $where_notin_value);
        $query = $this->db->order_by($order);
        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_where_notin($table, $where_notin = '', $where_notin_value = '', $order) {
        $this->db->where_not_in($where_notin, $where_notin_value);
        $query = $this->db->order_by($order);
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_where_notin_search($table, $where, $wheresearch, $where_notin = '', $where_notin_value = '', $order) {
        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');
        $this->db->where($like_conditions);
        $this->db->where_not_in($where_notin, $where_notin_value);
        $query = $this->db->order_by($order);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    function get_where_order($table, $where = '', $order) {
        $query = $this->db->order_by($order);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }
    function get_where_order_limit($table, $where = '', $orderby, $limit) {
        $query = $this->db->order_by($orderby);
        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    function get_where_order_limit_single($table, $where = '', $orderby, $limit) {
        $query = $this->db->order_by($orderby);
        $query = $this->db->limit($limit);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    function count_where($table, $where) {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->count_all_results();
    }

    function count_wherein($table, $where, $wherein_col, $wherein = '') {
        $this->db->from($table);
        $this->db->where($where);
        $this->db->where_in($wherein_col, $wherein);
        return $this->db->count_all_results();
    }

    function sum_where($table, $where, $field) {
        $this->db->select_sum($field);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    function search_count($table, $where, $wheresearch) {
        $this->db->from($table);
        $this->db->where($where);
        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');
        $this->db->where($like_conditions);
        return $this->db->count_all_results();
    }

    function get_where_search($table, $where, $wheresearch) {
        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');
        $this->db->where($like_conditions);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    function get_wherein($table, $where = '', $wherein_col, $wherein = '', $order) {
        $this->db->where($where);
        $this->db->where_in($wherein_col, $wherein);
        $query = $this->db->order_by($order);
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_wherein_limit($table, $where = '', $wherein_col, $wherein = '', $limit, $order) {
        $this->db->where($where);
        $this->db->where_in($wherein_col, $wherein);
        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);
        $query = $this->db->order_by($order);
        $query = $this->db->get($table);
        return $query->result();
    }



    function make_like_conditions($fields, $type) {
        $likes = array();
        foreach ($fields as $key => $search) {
            $likes[] = "`$key` like '%$search%'";
        }
        return '(' . implode($type, $likes) . ')';
    }


	
	function get_where_order_groupby($table, $where, $orderby,$groupby) {
        $query = $this->db->order_by($orderby);
        $query = $this->db->group_by($groupby);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }


//################################################## AFFECTED QUERY START ##########################################################	
    function insert($table, $data = array()) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function insert_batch($table, $data = array()) {
        $this->db->insert_batch($table, $data);
        return $this->db->insert_id();
    }

    function update($table, $data = array(), $where = array()) {
        $this->db->where($where);
     return   $this->db->update($table, $data);
    //    print_r($this->db->last_query());
      //  return $this->db->affected_rows();
    }

    function delete($table, $where = array()) {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }

	function delete_multiple($table, $where = array(),$col) {
		$this->db->where_in( $col,$where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
//################################################## AFFECTED QUERY END ##########################################################	


}
