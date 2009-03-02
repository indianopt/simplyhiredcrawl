<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Category extends Authentication {

	function Category() {
		parent::Authentication();
        $this->load->model('categories_model', 'categories_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('category_search_params');
		redirect('admin/category/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$category_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$category_search_params['name'] = $this->input->post('name');
			$category_search_params['type'] = $this->input->post('type');
		}
		else {
			$category_search_params = $this->session->userdata('category_search_params');
		}
		$category_search_params['order_by'] = $order_by;
		$category_search_params['order_direction'] = $order_direction;
		$category_search_params['perpage'] = 30;
		$category_search_params['start'] = $start;
		$this->session->set_userdata('category_search_params', $category_search_params);

		$result = $this->categories_model->search($category_search_params);

		$data['current_tab'] = 'category';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Category: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Name', 'value' => 'name', 'width' => '30%'), array('name' => 'Type', 'value' => 'type', 'width' => '20%'), array('name' => 'Sort order', 'value' => 'sort_order', 'width' => '10%'), array('name' => 'Added date', 'value' => 'added_date', 'width' => '20%'), array('name' => 'Last updated', 'value' => 'last_updated', 'width' => '20%'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/category');
		$grid_settings['search_url'] = site_url('admin/category/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $category_search_params['perpage'], 'start' => $start);

		$data['main_content'] = $this->load->view('admin/includes/category_search', array('category_search_params' => $category_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$category = $this->categories_model->get_by_id($id);
        $category['categories'] = $this->categories_model->get_by_id($id);
        
		$this->_render_view($category);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$category = $this->categories_model->get_by_id($id);
            
    		$this->_render_edit($category);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');
            
            $rules['name']	        = "required|callback_name_check";  
            $rules['alias']	        = "required|callback_alias_check";  
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
    			$this->_render_edit($_POST);
    		}
    		else {
                $data['name'] = addslashes($this->input->post('name'));
                $data['alias'] = addslashes($this->input->post('alias'));
                $data['type'] = $this->input->post('type');
                $data['sort_order'] = $this->input->post('sort_order');
                $data['last_updated'] = date('Y-m-d h:i:s');
                
    			if($id != '') {
                    $this->categories_model->update($id, $data);
                }
                else {
                    $data['added_date'] = date('Y-m-d h:i:s');
                    $this->categories_model->insert($data);
                }
                redirect('admin/category');
    		}
		}
	}
    
     function name_check($name) {
        $user = $this->categories_model->get_by_name($name);
        if($user != null && $user['id'] != $this->input->post('id')) {
            $this->validation->set_message('name_check', "The $name is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function alias_check($alias) {
        $user = $this->categories_model->get_by_alias($alias);
        if($user != null && $user['id'] != $this->input->post('id')) {
            $this->validation->set_message('alias_check', "The $alias is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function _render_view($category = array()) {
        $data['current_tab'] = 'category';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Category: ' . $category['name'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/category_view', array('category' => $category), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($category = array()) {
        $data['current_tab'] = 'category';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Category', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/category_edit', array('category' => $category), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->categories_model->delete_by_id($this->uri->segment(4));
		redirect('admin/category');
	}
}
?>