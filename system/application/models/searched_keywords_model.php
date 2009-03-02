<?php 

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Searched_Keywords_Model extends Model {

    function Searched_Keywords_Model() {
        parent::Model();
        $this->db->query("SET NAMES 'utf8'");
    }

    function insert($keyword, $type) {
        if($keyword != '') {
            $this->db->where(array('keyword' => $keyword, 'type' => $type));
            $query = $this->db->get('searched_keywords');
            
            if($query->num_rows() > 0) {
                $r = $query->row_array();
                $this->db->update('searched_keywords', array('number_times' => $r['number_times'] + 1), array('keyword' => $keyword, 'type' => $type));
            }
            else {
                $this->db->insert('searched_keywords', array('keyword' => $keyword, 'type' => $type, 'number_times' => '1'));
            }
        }
    }
    
    function get_most_searched($type, $limit) {
        $this->db->limit($limit);
        $this->db->where(array('type' => $type, 'number_times >'=> 0));
        $this->db->order_by('number_times', 'desc');
        $r = $this->db->get('searched_keywords');
        return $r->result_array();
    }
}
?>