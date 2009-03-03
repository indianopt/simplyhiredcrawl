<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Home extends Authentication {

	function Home() {
		parent::Authentication();
	}

	function index() {
        $data['current_tab'] = 'home';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Home: ', 'enabled_print' => false, 'enabled_help' => false);
        
        $data['main_content'] = $this->load->view('admin/includes/home', array(), true);

		$this->load->view('admin/main', $data);
	}
}
?>