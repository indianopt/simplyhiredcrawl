<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Manufacturers_Model extends Model {

    function Manufacturers_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		if($this->db->insert('manufacturers', $data)) {
			return true;
		}
        else {
			return false;
		}
    }

    function update($id, $data) {
		$this->db->where('id', $id);
        if($this->db->update('manufacturers', $data)) {
			return true;
		}
        else {
			return false;
		}
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('manufacturers')) {
			return true;
		}
        else {
			return false;
		}
	}
    
    function get_by_id($id) {
        $row = $this->db->getwhere('manufacturers', array('id' => $id));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_name($name) {
        $row = $this->db->getwhere('manufacturers', array('name' => $name));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function delete_by_id($id) {
		$this->db->delete('manufacturers', array('id' => $id));		
	}
    
    function search($params) {
		$count  = 'SELECT COUNT(DISTINCT(id)) AS total';
		$select = 'SELECT *';
		$from   = 'FROM manufacturers';
		$where  = 'WHERE TRUE';
		if(isset($params['name']) && $params['name'] != '') {
			$where .= ' AND name like "%' . $params['name'] . '%"';
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