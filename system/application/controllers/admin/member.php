<?php

/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Member extends Authentication {

	function Member() {
		parent::Authentication();
        
		$this->load->model('members_model', 'members_model', true);
        $this->load->library('encrypt');
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('member_search_params');
		$this->search();
	}

	function search($start = '0', $order_by = 'joined_date', $order_direction = 'DESC') {
		$member_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$member_search_params['first_name'] = $this->input->post('first_name');
            $member_search_params['last_name'] = $this->input->post('last_name');
            $member_search_params['email'] = $this->input->post('email');
            $member_search_params['is_active'] = $this->input->post('is_active');
            $member_search_params['member_category_enum'] = $this->input->post('member_category_enum');   
		}
		else {
			$member_search_params = $this->session->userdata('member_search_params');
		}
		$member_search_params['order_by'] = $order_by;
		$member_search_params['order_direction'] = $order_direction;
		$member_search_params['perpage'] = 30;
		$member_search_params['start'] = $start;
		$this->session->set_userdata('member_search_params', $member_search_params);

		$result = $this->members_model->search($member_search_params);

		$data['current_tab'] = 'member';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Member: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'First name', 'value' => 'first_name', 'width' => '10%'), array('name' => 'Last name', 'value' => 'last_name', 'width' => '10%'), array('name' => 'Email', 'value' => 'email', 'width' => '14%'), array('name' => 'Gender', 'value' => 'gender_enum', 'width' => '10%', 'function' => 'gender_to_string'), array('name' => 'Joined date', 'value' => 'joined_date', 'width' => '10%'), array('name' => 'City', 'value' => 'city', 'width' => '10%'), array('name' => 'State', 'value' => 'state', 'width' => '10%'), array('name' => 'Country', 'value' => 'country', 'width' => '10%'), array('name' => 'Active?', 'value' => 'is_active', 'width' => '10%', 'function' => 'true_or_false'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/member');
		$grid_settings['search_url'] = site_url('admin/member/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $member_search_params['perpage'], 'start' => $start);
        
        $grid_settings['form'] = array('action' => site_url('admin/member/do_action'), 'buttons' => array(array('name' => 'Set active', 'action' => 'active_selected'), array('name' => 'Set inactive', 'action' => 'inactive_selected')));

		$data['main_content'] = $this->load->view('admin/includes/member_search', array('member_search_params' => $member_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$member = $this->members_model->get_by_id($id);

		$this->_render_view($member);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$member = $this->members_model->get_by_id($id);

    		$this->_render_edit($member);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {    
            $rules['email']	        = "required|callback_email_check";  
    		$rules['first_name']	= "required";
            $rules['last_name']	    = "required";
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
    			$this->_render_edit($_POST);
    		}
    		else {
                $id = $this->input->post('id');

                if(isset($_FILES['avatar_image']['name'])) {
    				if($_FILES['avatar_image']['name'] == false && $id != '') {
    					$c = $this->members_model->get_by_id($id);
    					if(null != $c && $c['avatar_image'] != '' && file_exists('./images/members/' . $c['avatar_image'])) {
    						unlink('./images/members/' . $c['avatar_image']);
    					}
    					$data['avatar_image'] = '';
    				}
    				else if($_FILES['avatar_image']['name'] != false) {
                        $config['upload_path'] = './images/members/';
        				$config['allowed_types'] = 'gif|jpg|png';
        				$config['max_size']	= '500';
        				$config['max_width']  = '1024';
        				$config['max_height']  = '768';
        				$config['encrypt_name'] = TRUE;
        			
        				$this->load->library('upload', $config);

    					if ( ! $this->upload->do_upload('avatar_image')) {
    						$this->_render_edit($_POST);
    						return;
    					}
    					else {
    						$ud = $this->upload->data();
    						$data['avatar_image'] = $ud['file_name'];
    					}
    				}
    			}

                $data['first_name'] = $this->input->post('first_name');
                $data['last_name'] = $this->input->post('last_name');
                $data['gender_enum'] = $this->input->post('gender_enum');
                $data['med_board_state'] = $this->input->post('med_board_state');
                $data['lic_number'] = $this->input->post('lic_number');
                $data['facility_name'] = $this->input->post('facility_name');
                $data['address'] = $this->input->post('address');
                $data['address2'] = $this->input->post('address2');
                $data['city'] = $this->input->post('city');
                $data['state'] = $this->input->post('state');
                $data['country'] = $this->input->post('country') != -1 ? $this->input->post('country') : '';
                $data['postal_code'] = $this->input->post('postal_code');
                $data['phone'] = $this->input->post('phone');
                $data['toll_free'] = $this->input->post('toll_free');
                $data['fax'] = $this->input->post('fax');
                $data['email'] = $this->input->post('email');
                $data['username'] = $this->input->post('email');
                $data['website'] = $this->input->post('website');
                $data['service_hours'] = $this->input->post('service_hours');
                $data['services_provided'] = $this->input->post('services_provided');
                $data['about_me'] = $this->input->post('about_me');
                
    			if($id != '') {
                    $this->members_model->update_member($id, $data);
                }
                else {
                    $this->members_model->insert_member($data);
                }
                redirect('admin/member');
    		}
		}
	}
    
    function email_check($email) {
        $member = $this->members_model->get_by_email($email);
        if($member != null && $member['id'] != $this->input->post('id')) {
            $this->validation->set_message('email_check', "The $email is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function _render_view($member = array()) {
        $data['current_tab'] = 'member';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Member: ' . $member['first_name'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/member_view', array('member' => $member), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($member = array()) {
        $data['current_tab'] = 'member';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Member', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/member_edit', array('member' => $member), true);

		$this->load->view('admin/main', $data);
    }
    
    function render_change_password($member = array()) {
        $data['current_tab'] = 'member';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Member: Change password', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/member_change_password', array('member' => $member), true);

		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->members_model->delete_by_id($this->uri->segment(4));
		redirect('admin/member');
	}
    
    function change_password() {
        $member = $this->session->userdata('member');
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            if($member != false) {
                $this->render_change_password($member);
            }
            else {
                redirect('admin/logout');
            }
        }
        else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		$rules['password']	        = "required|min_length[5]|max_length[12]|matches[confirm_password]";
    		$rules['confirm_password']	= "required";
            
            $this->validation->set_rules($rules);
            
            if($this->validation->run()) {
                $this->members_model->update($member['id'], array('password' => $this->encrypt->sha1($this->input->post('password'))));
                redirect('admin/member');
            }
            else {
                $this->render_change_password($member);
            }
        }
    }
    
    function do_action() {
        $action = $this->input->post('action'); 
        
        if($action && $this->input->post('selected_id')) {
            $this->load->model('member_model','member', false);
            
            foreach($this->input->post('selected_id') as $member_id) {
                $this->member->memberID = $member_id;
                if($action == 'active_selected') {
                    $this->member->isActive = '1';
                }
                else if($action == 'inactive_selected') {
                    $this->member->isActive = '0';
                }
                $this->members_model->update($this->member);
            }  
        }
        redirect('admin/member');
    }
    
    function export() {
        $result = $this->members_model->search(array('order_by' => 'joined_date', 'order_direction' => 'DESC'));
        to_excel($result['records'], 'members');
    }
}
?>