<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Nodes_Model extends Model {

	function Nodes_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }
	
    function insert($data){
        $this->db->insert('nodes', $data);
        return $this->db->insert_id();
    }
    
    function update($id, $data){
        $this->db->update('nodes', $data, array('id' => $id));
    }
    
    function get_by_id($id){
        $row = $this->db->getwhere('nodes', array('id' => $id));      
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }

	function get_by_reference_name($name){
        $row = $this->db->getwhere('nodes', array('reference_name' => $name));      
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function search($params, $extra_where = '') {
		$count = 'SELECT COUNT(DISTINCT(id)) AS total';
		$select = 'SELECT DISTINCT *';
		$from = 'FROM nodes';
		$where = 'WHERE TRUE';

		if(isset($params['status']) && $params['status'] != '') {
			$where .= ' AND status =' . $params['status'];
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
		    if (isset($params['extra_order']) && $params['extra_order'] != '')
				$order_by .= ', ' . $params['extra_order'];
		}
		
		$limit = '';
		if (isset($params['start']) && isset($params['perpage']))
			$limit .= 'LIMIT ' . $params['start'] . ', ' . $params['perpage'];
		
		$total = $this->db->query(implode(' ', array($count, $from, $where)));
		$total = $total->row();
		$total = $total->total;
		$query = $this->db->query(implode(' ', array($select, $from, $where, $order_by, $limit)));
		return array('records' => $query->result_array(), 'total' => $total);
	}
    
    function delete_by_id($id){
		$row = $this->db->delete('nodes', array('id' => $id));		
	}
}
?>