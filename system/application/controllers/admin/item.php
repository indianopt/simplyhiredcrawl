<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Item extends Authentication {

	function Item() {
		parent::Authentication();

        $this->load->model('items_model', 'items_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('item_search_params');
		redirect('admin/item/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$item_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$item_search_params['name'] = $this->input->post('name');
			$item_search_params['category_id'] = $this->input->post('category_id');
            $item_search_params['province_id'] = $this->input->post('province_id');
            $item_search_params['district_id'] = $this->input->post('district_id');
			$item_search_params['status'] = $this->input->post('status');
		}
		else {
			$item_search_params = $this->session->userdata('item_search_params');
		}
		$item_search_params['order_by'] = $order_by;
		$item_search_params['order_direction'] = $order_direction;
		$item_search_params['perpage'] = 30;
		$item_search_params['start'] = $start;
		$this->session->set_userdata('item_search_params', $item_search_params);

		$result = $this->items_model->search($item_search_params);

		$data['current_tab'] = 'item';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Item: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Name', 'value' => 'name', 'width' => '18%'), array('name' => 'Category', 'value' => 'category_name', 'width' => '18%'), array('name' => 'Province', 'value' => 'province_name', 'width' => '18%'), array('name' => 'District', 'value' => 'district_name', 'width' => '18%'), array('name' => 'Street', 'value' => 'street', 'width' => '18%'), array('name' => 'Status', 'value' => 'status', 'width' => '14%', 'function' => 'status_2_string'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/item');
		$grid_settings['search_url'] = site_url('admin/item/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $item_search_params['perpage'], 'start' => $start);

        $grid_settings['form'] = array('action' => site_url('admin/item/do_action'), 'buttons' => array(array('name' => 'Publish', 'action' => 'publish'), array('name' => 'Un-publish', 'action' => 'unpublish')));

		$data['main_content'] = $this->load->view('admin/includes/item_search', array('item_search_params' => $item_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$item = $this->items_model->get_by_id($id);
        $item['items'] = $this->items_model->get_by_id($id);
        
		$this->_render_view($item);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$item = $this->items_model->get_by_id($id);
            
    		$this->_render_edit($item);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');

            $rules['alias']	        = "required|callback_alias_check";
            $rules['name']	        = "required";
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
    			$this->_render_edit($_POST);
    		}
    		else {                
                $data['status'] = $this->input->post('status');
                $data['category_id'] = $this->input->post('category_id') != -1 ? $this->input->post('category_id') : '';
                $data['name'] = addslashes($this->input->post('name'));
                $data['alias'] = addslashes($this->input->post('alias'));
                $data['province_id'] = $data['province_id'] = $this->input->post('province_id') != -1 ? $this->input->post('province_id') : '';
                $data['district_id'] = $data['district_id'] = $this->input->post('district_id') != -1 ? $this->input->post('district_id') : '';
                $data['ward'] = addslashes($this->input->post('ward'));
                $data['street'] = addslashes($this->input->post('street'));
                $data['phone'] = $this->input->post('phone');
                $data['fax'] =$this->input->post('fax');
                $data['website'] = $this->input->post('website');
                $data['email'] = $this->input->post('email');
                $data['number_of_seats'] = $this->input->post('number_of_seats');
                $data['average_price'] = $this->input->post('average_price');
                $data['open_time_from'] = $data['open_time_from'] = $this->input->post('open_time_from') != -1 ? $this->input->post('open_time_from') : '';
                $data['open_time_to'] = $data['open_time_to'] = $this->input->post('open_time_to') != -1 ? $this->input->post('open_time_to') : '';
                $data['option_accept_booking'] =$this->input->post('option_accept_booking');
                $data['option_free_parking'] = $this->input->post('option_free_parking');
                $data['option_free_wifi'] = $this->input->post('option_free_wifi');
                $data['option_breakfast'] = $this->input->post('option_breakfast');
                $data['option_club_activities'] = $this->input->post('option_club_activities');
                $data['option_air_conditioner'] = $this->input->post('option_air_conditioner');
                $data['option_live_music'] = $this->input->post('option_live_music');
                $data['option_lunch'] = $this->input->post('option_lunch');
                $data['option_football'] = $this->input->post('option_football');
                $data['option_fashion'] = $this->input->post('option_fashion');
                $data['summary'] = addslashes($this->input->post('summary'));
                $data['description'] = addslashes($this->input->post('description'));
                $data['seo_keywords'] = addslashes($this->input->post('seo_keywords'));
                $data['seo_description'] = addslashes($this->input->post('seo_description'));
                
                $data['last_updated'] = date('Y-m-d h:i:s');
                
                if(isset($_FILES['image']['name'])) {
                    if($_FILES['image']['name'] != '') {
                        if($id != '') {
                            $this->_delete_image_by_item_id($id);
                            $data['image'] = '';
        				}
                        $this->load->library('upload', get_item_image_upload_config());

    					if (! $this->upload->do_upload('image')) {
    						$this->_render_edit($data);
    						return;
    					}
    					else {
    						$ud = $this->upload->data();
    						$data['image'] = $ud['file_name'];
    					}
                    }
                    else {
                        $this->_delete_image_by_item_id($id);
                        $data['image'] = '';
                    }
    			}
                
    			if($id != '') {
                    $this->items_model->update($id, $data);
                }
                else {
                    $data['added_date'] = date('Y-m-d h:i:s');
                    $this->items_model->insert($data);
                }
                redirect('admin/item');
    		}
		}
	}

    function alias_check($alias) {
        $p = $this->items_model->get_by_alias($alias);
        if($p != null && $p['id'] != $this->input->post('id')) {
            $this->validation->set_message('alias_check', "The $alias is not available");
            return false;
        }
        else {
            return true;
        }
	}

    function _render_view($item = array()) {
        $data['current_tab'] = 'item';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Item: ' . $item['name'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/item_view', array('item' => $item), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($item = array()) {
        $data['current_tab'] = 'item';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Item:', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/item_edit', array('item' => $item, 'items_catalog' =>$this->_get_items_catalog()), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->items_model->delete_by_id($this->uri->segment(4));
		redirect('admin/item');
	}
    
    function do_action() {
        $action = $this->input->post('action'); 
        
        if($action && $this->input->post('selected_id')) {          
            foreach($this->input->post('selected_id') as $aid) {
                if($action == 'publish') {
                    $this->items_model->update($aid, array('status' => '1'));
                }
                else if($action == 'unpublish') {
                    $this->items_model->update($aid, array('status' => '0'));
                }
            }  
        }
        redirect('admin/item');
    }
    
    function _get_items_catalog() {
        $result = $this->items_model->search(array('type' => 'ARTICLE', 'order_by' => 'name', 'order_direction' => 'ASC', 'start' => 0, 'perpage' => 1000));
        return $result['records'];
    }
    
    function export() {
        $result = $this->items_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC'));
        to_excel($result['records'], 'items');
    }
    
    function _delete_image_by_item_id($id) {
        $it = $this->items_model->get_by_id($id);

		if(null != $it && $it['image'] != '' && file_exists('./uploads/item/' . $it['image'])) {
			unlink('./uploads/item/' . $it['image']);
		}
    }
}
?>