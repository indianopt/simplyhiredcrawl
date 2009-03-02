<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Manufacturer extends Authentication {

	function Manufacturer() {
		parent::Authentication();
        $this->load->model('manufacturers_model', 'manufacturers_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('manufacturer_search_params');
		redirect('admin/manufacturer/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$manufacturer_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$manufacturer_search_params['name'] = $this->input->post('name');
		}
		else {
			$manufacturer_search_params = $this->session->userdata('manufacturer_search_params');
		}
		$manufacturer_search_params['order_by'] = $order_by;
		$manufacturer_search_params['order_direction'] = $order_direction;
		$manufacturer_search_params['perpage'] = 30;
		$manufacturer_search_params['start'] = $start;
		$this->session->set_userdata('manufacturer_search_params', $manufacturer_search_params);

		$result = $this->manufacturers_model->search($manufacturer_search_params);

		$data['current_tab'] = 'manufacturer';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Manufacturer: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Name', 'value' => 'name', 'width' => '70%'), array('name' => 'Added date', 'value' => 'added_date', 'width' => '20%'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/manufacturer');
		$grid_settings['search_url'] = site_url('admin/manufacturer/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $manufacturer_search_params['perpage'], 'start' => $start);

		$data['main_content'] = $this->load->view('admin/includes/manufacturer_search', array('manufacturer_search_params' => $manufacturer_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$manufacturer = $this->manufacturers_model->get_by_id($id);
        $manufacturer['manufacturers'] = $this->manufacturers_model->get_by_id($id);
        
		$this->_render_view($manufacturer);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$manufacturer = $this->manufacturers_model->get_by_id($id);
            
    		$this->_render_edit($manufacturer);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');
            
            $rules['name'] = "required|callback_name_check";  
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
                $_POST['manufacturers'] = $this->input->post('manufacturer_id');
    			$this->_render_edit($_POST);
    		}
    		else {
                $data['name'] = addslashes($this->input->post('name'));

    			if($id != '') {
                    $this->manufacturers_model->update($id, $data);
                }
                else {
                    $data['added_date'] = date('Y-m-d h:i:s');
                    $this->manufacturers_model->insert($data);
                }
                redirect('admin/manufacturer');
    		}
		}
	}
    
     function name_check($name) {
        $user = $this->manufacturers_model->get_by_name($name);
        if($user != null && $user['id'] != $this->input->post('id')) {
            $this->validation->set_message('name_check', "The $name is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function _render_view($manufacturer = array()) {
        $data['current_tab'] = 'manufacturer';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Manufacturer: ' . $manufacturer['name'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/manufacturer_view', array('manufacturer' => $manufacturer), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($manufacturer = array()) {
        $data['current_tab'] = 'manufacturer';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Manufacturer', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/manufacturer_edit', array('manufacturer' => $manufacturer), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->manufacturers_model->delete_by_id($this->uri->segment(4));
		redirect('admin/manufacturer');
	}

}
?>