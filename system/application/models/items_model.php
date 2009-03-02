<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Items_Model extends Model {

    function Items_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		if($this->db->insert('items', $data)) {
			return true;
		}
        else {
			return false;
		}
    }

    function update($id, $data) {
		$this->db->where('id', $id);
        if($this->db->update('items', $data)) {
			return true;
		}
        else {
			return false;
		}
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('items')) {
			return true;
		}
        else {
			return false;
		}
	}
    
    function get_by_id($id) {
        $sql = "SELECT it.*, c.name AS category_name, p.name AS province_name, d.name AS district_name
                FROM items it LEFT JOIN categories c ON it.category_id = c.id
                LEFT JOIN provinces p ON it.province_id = p.id
                LEFT JOIN districts d ON it.district_id = d.id
                WHERE it.id = '$id'";
        $row = $this->db->query($sql);
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_name($name) {
        $sql = "SELECT it.*, c.name AS category_name, p.name AS province_name, d.name AS district_name
                FROM items it LEFT JOIN categories c ON it.category_id = c.id
                LEFT JOIN provinces p ON it.province_id = p.id
                LEFT JOIN districts d ON it.district_id = d.id
                WHERE it.name = '$name'";
        $row = $this->db->query($sql);
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_alias($alias) {
        $sql = "SELECT it.*, c.name AS category_name, p.name AS province_name, d.name AS district_name
                FROM items it LEFT JOIN categories c ON it.category_id = c.id
                LEFT JOIN provinces p ON it.province_id = p.id
                LEFT JOIN districts d ON it.district_id = d.id
                WHERE it.alias = '$alias'";
        $row = $this->db->query($sql);
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function delete_by_id($id) {
		$this->db->delete('items', array('id' => $id));
	}
    
    function search($params, $extra_where = '') {
		$count  = 'SELECT COUNT(DISTINCT(p.id)) AS total';
		$select = 'SELECT it.*, c.name AS category_name, p.name AS province_name, d.name AS district_name';
		$from   = 'FROM items it LEFT JOIN categories c ON it.category_id = c.id
                   LEFT JOIN provinces p ON it.province_id = p.id
                   LEFT JOIN districts d ON it.district_id = d.id
                   ';
		$where  = 'WHERE TRUE';
		if(isset($params['name']) && $params['name'] != '') {
			$where .= ' AND it.name like "%' . $params['name'] . '%"';
		}
        if(isset($params['category_id']) && $params['category_id'] != '' && $params['category_id'] != '-1') {
			$where .= ' AND it.category_id = ' . $params['category_id'];
		}
        if(isset($params['province_id']) && $params['province_id'] != '' && $params['province_id'] != '-1') {
			$where .= ' AND it.province_id = ' . $params['province_id'];
		}
        if(isset($params['district_id']) && $params['district_id'] != '' && $params['district_id'] != '-1') {
			$where .= ' AND it.district_id = ' . $params['district_id'];
		}
        if(isset($params['status']) && $params['status'] != '' && $params['status'] != '-1') {
			$where .= ' AND it.status = ' . $params['status'];
		}
        if($extra_where != '') {
			$where .= $extra_where;
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