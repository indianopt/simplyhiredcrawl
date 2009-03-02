<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Test extends Authentication {

	function Test() {
		parent::Authentication();
        $this->load->model('test_model', 'test_model', true);
	}

	function index() {
        $this->load->helper('file');
        
        $filenames = get_filenames('./data/');
        
        foreach($filenames as $fn) {
            $str = read_file("./data/$fn");
            $items = explode("\n", $str);
            foreach($items as $item) {
                echo strtolower(to_alias($item));   
            }
        }
            
        
        
        
	}
}
?>