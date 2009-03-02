<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Navigation extends Authentication {

	function Navigation() {
		parent::Authentication();

		$this->load->model('navigations_model', 'navigations_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('navigation_search_params');
		redirect('admin/navigation/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$navigation_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$navigation_search_params['name'] = $this->input->post('name');
			$navigation_search_params['status'] = $this->input->post('status');
		}
		else {
			$navigation_search_params = $this->session->userdata('navigation_search_params');
		}
		$navigation_search_params['order_by'] = $order_by;
		$navigation_search_params['order_direction'] = $order_direction;
		$navigation_search_params['perpage'] = 30;
		$navigation_search_params['start'] = $start;
		$this->session->set_userdata('navigation_search_params', $navigation_search_params);

		$result = $this->navigations_model->search($navigation_search_params);

		$data['current_tab'] = 'navigation';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Navigation: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Name', 'value' => 'name', 'width' => '30%'), array('name' => 'Sort order', 'value' => 'sort_order', 'width' => '10%'), array('name' => 'Added date', 'value' => 'added_date', 'width' => '20%'), array('name' => 'Last updated', 'value' => 'last_updated', 'width' => '20%'), array('name' => 'Status', 'value' => 'status', 'width' => '14%', 'function' => 'status_2_string'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/navigation');
		$grid_settings['search_url'] = site_url('admin/navigation/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $navigation_search_params['perpage'], 'start' => $start);

        $grid_settings['form'] = array('action' => site_url('admin/navigation/do_action'), 'buttons' => array(array('name' => 'Publish', 'action' => 'publish'), array('name' => 'Un-publish', 'action' => 'unpublish')));

		$data['main_content'] = $this->load->view('admin/includes/navigation_search', array('navigation_search_params' => $navigation_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$navigation = $this->navigations_model->get_by_id($id);
        
		$this->_render_view($navigation);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$navigation = $this->navigations_model->get_by_id($id);
    		$this->_render_edit($navigation);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');
            
            $rules['name']	= "required";
			$rules['name']	= "required|callback_name_check";
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
                $_POST['categories'] = $this->input->post('category_id');
    			$this->_render_edit($_POST);
    		}
    		else {
                $data['status'] = $this->input->post('status');
                $data['name'] = addslashes($this->input->post('name'));
                $data['url'] = $this->input->post('url');
                $data['sort_order'] = $this->input->post('sort_order');

                $data['last_updated'] = date('Y-m-d h:i:s');

    			if($id != '') {
                    $this->navigations_model->update($id, $data);
                }
                else {
                    $data['added_date'] = $this->input->post('added_date') != false ? $this->input->post('added_date') . ' ' . date('h:i:s') : date('Y-m-d h:i:s');
                    $this->navigations_model->insert($data);
                }
                redirect('admin/navigation');
    		}
		}
	}
    
    function name_check($name) {
        $a = $this->navigations_model->get_by_name($name);
        if($a != null && $a['id'] != $this->input->post('id')) {
            $this->validation->set_message('name_check', "The $name is not available");
            return false;
        }
        else {
            return true;
        }
	}

    function _render_view($navigation = array()) {
        $data['current_tab'] = 'navigation';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Navigation: ' . $navigation['name'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/navigation_view', array('navigation' => $navigation), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($navigation = array()) {
        $data['current_tab'] = 'navigation';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Navigation', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/navigation_edit', array('navigation' => $navigation), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->navigations_model->delete_by_id($this->uri->segment(4));
		redirect('admin/navigation');
	}
    
    function do_action() {
        $action = $this->input->post('action'); 
        
        if($action && $this->input->post('selected_id')) {          
            foreach($this->input->post('selected_id') as $aid) {
                if($action == 'publish') {
                    $this->navigations_model->update($aid, array('status' => '1'));
                }
                else if($action == 'unpublish') {
                    $this->navigations_model->update($aid, array('status' => '0'));
                }
            }  
        }
        redirect('admin/navigation');
    }
    
    function export() {
        $result = $this->navigations_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC'));
        to_excel($result['records'], 'navigation');
    }
    
    function _delete_image_by_navigation_id($id) {
        $n = $this->navigations_model->get_by_id($id);
		if(null != $n && $n['image'] != '' && file_exists('./uploads/navigation/' . $n['image'])) {
			unlink('./uploads/navigation/' . $n['image']);
		}
    }
}
?>