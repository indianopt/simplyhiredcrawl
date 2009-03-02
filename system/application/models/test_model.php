<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Test_Model extends Model {

    function Test_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($table_name, $data) {
		if($this->db->insert($table_name, $data)) {
			return true;
		}
        else {
			return false;
		}
    }

    function update($table_name, $id, $data, $where) {
		$this->db->where('id', $id);
        if($this->db->update($table_name, $data)) {
			return true;
		}
        else {
			return false;
		}
    }
    
    function execute($sql) {
        $query = $this->db->query($sql);
        
		return $query->result_array();   
    }
}
?>