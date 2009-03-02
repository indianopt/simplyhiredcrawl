<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Categories_Model extends Model {

    function Categories_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		if($this->db->insert('categories', $data)) {
			return true;
		}
        else {
			return false;
		}
    }

    function update($id, $data) {
		$this->db->where('id', $id);
        if($this->db->update('categories', $data)) {
			return true;
		}
        else {
			return false;
		}
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('categories')) {
			return true;
		}
        else {
			return false;
		}
	}
    
    function get_by_id($id){
        $row = $this->db->getwhere('categories', array('id' => $id));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_name($name){
        $row = $this->db->getwhere('categories', array('name' => $name));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_alias($alias){
        $row = $this->db->getwhere('categories', array('alias' => $alias));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function delete_by_id($id){
		$this->db->delete('categories', array('id' => $id));		
	}
    
    function search($params) {
		$count  = 'SELECT COUNT(DISTINCT(id)) AS total';
		$select = 'SELECT *';
		$from   = 'FROM categories';
		$where  = 'WHERE TRUE';
		if(isset($params['name']) && $params['name'] != '') {
			$where .= ' AND name like "%' . $params['name'] . '%"';
		}
        if(isset($params['type']) && $params['type'] != '' && $params['type'] != '-1') {
			$where .= ' AND type = "' . $params['type'] . '"';
		}

        $CI =& get_instance();
        $CI->load->config('settings');
        $category_types = $CI->config->item('category_types');
        $enabled_category_types = array();

        foreach($category_types as $type => $enabled) {
            if($enabled) {
                $enabled_category_types[] = "'$type'";
            }
        }
        
        if(!empty($enabled_category_types)) {
            $where .= ' AND type IN (' . implode(', ', $enabled_category_types) . ')';
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
    
    function get_cafeshop_categories_and_number_of_items($limit = false) {
        $query = $this->db->query("select distinct c.id, c.name, c.alias, count(cs.id) as number_of_items from categories c left join cafeshops_categories cc on c.id = cc.category_id
                                    left join cafeshops cs on cc.cafeshop_id = cs.id
                                    where c.type = 'cafeshop' and cs.status = 1 group by c.id order by c.sort_order" . ($limit ? " limit $limit" : ''));
        return $query->result_array();
    }
}
?>