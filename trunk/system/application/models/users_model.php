<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Users_Model extends Model {
    
	var $new_id = "";

    function Users_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		$data["added_date"] = date("Y-m-d h:i:s");
		
        if($this->db->insert('users', $data)) {
			$this->new_id = $this->db->insert_id();
			return true;
		}
        else {
			return false;
		}
    }

    function update($id, $data) {
		$this->db->where('id', $id);
        if($this->db->update('users', $data)) {
			return true;
		}
        else {
			return false;
		}
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('users')) {
			return true;
		}
        else {
			return false;
		}
	}

	function return_new_id() {
		return $this->new_id;
	}
    
    function get_by_username($username) {
        $query = $this->db->getwhere('users', array('username' => $username));
        return $query->num_rows() > 0 ? $query->row_array() : null;
    }
    
    function get_by_email($email) {
        $query = $this->db->getwhere('users', array('email' => $email));
        return $query->num_rows() > 0 ? $query->row_array() : null;
    }
    
    function get_by_username_password($username, $password) {
        $query = $this->db->getwhere('users', array('username' => $username, 'password' => $password));
        return $query->num_rows() > 0 ? $query->row_array() : null;
    }
    
    function get_by_id($id){
        $row = $this->db->getwhere('users', array('id' => $id));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function delete_by_id($id){
		$this->db->delete('users', array('id' => $id));		
	}
    
    function search($params) {
		$count  = 'SELECT COUNT(DISTINCT(id)) AS total';
		$select = 'SELECT *';
		$from   = 'FROM users';
		$where  = 'WHERE TRUE';
		if(isset($params['name']) && $params['name'] != '') {
			$where .= ' AND name like "%' . $params['name'] . '%"';
		}
        if(isset($params['username']) && $params['username'] != '') {
			$where .= ' AND username like "%' . $params['username'] . '%"';
		}
		
		$order_by = '';
        if(isset($params['order_by']) && $params['order_by'] != '') {
			$order_direction = '';
			if (isset($params['order_direction']) && strcasecmp($params['order_direction'], 'DESC') == 0)
				$order_direction = 'DESC';
			if (isset($params['order_direction']) && strcasecmp($params['order_direction'], 'ACS') == 0)
				$order_direction = 'ASC';
			
			$order_by = 'ORDER BY ' . $params['order_by'] . ' ' . $order_direction;
		}
		
		$limit = '';
		if (isset($params['start']) && isset($params['perpage']))
			$limit .= 'LIMIT ' . $params['start'] . ', ' . $params['perpage'];
		
		$total = $this->db->query(implode(' ', array($count, $from, $where)));
		$total = $total->row();
		$total = $total->total;
		$query = $this->db->query(implode(' ', array($select, $from, $where, $order_by, $limit)));
        
		$records = $query->result_array();
        $query->free_result();
		return array('records' => $records, 'total' => $total);
	}
}
?>