<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class CafeShops_Model extends Model {

    function CafeShops_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		$categories = isset($data['categories']) ? $data['categories'] : array();
        unset($data['categories']);
        
        $this->db->insert('cafeshops', $data);
        if($this->db->insert_id() != false) {
            $this->add_categories_to_cafeshop($this->db->insert_id(), $categories);
        }
    }

    function update($id, $data) {
		$categories = isset($data['categories']) ? $data['categories'] : array();
        unset($data['categories']);
        
        $this->db->update('cafeshops', $data, array('id' => $id));
        $this->add_categories_to_cafeshop($id, $categories);
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('cafeshops')) {
			return true;
		}
        else {
			return false;
		}
	}
    
    function get_by_id($id) {
        $sql = "SELECT cs.*, p.name AS province_name, d.name AS district_name, u.username
                FROM cafeshops cs LEFT JOIN cafeshops_categories csc ON cs.id = csc.cafeshop_id LEFT JOIN categories c ON c.id = csc.category_id
                LEFT JOIN users u ON cs.user_id = u.id
                LEFT JOIN provinces p ON cs.province_id = p.id
                LEFT JOIN districts d ON cs.district_id = d.id
                WHERE cs.id = '$id'";
        $row = $this->db->query($sql);
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_name($name) {
        $sql = "SELECT cs.*, c.name AS category_name, p.name AS province_name, d.name AS district_name, u.username
                FROM cafeshops cs LEFT JOIN cafeshops_categories csc ON cs.id = csc.cafeshop_id LEFT JOIN categories c ON c.id = csc.category_id
                LEFT JOIN users u ON cs.user_id = u.id
                LEFT JOIN provinces p ON cs.province_id = p.id
                LEFT JOIN districts d ON cs.district_id = d.id
                WHERE cs.name = '$name'";
        $row = $this->db->query($sql);
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_alias($alias) {
        $sql = "SELECT cs.*, p.name AS province_name, d.name AS district_name, u.username
                FROM cafeshops cs LEFT JOIN cafeshops_categories csc ON cs.id = csc.cafeshop_id LEFT JOIN categories c ON c.id = csc.category_id
                LEFT JOIN users u ON cs.user_id = u.id
                LEFT JOIN provinces p ON cs.province_id = p.id
                LEFT JOIN districts d ON cs.district_id = d.id
                WHERE cs.alias = '$alias'";
        $row = $this->db->query($sql);
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_categories_by_cafeshop_id($cafeshop_id) {
        $query = $this->db->query("SELECT c.* FROM cafeshops_categories csc LEFT JOIN categories c ON csc.category_id = c.id WHERE cafeshop_id = '$cafeshop_id'");
        
		return $query->result_array();
    }
    
    function get_relate_cafeshops($cs_id, $limit = 5) {
        $categories = array();
        foreach($this->get_categories_by_cafeshop_id($cs_id) as $c) {
            $categories[] = $c['id'];
        }
        
        $extra_where = !empty($categories) ? "AND c.id IN (" . implode(', ', $categories) . ") AND cs.id <> $cs_id" : '';

        $cafeshops = $this->search(array('status' => 1, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => 0, 'limit' => $limit), $extra_where);
        return $cafeshops['records'];
    }
    
    function delete_by_id($id) {
		$this->db->delete('cafeshops', array('id' => $id));
	}
    
    function add_categories_to_cafeshop($cafeshop_id, $categories) {
        if(is_array($categories) && count($categories) > 0) {
            $this->db->query("DELETE FROM cafeshops_categories WHERE cafeshop_id = $cafeshop_id");
            foreach($categories as $cid) {
                $this->db->insert('cafeshops_categories', array('cafeshop_id' => $cafeshop_id, 'category_id' => $cid));
            }
        }
    }
    
    function search($params, $extra_where = '') {
		$count  = 'SELECT COUNT(DISTINCT(cs.id)) AS total';
		$select = 'SELECT DISTINCT cs.*, p.name AS province_name, d.name AS district_name, u.username';
		$from   = 'FROM cafeshops cs LEFT JOIN cafeshops_categories csc ON cs.id = csc.cafeshop_id LEFT JOIN categories c ON c.id = csc.category_id
                   LEFT JOIN users u ON cs.user_id = u.id
                   LEFT JOIN provinces p ON cs.province_id = p.id
                   LEFT JOIN districts d ON cs.district_id = d.id
                   ';
		$where  = 'WHERE TRUE';
		if(isset($params['name']) && $params['name'] != '') {
			$where .= ' AND cs.name like "%' . $params['name'] . '%"';
		}
        if(isset($params['category_id']) && $params['category_id'] != '' && $params['category_id'] != '-1') {
			$where .= ' AND c.id = ' . $params['category_id'];
		}
        if(isset($params['province_id']) && $params['province_id'] != '' && $params['province_id'] != '-1') {
			$where .= ' AND cs.province_id = ' . $params['province_id'];
		}
        if(isset($params['category_alias']) && $params['category_alias'] != '' && $params['category_alias'] != 'all') {                       
            $where .= ' AND c.alias = "' . $params['category_alias'] . '"';
		}
        if(isset($params['province_alias']) && $params['province_alias'] != '' && $params['province_alias'] != 'all') {                       
            $where .= ' AND p.alias = "' . $params['province_alias'] . '"';
		}
        if(isset($params['district_alias']) && $params['district_alias'] != '' && $params['district_alias'] != 'all') {                       
            $where .= ' AND d.alias = "' . $params['district_alias'] . '"';
		}
        if(isset($params['district_id']) && $params['district_id'] != '' && $params['district_id'] != '-1') {
			$where .= ' AND cs.district_id = ' . $params['district_id'];
		}
        if(isset($params['status']) && $params['status'] != '' && $params['status'] != '-1') {
			$where .= ' AND cs.status = ' . $params['status'];
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