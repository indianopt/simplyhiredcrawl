<?php
  
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/
class Member extends Controller {

    function Member() {
        parent::Controller();

        $this->load->model('users_model', 'users_model', true);
        $this->load->library('validation');
        $this->load->library('encrypt');
        $this->load->helper('file');
        $this->load->helper('string');
    }

    function index() {
    }
    
    function register() {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->layout->buildPage('member/register', array('member' => array()));
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rules['name']		        = "required";
            $rules['username']	        = "required|min_length[5]|max_length[12]|callback_username_check";
            $rules['password']	        = "required|min_length[5]|max_length[12]|matches[confirm_password]";
    		$rules['confirm_password']	= "required";
            $rules['email']             = "required|valid_email|callback_email_check";
            $rules['accept_terms']      = "required";
    		
    		$this->validation->set_rules($rules);
            $this->validation->set_fields(
                array('username' => 'Tên đăng nhập', 'name' => 'Họ và tên', 'confirm_password' => 'Nhập lại mật khẩu', 'password' => 'Mật khẩu', 'email' => 'Email', 'accept_terms' => 'Tôi đồng ý'));
            
            if ($this->validation->run() == false) {
                $this->layout->buildPage('member/register', array('member' => $_POST));
    		}
    		else {
                $data['name'] = addslashes($this->input->post('name'));
                $data['username'] = $this->input->post('username');
                $data['last_updated'] = date('Y-m-d h:i:s');                
                $data['added_date'] = date('Y-m-d h:i:s');
                $data['password'] = $this->encrypt->sha1($this->input->post('password'));
                $data['role'] = 'MEMBER';
                $this->users_model->insert($data);
                $this->login();
                $this->load->view('registration_success');
    		}
		}
    }
    
    function username_check($username) {
        $user = $this->users_model->get_by_username($username);
        if($user != null && $user['id'] != $this->input->post('id')) {
            $this->validation->set_message('username_check', "Tên $username đã có người dùng rồi");
            return false;
        }
        else {
            return true;
        }
	}
    
    function email_check($email) {
        $user = $this->users_model->get_by_email($email);
        if($user != null && $user['id'] != $this->input->post('id')) {
            $this->validation->set_message('email_check', "Email $email đã có người dùng rồi");
            return false;
        }
        else {
            return true;
        }
	}
    
    function logout() {
		$this->session->unset_userdata('user');
        redirect('home');
	}
    
    function login() {
		$this->validation->set_rules(array('username' => 'required|callback_check_username'));

		if ($this->validation->run() == FALSE) {
			$this->layout->buildPage('member/login');
		}
		else {
			$this->load->view('login_success');
		}
	}

    function forgot_password() {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->layout->buildPage('member/forgot_password');
        }
        else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rules['email'] = "required|valid_email|callback_email_existed_check";
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
                $this->layout->buildPage('member/forgot_password');
    		}
    		else {
                $user = $this->users_model->get_by_email($this->input->post('email'));
                if(null != $user) {
                    $mail_subject = 'Mật khẩu mới';
                    $mail_body = read_file('./mail_templates/forgot_password.txt');
                    $new_password = random_string('alnum', 16);
                    $mail_body = str_replace(array('$MEMBER_NAME', '$USER_NAME', '$NEW_PASSWORD'), array($user['name'], $user['username'], $new_password), $mail_body);
                    $this->users_model->update($user['id'], array('password' => $this->encrypt->sha1($new_password)));
                    
                    send_mail(false, array('name' => $user['name'], 'email' => $user['email']), $mail_subject, $mail_body);
                    $this->load->view('forgot_password_mail_sent');
                }
    		}
        }
    }
    
    function email_existed_check($email) {
        $user = $this->users_model->get_by_email($email);
        if($user == null) {
            $this->validation->set_message('email_existed_check', "Không có thành viên nào đã đăng ký với email <b>$email</b> cả");
            return false;
        }
        else {
            return true;
        }
	}
    
	function check_username($username) {
		$password = $this->encrypt->sha1($this->input->post('password'));
        
		if ($this->try_login($username, $password)) {
			return true;
		}
		else {
			$this->validation->set_message('check_username', 'Sai thông tin đăng nhập.');
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
