<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Jobs_Model extends Model {

    function Jobs_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		if($this->db->insert('jobs', $data)) {
			return $this->db->insert_id();
		}
        else {
			return false;
		}
    }

    function update($id, $data) {
		$this->db->where('id', $id);
        if($this->db->update('jobs', $data)) {
			return true;
		}
        else {
			return false;
		}
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('jobs')) {
			return true;
		}
        else {
			return false;
		}
	}
    
    function get_by_id($id){
        $row = $this->db->query("SELECT j.*, c.name AS category_name FROM jobs j LEFT JOIN job_categories c ON j.category_id = c.id WHERE j.id = $id");
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_name($name){
        $row = $this->db->getwhere("SELECT j.*, c.name AS category_name FROM jobs j LEFT JOIN job_categories c ON j.category_id = c.id WHERE j.name = '$name'");
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_name_company_location_description_time_latest_crawl_from_category_id($name, $company, $location, $description, $time_latest, $crawl_from, $category_id){
        $row = $this->db->getwhere('jobs', array(
                                                    'name' => $name,
                                                    'company' => $company,
                                                    'location' => $location,
                                                    'description' => $description,
                                                    'time_latest' => $time_latest,
                                                    'crawl_from' => $crawl_from,
                                                    'category_id' => $category_id
                                                ));
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
        
    function delete_by_id($id){
		$this->db->delete('jobs', array('id' => $id));		
	}
    
    function search($params, $extra_where = '') {
		$count  = 'SELECT COUNT(DISTINCT(j.id)) AS total';
		$select = 'SELECT j.*, c.name AS category_name';
		$from   = 'FROM jobs j LEFT JOIN job_categories c ON j.category_id = c.id';
		$where  = 'WHERE TRUE';
		if(isset($params['name']) && $params['name'] != '') {
			$where .= ' AND j.name LIKE "%' . $params['name'] . '%"';
		}
        if(isset($params['keyword']) && $params['keyword'] != '' && $params['keyword'] != 'none') {
            $keyword = trim($params['keyword']);
			$where .= " AND MATCH(j.name, j.company, j.description) AGAINST ('$keyword' IN BOOLEAN MODE)";
		}
        if(isset($params['location']) && $params['location'] != '' && $params['location'] != 'none') {
            $location = trim($params['location']);
			$where .= " AND MATCH(j.location) AGAINST ('$location' IN BOOLEAN MODE)";
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