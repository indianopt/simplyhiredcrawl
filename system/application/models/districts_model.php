<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Districts_Model extends Model {

    function Districts_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		if($this->db->insert('districts', $data)) {
			return true;
		}
        else {
			return false;
		}
    }

    function update($id, $data) {
		$this->db->where('id', $id);
        if($this->db->update('districts', $data)) {
			return true;
		}
        else {
			return false;
		}
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('districts')) {
			return true;
		}
        else {
			return false;
		}
	}
    
    function get_by_id($id){
        $row = $this->db->getwhere('districts', array('id' => $id));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_name($name){
        $row = $this->db->getwhere('districts', array('name' => $name));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_alias($alias){
        $row = $this->db->getwhere('districts', array('alias' => $alias));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function delete_by_id($id){
		$this->db->delete('districts', array('id' => $id));		
	}
    
    function search($params) {
		$count  = 'SELECT COUNT(DISTINCT(id)) AS total';
		$select = 'SELECT *';
		$from   = 'FROM districts';
		$where  = 'WHERE TRUE';
		if(isset($params['name']) && $params['name'] != '') {
			$where .= ' AND name LIKE "%' . $params['name'] . '%"';
		}
        if(isset($params['province_id']) && $params['province_id'] != '' && $params['province_id'] != -1) {
			$where .= ' AND province_id = ' . $params['province_id'];
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
    
    function get_districts_and_number_of_items($province_id, $limit = false) {
        $query = $this->db->query("select distinct d.id, d.name, d.alias, count(c.id) as number_of_items from districts d left join cafeshops c on d.id = c.district_id
                                    where d.province_id = $province_id and c.status = 1 group by d.id order by d.sort_order" . ($limit ? " limit $limit" : ''));
        return $query->result_array();
    }
}
?>