<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Item_Images_Model extends Model {
    
	var $new_id = "";

    function Item_Images_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		$data["added_date"] = date("Y-m-d h:i:s");
		
        if($this->db->insert('item_images', $data)) {
			$this->new_id = $this->db->insert_id();
			return true;
		}
        else {
			return false;
		}
    }

    function update($id, $data) {
		$this->db->where('id', $id);
        if($this->db->update('item_images', $data)) {
			return true;
		}
        else {
			return false;
		}
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('item_images')) {
			return true;
		}
        else {
			return false;
		}
	}

	function return_new_id() {
		return $this->new_id;
	}
    
    function get_by_id($id){
        $row = $this->db->getwhere('item_images', array('id' => $id));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_item_id($item_id){
        $row = $this->db->getwhere('item_images', array('item_id' => $item_id));
        return $row->result_array();
    }
    
    function delete_by_id($id){
		$this->db->delete('item_images', array('id' => $id));		
	}
    
    function search($params, $extra_where = '') {
		$count  = 'SELECT COUNT(DISTINCT(id)) AS total';
		$select = 'SELECT *';
		$from   = 'FROM item_images';
		$where  = 'WHERE TRUE';
		if(isset($params['image']) && $params['image'] != '') {
			$where .= ' AND image like "%' . $params['image'] . '%"';
		}
        if(isset($params['item_id']) && $params['item_id'] != '') {
			$where .= ' AND item_id = "' . $params['item_id'] . '"';
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