<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Node extends Authentication {

	function Node() {
		parent::Authentication();

		$this->load->model('nodes_model', 'nodes_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('node_search_params');
		redirect('admin/node/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$node_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$node_search_params['name'] = $this->input->post('name');
			$node_search_params['status'] = $this->input->post('status');
		}
		else {
			$node_search_params = $this->session->userdata('node_search_params');
		}
		$node_search_params['order_by'] = $order_by;
		$node_search_params['order_direction'] = $order_direction;
		$node_search_params['perpage'] = 30;
		$node_search_params['start'] = $start;
		$this->session->set_userdata('node_search_params', $node_search_params);

		$result = $this->nodes_model->search($node_search_params);

		$data['current_tab'] = 'node';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Node: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Name', 'value' => 'name', 'width' => '40%'), array('name' => 'Added date', 'value' => 'added_date', 'width' => '20%'), array('name' => 'Last updated', 'value' => 'last_updated', 'width' => '20%'), array('name' => 'Status', 'value' => 'status', 'width' => '14%', 'function' => 'status_2_string'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/node');
		$grid_settings['search_url'] = site_url('admin/node/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $node_search_params['perpage'], 'start' => $start);

        $grid_settings['form'] = array('action' => site_url('admin/node/do_action'), 'buttons' => array(array('name' => 'Publish', 'action' => 'publish'), array('name' => 'Un-publish', 'action' => 'unpublish')));

		$data['main_content'] = $this->load->view('admin/includes/node_search', array('node_search_params' => $node_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$node = $this->nodes_model->get_by_id($id);
        
		$this->_render_view($node);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$node = $this->nodes_model->get_by_id($id);
            
    		$this->_render_edit($node);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');
            
            $rules['name']	= "required";
			$rules['reference_name']	= "required|callback_reference_name_check";
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
                $_POST['categories'] = $this->input->post('category_id');
    			$this->_render_edit($_POST);
    		}
    		else {				
				$data['status'] = $this->input->post('status');
				$data['name'] = addslashes($this->input->post('name'));
				$data['reference_name'] = $this->input->post('reference_name');
				$data['content'] = addslashes($this->input->post('content'));
				$data['seo_keywords'] = addslashes($this->input->post('seo_keywords'));
				$data['seo_description'] = addslashes($this->input->post('seo_description'));

                $data['last_updated'] = date('Y-m-d h:i:s');

    			if($id != '') {
                    $this->nodes_model->update($id, $data);
                }
                else {
                    $data['added_date'] = $this->input->post('added_date') != false ? $this->input->post('added_date') . ' ' . date('h:i:s') : date('Y-m-d h:i:s');
                    $this->nodes_model->insert($data);
                }
                redirect('admin/node');
    		}
		}
	}
    
    function reference_name_check($name) {
        $a = $this->nodes_model->get_by_reference_name($name);
        if($a != null && $a['id'] != $this->input->post('id')) {
            $this->validation->set_message('reference_name_check', "The $name is not available");
            return false;
        }
        else {
            return true;
        }
	}

    function _render_view($node = array()) {
        $data['current_tab'] = 'node';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Node: ' . $node['name'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/node_view', array('node' => $node), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($node = array()) {
        $data['current_tab'] = 'node';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Node', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/node_edit', array('node' => $node), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->nodes_model->delete_by_id($this->uri->segment(4));
		redirect('admin/node');
	}
    
    function do_action() {
        $action = $this->input->post('action'); 
        
        if($action && $this->input->post('selected_id')) {          
            foreach($this->input->post('selected_id') as $aid) {
                if($action == 'publish') {
                    $this->nodes_model->update($aid, array('status' => '1'));
                }
                else if($action == 'unpublish') {
                    $this->nodes_model->update($aid, array('status' => '0'));
                }
            }  
        }
        redirect('admin/node');
    }
    
    function export() {
        $result = $this->nodes_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC'));
        to_excel($result['records'], 'node');
    }
    
    function _delete_image_by_node_id($id) {
        $n = $this->nodes_model->get_by_id($id);
		if(null != $n && $n['image'] != '' && file_exists('./uploads/node/' . $n['image'])) {
			unlink('./uploads/node/' . $n['image']);
		}
    }
}
?>