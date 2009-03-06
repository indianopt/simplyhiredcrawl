<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Search_Model extends Model {

    function Search_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($data) {
		if($this->db->insert('search', $data)) {
			return $this->db->insert_id();
		}
        else {
			return false;
		}
    }
        
    function get_by_code($code){
        $row = $this->db->query("SELECT * FROM search WHERE code = '$code'");
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
}
?>