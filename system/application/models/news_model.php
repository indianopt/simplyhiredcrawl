<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class News_Model extends Model {

	function News_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }
	
    function insert($data){
        $categories = isset($data['categories']) ? $data['categories'] : array();
        unset($data['categories']);
        
        $this->db->insert('news', $data);
        if($this->db->insert_id() != false) {
            $this->add_categories_to_news($this->db->insert_id(), $categories);
        }
    }
    
    function add_categories_to_news($nid, $categories) {
        if(is_array($categories) && count($categories) > 0) {
            $this->db->query("DELETE FROM news_categories WHERE news_id = $nid");
            foreach($categories as $cid) {
                $this->db->insert('news_categories', array('news_id' => $nid, 'category_id' => $cid));
            }
        }
    }
    
    function update($id, $data){
        $categories = isset($data['categories']) ? $data['categories'] : array();
        unset($data['categories']);
        
        $this->db->update('news', $data, array('id' => $id));

        $this->add_categories_to_news($id, $categories);
    }
    
    function get_by_id($id){
        $row = $this->db->getwhere('news', array('id' => $id));      
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_title($title){
        $row = $this->db->getwhere('news', array('title' => $title));      
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_real_title($title){
        $title = real_title($title);
        $row = $this->db->query("SELECT * FROM news WHERE title LIKE '$title%'");      
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_alias($alias){
        $row = $this->db->getwhere('news', array('alias' => $alias));      
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function get_by_sourename_source_record_id($n, $id){
        $row = $this->db->getwhere('news', array('source_name' => $n, 'source_record_id' => $id));      
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
	
	function delete_by_id($id){
		$row = $this->db->delete('news', array('id' => $id));		
	}
    
    function get_categories_by_news_id($news_id) {
        $query = $this->db->query("SELECT c.* FROM news_categories nc LEFT JOIN categories c ON nc.category_id = c.id WHERE news_id = '$news_id'");
        
		return $query->result_array();
    }
    
    function get_relate_news($news_id, $limit = 5) {
        $categories = array();
        foreach($this->get_categories_by_news_id($news_id) as $c) {
            $categories[] = $c['id'];
        }
        $categories = implode(', ', $categories);
        $extra_where = "AND c.id IN ($categories) AND n.id <> $news_id";
        
        $news = $this->search(array('status' => 1, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => 0, 'limit' => $limit), $extra_where);
        return $news['records'];
    }
    
    function search($params, $extra_where = '') {
		$count = 'SELECT COUNT(DISTINCT(n.id)) AS total';
		$select = 'SELECT DISTINCT n.*, u.username';
		$from = 'FROM news n LEFT JOIN news_categories nc ON n.id = nc.news_id LEFT JOIN categories c ON c.id = nc.category_id LEFT JOIN users u ON n.user_id = u.id';
		$where = 'WHERE TRUE';

		if(isset($params['title']) && $params['title'] != '') {
			$where .= ' AND n.title like "%' . $params['title'] . '%"';
		}
        if(isset($params['description']) && $params['description'] != '') {
			$where .= ' AND n.description like "%' . $params['description'] . '%"';
		}
        if(isset($params['source']) && $params['source'] != '') {
			$where .= ' AND n.source_name = "' . $params['source'] . '"';
		}
        if(isset($params['status']) && $params['status'] != '') {
			$where .= ' AND n.status =' . $params['status'];
		}
        if(isset($params['category_name']) && $params['category_name'] != '') {                       
            $where .= ' AND c.name = "' . $params['category_name'] . '"';
		}
        if(isset($params['category_alias']) && $params['category_alias'] != '' && $params['category_alias'] != 'all') {                       
            $where .= ' AND c.alias = "' . $params['category_alias'] . '"';
		}
        if(isset($params['keyword']) && $params['keyword'] != '') {
            $keyword = trim($params['keyword']);
			$where .= " AND MATCH(title, summary, description) AGAINST ('$keyword' IN BOOLEAN MODE)";
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
    
    function get_date_archives() {
      $query = $this->db->query("SELECT DISTINCT DATE_FORMAT(added_date, '%Y') AS year, DATE_FORMAT(added_date, '%m') AS month , DATE_FORMAT(added_date, '%M %Y') AS date_display FROM news ORDER BY added_date DESC");
      return $query->result_array();
    }
}
?>