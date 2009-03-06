<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class JobCategories_Model extends Model {

    function JobCategories_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		if($this->db->insert('job_categories', $data)) {
			return $this->db->insert_id();
		}
        else {
			return false;
		}
    }

    function update($id, $data) {
        if($id !== false) {
		    $this->db->where('id', $id);
        }
        if($this->db->update('job_categories', $data)) {
			return true;
		}
        else {
			return false;
		}
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('job_categories')) {
			return true;
		}
        else {
			return false;
		}
	}
    
    function get_by_id($id){
        $row = $this->db->getwhere('job_categories', array('id' => $id));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_name($name){
        $row = $this->db->getwhere('job_categories', array('name' => $name));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_alias($alias){
        $row = $this->db->getwhere('job_categories', array('alias' => $alias));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function delete_by_id($id){
		$this->db->delete('job_categories', array('id' => $id));		
	}
    
    function search($params, $extra_where = '') {
		$count  = 'SELECT COUNT(DISTINCT(id)) AS total';
		$select = 'SELECT *';
		$from   = 'FROM job_categories';
		$where  = 'WHERE TRUE';
		if(isset($params['name']) && $params['name'] != '') {
			$where .= ' AND name like "%' . $params['name'] . '%"';
		}
        
        if(isset($params['parent_id'])) {
			$where .= ' AND parent_id = ' . $params['parent_id'];
		}

        if($extra_where != '') {
			$where .= " $extra_where";
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