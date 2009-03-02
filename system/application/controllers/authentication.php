<?php
  
/*
 * Created by Dang Ngoc Giao at giaodn@gmail.com
 */
  
class Authentication extends Controller {
 
	function Authentication() {
		parent::Controller();
		$this->auth();
	}
 
	function auth() {
        $this->load->model('users_model', 'users_model', true);
		$user = $this->session->userdata('user');
        if($user != false) {
            if(null == $this->users_model->get_by_id($user['id'])) {
                redirect('member/logout');
            }    
        }
        else {
            redirect('member/login');
        }
	}
}
?>