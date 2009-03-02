<?php

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Ratings_Model extends Model {
    
    var $table_name = 'ratings';

	function Ratings_Model() {
		parent::Model();
        $this->db->query("SET NAMES 'utf8'");
	}
    
    function rate($objid, $val, $type) {
        $row = $this->get_by_objid_type($objid, $type);
        if(null == $row) {
            $this->db->insert($this->table_name, array('obj_id' => $objid, 'type' => $type, 'number_rate' => 1, 'total_value' => $val));
        }
        else {
            $this->db->update($this->table_name, array('obj_id' => $objid, 'number_rate' => $row['number_rate'] + 1, 'total_value' => $row['total_value'] + $val), array('id' => $row['id']));
        }
        return $this->get_by_objid_type($objid, $type);
    }
    
    function get_by_id($id) {
        $query = $this->db->getwhere($this->table_name, array('id' => $id));
        return $query->num_rows() > 0 ? $query->row_array() : null;
    }
    
    function get_by_objid_type($objid, $type) {
        $query = $this->db->getwhere($this->table_name, array('obj_id' => $objid, 'type' => $type));
        return $query->num_rows() > 0 ? $query->row_array() : null;
    }
}
?>