<?php
  
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Login extends Controller {
 
	function Login() {
		parent::Controller();
        
		$this->load->library('validation');
		$this->load->model('users_model', 'users_model', true);
        $this->load->library('encrypt');
	}
 
	function index() {
		$login_form_rules = array
		(
			'username' => 'callback_check_username',
			'password' => 'required'
		);
		$login_form_fields = array
		(
			'username' => 'Username',
			'password' => 'Password'
		);
		$this->validation->set_fields($login_form_fields);
		$this->validation->set_rules($login_form_rules);
		if ($this->validation->run() == FALSE) {
			$this->load->view('admin/includes/login.php');
		}
		else {
			redirect('admin/home');
		}
	}
 
	function check_username($username) {
		$password = $this->encrypt->sha1($this->input->post('password'));

		if ($this->try_login($username, $password)) {
			return true;
		}
		else {
			$this->validation->set_message('check_username', 'Incorrect login info.');
			return false;
		}
	}
    
    function try_login($username, $password) {
        $user = $this->users_model->get_by_username_password($username, $password);
        if(null != $user) {
            $this->session->set_userdata('user', $user);
            return true;
        }
        else {
            return false;
        }
    }
}
?>