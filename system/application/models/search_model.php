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
    
    function update($code, $data) {
		$this->db->where('code', $code);
        if($this->db->update('search', $data)) {
			return true;
		}
        else {
			return false;
		}
    }
        
    function get_by_code($code){
        $row = $this->db->query("SELECT * FROM search WHERE code = '$code'");
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
    
    function clear_search_keywords($numer_of_days) {
        $t = time() - $numer_of_days*24*60*60;
        $this->db->query("DELETE FROM search WHERE time <= $t");
    }
}
?>