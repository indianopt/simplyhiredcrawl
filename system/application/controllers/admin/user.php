<?php

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class User extends Authentication {

	function User() {
		parent::Authentication();
        
		$this->load->model('users_model', 'users_model', true);
        $this->load->library('encrypt');
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('user_search_params');
		$this->search();
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {        
		$user_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$user_search_params['name'] = $this->input->post('name');
			$user_search_params['username'] = $this->input->post('username');
		}
		else {
			$user_search_params = $this->session->userdata('user_search_params');
		}
		$user_search_params['order_by'] = $order_by;
		$user_search_params['order_direction'] = $order_direction;
		$user_search_params['perpage'] = 30;
		$user_search_params['start'] = $start;
		$this->session->set_userdata('user_search_params', $user_search_params);

		$result = $this->users_model->search($user_search_params);

		$data['current_tab'] = 'user';
		$data['title_info'] = array('icon_image' => null, 'title' => 'User: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Name', 'value' => 'name', 'width' => '30%'), array('name' => 'User name', 'value' => 'username', 'width' => '30%'), array('name' => 'Added date', 'value' => 'added_date', 'width' => '18%'), array('name' => 'Last updated', 'value' => 'last_updated', 'width' => '18%'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/user');
		$grid_settings['search_url'] = site_url('admin/user/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $user_search_params['perpage'], 'start' => $start);

		$data['main_content'] = $this->load->view('admin/includes/user_search', array('user_search_params' => $user_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$user = $this->users_model->get_by_id($id);

		$this->_render_view($user);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);

    		$user = $this->users_model->get_by_id($id);
    		$this->_render_edit($user);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');
            
            if($id == '') {
                $rules['password']	        = "required|min_length[5]|max_length[12]|matches[confirm_password]";
    		    $rules['confirm_password']	= "required";
            }
            
            $rules['username']	            = "required|min_length[5]|max_length[12]|callback_username_check";  
    		$rules['name']		            = "required";
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
    			$this->_render_edit($_POST);
    		}
    		else {
                $data['role'] = 'ADMIN';
                $data['name'] = addslashes($this->input->post('name'));
                $data['username'] = $this->input->post('username');
                $data['last_updated'] = date('Y-m-d h:i:s');
                
    			if($id != '') {
                    $this->users_model->update($id, $data);
                }
                else {
                    $data['added_date'] = date('Y-m-d h:i:s');
                    $data['password'] = $this->encrypt->sha1($this->input->post('password'));
                    $this->users_model->insert($data);
                }
                redirect('admin/user');
    		}
		}
	}
    
    function username_check($username) {
        $user = $this->users_model->get_by_username($username);
        if($user != null && $user['id'] != $this->input->post('id')) {
            $this->validation->set_message('username_check', "The $username is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function _render_view($user = array()) {
        $data['current_tab'] = 'user';
		$data['title_info'] = array('icon_image' => null, 'title' => 'User: ' . $user['name'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/user_view', array('user' => $user), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($user = array()) {
        $data['current_tab'] = 'user';
		$data['title_info'] = array('icon_image' => null, 'title' => 'User', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/user_edit', array('user' => $user), true);

		$this->load->view('admin/main', $data);
    }
    
    function render_change_password($user = array()) {
        $data['current_tab'] = 'user';
		$data['title_info'] = array('icon_image' => null, 'title' => 'User: Change password', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/user_change_password', array('user' => $user), true);

		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->users_model->delete_by_id($this->uri->segment(4));
		redirect('admin/user');
	}
    
    function change_password() {
        $user = $this->session->userdata('user');
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            if($user != false) {
                $this->render_change_password($user);
            }
            else {
                redirect('admin/logout');
            }
        }
        else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rules['current_password']	        = "required|callback_current_password_check";
    		$rules['password']	        = "required|min_length[5]|max_length[12]|matches[confirm_password]";
    		$rules['confirm_password']	= "required";
            
            $this->validation->set_rules($rules);
            
            if($this->validation->run()) {
                $password = $this->encrypt->sha1($this->input->post('password'));
                $this->users_model->update($user['id'], array('password' => $password));
                $user['password'] = $password;
                $user = $this->session->set_userdata('user', $user);
                redirect('admin/user');
            }
            else {
                $this->render_change_password($user);
            }
        }
    }
    
    function current_password_check($current_password) {
        $user = $this->session->userdata('user');
        if($user != false) {
            $user = $this->users_model->get_by_username($user['username']);

            if($user['password'] != $this->encrypt->sha1($current_password)) {
                $this->validation->set_message('current_password_check', "Current password incorrect");
                return false;
            }
            else {
                return true;
            }
        }
        else {
            redirect('admin/login');
        }
	}
}
?>