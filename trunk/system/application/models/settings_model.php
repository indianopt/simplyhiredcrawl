<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Settings_Model extends Model {
    
    function Settings_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function save($data) {
        $setting = $this->get();
        if(null == $setting) {
           $this->db->insert('settings', $data);
        }
        else {
            $this->db->where('id', $setting['id']);
            $this->db->update('settings', $data);
        }
    }
	
	function delete($id) {
		$this->db->where('id', $id);
		if($this->db->delete('settings')) {
			return true;
		}
        else {
			return false;
		}
	}
    
    function get(){
        $row = $this->db->get('settings');
        return $row->num_rows() > 0 ? $row->row_array() : null;
    }
}
?>