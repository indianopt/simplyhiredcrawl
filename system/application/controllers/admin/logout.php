<?php
  
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Logout extends Controller {
 
	function Logout() {
		parent::Controller();
        
		$this->load->library('validation');
		$this->load->model('users_model', 'users_model', true);
        $this->load->library('encrypt');
	}
 
	function index() {
		$this->session->unset_userdata('user');
        redirect('admin/login');
	}
}
?>