<?php 
class Login_model extends CI_Model {

	function get_login_where($table, $where, $num = 0){

		$query = $this->db->get_where($table,$where);		

		if ($num > 0)
		{
			return $query->num_rows();
		}
			else
		{	
			return $query->result();
		}
	}
	
	function get_login_where_orand($table, $where, $whereor, $num = 0){

		$this->db->where($whereor);
		$this->db->or_having($where);
		$query = $this->db->get($table);
		
		if ($num > 0)
		{
			return $query->num_rows();
		}
			else
		{	
			return $query->result();
		}

	}
}
?>