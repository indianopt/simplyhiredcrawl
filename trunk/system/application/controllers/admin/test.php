<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Test extends Controller {

	function Test() {
		parent::Controller();

	}

	function index() {            
        $str = '<span class="company">Yachimec Group</span><a rel="nofollow" id="l_who-498733889-Prosource" class="company who"><u>Prosource</u></a><span></span><a></a>';
        
        $pattern = '/<span class=\"company\">(.*)<\/span>/is';
        preg_match_all($pattern, $str, $matches);
        
        print_r($matches);
	}
}
?>