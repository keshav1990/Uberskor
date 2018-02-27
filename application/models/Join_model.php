<?php



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */



class Join_model extends CI_Model {



    function get_where_order_join($table, $table2, $where, $where2, $orderby, $type) {

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->order_by($orderby);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_order_join_groupby($table, $table2, $where, $where2, $orderby, $type, $groupby) {

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->order_by($orderby);

        $query = $this->db->group_by($groupby);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_join($table, $table2, $where, $where2, $type) {

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_wherein_order_join($table, $table2, $where, $where2, $wherein_col, $wherein, $orderby, $type) {

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->order_by($orderby);

        $this->db->where_in($wherein_col, $wherein);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_wherein_order_join_limit($table, $table2, $where, $where2, $wherein_col, $wherein, $orderby, $limit, $type) {

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->order_by($orderby);

        $this->db->where_in($wherein_col, $wherein);

        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_wherenotin_order_join($table, $table2, $where, $where2, $wherenot_col, $wherenot, $orderby, $type) {

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->order_by($orderby);

        $this->db->where_not_in($wherenot_col, $wherenot);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_wherenotin_nested_order_join($table, $table2, $table3, $where, $where2, $where3, $wherenot_col, $wherenot, $orderby, $type) {

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->join($table3, $where3, $type);

        $query = $this->db->order_by($orderby);

        $this->db->where_not_in($wherenot_col, $wherenot);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_order_join_limit($table, $table2, $where, $where2, $orderby, $limit, $type) {

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->order_by($orderby);

        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);

        $query = $this->db->get_where($table, $where);



        return $query->result();

    }



    function get_orwhere_order_join_limit($table, $table2, $where, $whereor, $where2, $orderby, $limit, $type) {

        $this->db->where($where);

        $this->db->or_where($whereor);

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->order_by($orderby);

        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);

        $query = $this->db->get($table);

        return $query->result();

    }



    function get_wherein_order_join_group_limit($table, $table2, $where_join, $where, $wherein_col, $wherein = '', $field, $group, $limit, $orderby) {

        $query = $this->db->select('*');

        $query = $this->db->join($table2, $where_join, 'right');

        $query = $this->db->order_by($orderby);

        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);

        $this->db->select_sum($field);

        $this->db->where_in($wherein_col, $wherein);

        $this->db->group_by($group);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_notin_order_join_search($table, $table2, $where_join, $where, $wherenot_col, $wherenot = '', $wheresearch, $orderby) {

        $query = $this->db->select('*');

        $query = $this->db->join($table2, $where_join, 'inner');

        $this->db->where_not_in($wherenot_col, $wherenot);

        $query = $this->db->order_by($orderby);

        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');



        $this->db->where($like_conditions);



        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_join_sum_limit_order($table, $table2, $where, $where_join, $field, $limit, $order, $join) {

        $query = $this->db->select('*');

        $query = $this->db->join($table2, $where_join, $join);

        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);

        $this->db->select_sum($field);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_order_join_group_limit($table, $table2, $where, $where_join, $field, $group, $limit, $orderby) {

        $query = $this->db->select('*');

        $query = $this->db->join($table2, $where_join, 'right');

        $query = $this->db->order_by($orderby);

        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);

        $this->db->select_sum($field);

        $this->db->group_by($group);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_order_join_search_limit($table, $table2, $where_join, $where, $wherein_col, $wherein = '', $wherenot_col, $wherenot = '', $wheresearch, $group, $limit) {

        $query = $this->db->select('*');

        $query = $this->db->join($table2, $where_join, 'left');

        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);

        $this->db->where_in($wherein_col, $wherein);

        $this->db->where_not_in($wherenot_col, $wherenot);

        $this->db->group_by($group);

        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');



        $this->db->where($like_conditions);



        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_like($table, $wheresearch) {

        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');

        $this->db->where($like_conditions);

        $query = $this->db->get($table);

        return $query->result();

    }



    function get_where_order_join_sum_search_limit($table, $table2, $where_join, $where, $wherein_col, $wherein = '', $field, $wherenot_col, $wherenot = '', $wheresearch, $group, $limit, $orderby) {

        $query = $this->db->select('*');

        $query = $this->db->join($table2, $where_join, 'right');

        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);

        $query = $this->db->order_by($orderby);

        $this->db->where_in($wherein_col, $wherein);

        $this->db->select_sum($field);

        $this->db->where_not_in($wherenot_col, $wherenot);

        $this->db->group_by($group);

        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');



        $this->db->where($like_conditions);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function make_like_conditions($fields, $type) {

        $likes = array();

        foreach ($fields as $key => $search) {

            $likes[] = "`$key` like '%$search%'";

        }

        return '(' . implode($type, $likes) . ')';

    }



    function get_where_order_join_notin_limit($table, $table2, $where_join, $where, $wherein_col, $wherein = '', $where_col, $whereval = '', $wherenot_col, $wherenot, $field, $group, $limit, $orderby) {

        $query = $this->db->select('*');

        $query = $this->db->join($table2, $where_join, 'Right');

        $query = $this->db->limit($limit['per_page'], $limit['cur_page']);

        $query = $this->db->order_by($orderby);

        $this->db->where_in($wherein_col, $wherein);

        $this->db->where_in($where_col, $whereval);

        $this->db->where_not_in($wherenot_col, $wherenot);

        $this->db->select_sum($field);

        $this->db->group_by($group);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_order_3nested_leftjoin($table, $table2, $table3, $table4, $where, $where2, $where3, $where4, $orderby) {

        $query = $this->db->join($table2, $where2, 'left');

        $query = $this->db->join($table3, $where3, 'left');

        $query = $this->db->join($table4, $where4, 'left');

        $query = $this->db->order_by($orderby);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_order_2nested_right_left_join($table, $table2, $table3, $where, $where2, $where3, $orderby) {

        $query = $this->db->join($table2, $where2, 'right');

        $query = $this->db->join($table3, $where3, 'left');

        $query = $this->db->order_by($orderby);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_order_2nested_leftjoin($table, $table2, $table3, $where, $where2, $where3, $orderby) {

        $query = $this->db->join($table2, $where2, 'left');

        $query = $this->db->join($table3, $where3, 'left');

        $query = $this->db->order_by($orderby);

        $query = $this->db->get_where($table, $where);

        return $query->result();

    }



    function get_where_join_like($table, $table2, $where, $wheresearch, $where2, $type) {

        $this->db->where($where);

        $query = $this->db->join($table2, $where2, $type);

        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');

        $this->db->where($like_conditions);

        $query = $this->db->get($table);

        return $query->result();

    }



    function get_where_join_like_groupby($table, $table2, $where, $wheresearch, $where2, $group, $type) {

        $this->db->where($where);

        $query = $this->db->join($table2, $where2, $type);

        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');

        $this->db->where($like_conditions);

        $this->db->group_by($group);

        $query = $this->db->get($table);

        return $query->result();

    }



    function get_where_join_2nested_like($table, $table2, $table3, $where, $wheresearch, $where2, $where3, $type) {

        $this->db->where($where);

        $query = $this->db->join($table2, $where2, $type);

        $query = $this->db->join($table3, $where3, $type);

        $like_conditions = $this->make_like_conditions($wheresearch, ' OR ');

        $this->db->where($like_conditions);

        $query = $this->db->get($table);

        return $query->result();

    }



}

