<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class CafeShop extends Authentication {

	function CafeShop() {
		parent::Authentication();
        $this->load->model('categories_model', 'categories_model', true);
        $this->load->model('cafeshops_model', 'cafeshops_model', true);
        $this->load->model('item_images_model', 'item_images_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('cafeshop_search_params');
		redirect('admin/cafeshop/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$cafeshop_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$cafeshop_search_params['name'] = $this->input->post('name');
			$cafeshop_search_params['category_id'] = $this->input->post('category_id');
            $cafeshop_search_params['province_id'] = $this->input->post('province_id');
            $cafeshop_search_params['district_id'] = $this->input->post('district_id');
			$cafeshop_search_params['status'] = $this->input->post('status');
		}
		else {
			$cafeshop_search_params = $this->session->userdata('cafeshop_search_params');
		}
		$cafeshop_search_params['order_by'] = $order_by;
		$cafeshop_search_params['order_direction'] = $order_direction;
		$cafeshop_search_params['perpage'] = 30;
		$cafeshop_search_params['start'] = $start;
		$this->session->set_userdata('cafeshop_search_params', $cafeshop_search_params);

		$result = $this->cafeshops_model->search($cafeshop_search_params);

		$data['current_tab'] = 'cafeshop';
		$data['title_info'] = array('icon_image' => null, 'title' => 'CafeShop: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Name', 'value' => 'name', 'width' => '18%'), array('name' => 'Categories', 'value' => 'id', 'width' => '18%', 'function' => 'cafeshop_categories'), array('name' => 'Province', 'value' => 'province_name', 'width' => '18%'), array('name' => 'District', 'value' => 'district_name', 'width' => '18%'), array('name' => 'Street', 'value' => 'street', 'width' => '18%'), array('name' => 'Submiter', 'value' => 'username', 'width' => '10%'), array('name' => 'View', 'value' => 'number_views', 'width' => '5%'), array('name' => 'Status', 'value' => 'status', 'width' => '10%', 'function' => 'status_2_string'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/cafeshop');
		$grid_settings['search_url'] = site_url('admin/cafeshop/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $cafeshop_search_params['perpage'], 'start' => $start);

        $grid_settings['form'] = array('action' => site_url('admin/cafeshop/do_action'), 'buttons' => array(array('name' => 'Publish', 'action' => 'publish'), array('name' => 'Un-publish', 'action' => 'unpublish')));

		$data['main_content'] = $this->load->view('admin/includes/cafeshop_search', array('cafeshop_search_params' => $cafeshop_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$cafeshop = $this->cafeshops_model->get_by_id($id);
        $cafeshop['cafeshops'] = $this->cafeshops_model->get_by_id($id);
        
		$this->_render_view($cafeshop);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$cafeshop = $this->cafeshops_model->get_by_id($id);
            
            $cafeshop['categories'] = array();
            foreach($this->cafeshops_model->get_categories_by_cafeshop_id($id) as $c) {
                $cafeshop['categories'][] = $c['id'];
            }
            
    		$this->_render_edit($cafeshop);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');

            $rules['alias']	        = "required|callback_alias_check";
            $rules['name']	        = "required";
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
                 $_POST['categories'] = $this->input->post('category_id');
    			$this->_render_edit($_POST);
    		}
    		else {                
                $data['status'] = $this->input->post('status');
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
                $data['min_price'] = $this->input->post('min_price');
                $data['max_price'] = $this->input->post('max_price');
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
                $data['source'] = addslashes($this->input->post('source'));
                $data['categories'] = $this->input->post('category_id');

                $data['last_updated'] = date('Y-m-d h:i:s');
                
                if(isset($_FILES['image']['name'])) {
                    if($_FILES['image']['name'] != '') {
                        if($id != '') {
                            $this->_delete_image_by_cafeshop_id($id);
                            $data['image'] = '';
        				}
                        $this->load->library('upload', get_cafeshop_image_upload_config());

    					if (! $this->upload->do_upload('image')) {
                            $data['id'] = $id;
    						$this->_render_edit($data);
    						return;
    					}
    					else {
    						$ud = $this->upload->data();
    						$data['image'] = $ud['file_name'];
    					}
                    }
                    else {
                        $this->_delete_image_by_cafeshop_id($id);
                        $data['image'] = '';
                    }
    			}
                
    			if($id != '') {
                    $this->cafeshops_model->update($id, $data);
                }
                else {
                    $data['added_date'] = date('Y-m-d h:i:s');
                    $user = $this->session->userdata('user');
                    $data['user_id'] = $user['id'];
                    $this->cafeshops_model->insert($data);
                }
                redirect('admin/cafeshop');
    		}
		}
	}

    function upload_image($id) {
        $cafeshop = $this->cafeshops_model->get_by_id($id);
        $this->load->library('upload', get_item_image_gallery_upload_config());
		if (! $this->upload->do_upload('image')) {
			$this->_render_view($cafeshop);
			return;
		}
		else {
		    $ud = $this->upload->data();
            
            $this->item_images_model->insert(array('item_id' => $id, 'title' => addslashes($this->input->post('title')), 'added_date' => date('Y-m-d h:i:s'), 'last_updated' => date('Y-m-d h:i:s'), 'image' => $ud['file_name']));

            if ( ! $this->_create_thumbnail('./uploads/item_image_gallery/' . $ud['file_name'], './uploads/item_image_gallery/thumbnail/' . $ud['file_name'])) {
                $this->_render_view($cafeshop);
			    return;
            }
            else {
                redirect("admin/cafeshop/detail/$id");
            }
		}
    }
    
    function _create_thumbnail($src_img, $new_img) {
        $config['source_image'] = $src_img;
        $config['new_image'] = $new_img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 100;
        $config['height'] = 75;
    
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        
        return $this->image_lib->resize();
    }

    function alias_check($alias) {
        $p = $this->cafeshops_model->get_by_alias($alias);
        if($p != null && $p['id'] != $this->input->post('id')) {
            $this->validation->set_message('alias_check', "The $alias is not available");
            return false;
        }
        else {
            return true;
        }
	}

    function _render_view($cafeshop = array(), $start = 0, $order_by = '', $order_direction = '') {
        $data['current_tab'] = 'cafeshop';
		$data['title_info'] = array('icon_image' => null, 'title' => 'CafeShop: ' . $cafeshop['name'], 'enabled_print' => false, 'enabled_help' => false);

        $grid_settings['heading'] = array(array('name' => 'Title', 'value' => 'title', 'width' => '80%'), array('name' => 'Added date', 'value' => 'added_date', 'width' => '20%'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/cafeshop/image/' . $cafeshop['id']);
		$grid_settings['search_url'] = site_url('admin/cafeshop/image/' . $cafeshop['id'] . '/search/-1/');
        $result = $this->item_images_model->search(array('item_id' => $cafeshop['id'], 'order_by' => $order_by, 'order_direction' => $order_direction, 'start' => $start, 'perpage' => 30));
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => 30, 'start' => $start);

        $grid_settings['form'] = array('action' => site_url('admin/cafeshop/do_action'), 'buttons' => array(array('name' => 'Delete', 'action' => 'delete_image')));
        
		$data['main_content'] = $this->load->view('admin/includes/cafeshop_view', array('cafeshop' => $cafeshop, 'gallery' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
    }
    
    function image($cafeshop_id, $action, $image_id, $start = 0, $order_by = 'name', $order_direction = 'ASC') {
        $cafeshop = $this->cafeshops_model->get_by_id($cafeshop_id);
        $image = $this->item_images_model->get_by_id($image_id);
        if($action == 'detail') {
            $this->_render_view_image($cafeshop, $image);
        }
        else if($action == 'edit') {
            $this->_render_edit_image($cafeshop, $image);
        }
        else if($action == 'delete') {
            $this->_delete_gallery_image($image_id);
            redirect('admin/cafeshop/detail/' . $cafeshop_id);
        }
        else if($action == 'search') {
            $this->_render_view($cafeshop, $start, $order_by, $order_direction);
        }
    }
    
    function image_edit() {
        $image_id = $this->input->post('image_id');
        $cafeshop_id = $this->input->post('cafeshop_id');
        
        $cafeshop = $this->cafeshops_model->get_by_id($cafeshop_id);
        if(null != $cafeshop) {
            if(isset($_FILES['image']['name'])) {
                if($_FILES['image']['name'] != '') {
                    if($image_id != '') {
                        $this->_delete_gallery_image($image_id);
                        $data['image'] = '';
    				}
                    $this->load->library('upload', get_item_image_gallery_upload_config());

    				if (! $this->upload->do_upload('image')) {
                        $data['image_id'] = $image_id;
    					$this->_render_edit_image($cafeshop, $data);
    					return;
    				}
    				else {
    					$ud = $this->upload->data();
    					$data['image'] = $ud['file_name'];
    				}
                }
                else {
                    $this->_delete_gallery_image($image_id);
                    $data['image'] = '';
                }
    		}
            $data['added_date'] = date('Y-m-d h:i:s');
            $data['title'] = addslashes($this->input->post('title'));
    		if($image_id != '') {
                $this->item_images_model->update($image_id, $data);
            }
            else {
                $this->item_images_model->insert($data);
            }
            redirect("admin/cafeshop/detail/$cafeshop_id");
        }
    }
    
    function _render_edit($cafeshop = array()) {
        $data['current_tab'] = 'cafeshop';
		$data['title_info'] = array('icon_image' => null, 'title' => 'CafeShop:', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/cafeshop_edit', array('cafeshop' => $cafeshop, 'cafeshops_catalog' =>$this->_get_cafeshops_catalog(), 'categories_catalog' =>$this->_get_categories_catalog()), true);
        
		$this->load->view('admin/main', $data);
    }
    
    function _render_edit_image($cafeshop, $image = array()) {
        $data['current_tab'] = 'cafeshop';
		$data['title_info'] = array('icon_image' => null, 'title' => 'CafeShop > ' . $cafeshop['name'] . ' > Image:', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/cafeshop_image_edit', array('cafeshop' => $cafeshop, 'image' => $image), true);
        
		$this->load->view('admin/main', $data);
    }
    
    function _render_view_image($cafeshop, $image = array()) {
        $data['current_tab'] = 'cafeshop';
		$data['title_info'] = array('icon_image' => null, 'title' => 'CafeShop > ' . $cafeshop['name'] . ' > Image:', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/cafeshop_image_view', array('cafeshop' => $cafeshop, 'image' => $image), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
        $cafeshop = $this->cafeshops_model->get_by_id($id);
        if(null != $cafeshop) {
            foreach($this->item_images_model->get_by_item_id($id) as $img_item) {
                $this->_delete_gallery_image($img_item['id']);
            }
		    $this->cafeshops_model->delete_by_id($id);
        }
		redirect('admin/cafeshop');
	}
    
    function do_action() {
        $action = $this->input->post('action'); 
        $redirect_to = 'admin/cafeshop';
        if($action && $this->input->post('selected_id')) {          
            foreach($this->input->post('selected_id') as $id) {
                if($action == 'publish') {
                    $this->cafeshops_model->update($id, array('status' => '1'));
                }
                else if($action == 'unpublish') {
                    $this->cafeshops_model->update($id, array('status' => '0'));
                }
                else if($action == 'delete_image') {
                    $image = $this->item_images_model->get_by_id($id);
                    if(null != $image) {
                        $cafeshop = $this->cafeshops_model->get_by_id($image['item_id']);
                        if(null != $cafeshop) {
                            $this->_delete_gallery_image($id);
                            $redirect_to = 'admin/cafeshop/detail/' . $cafeshop['id'];
                        }
                    }
                }
            }  
        }
        redirect($redirect_to);
    }
    
    function _delete_gallery_image($id) {
        $image = $this->item_images_model->get_by_id($id);
        if(null != $image) {
            if($image['image'] != '') {
                if(file_exists('./uploads/item_image_gallery/' . $image['image'])) {
                    unlink('./uploads/item_image_gallery/' . $image['image']);
                }
                if(file_exists('./uploads/item_image_gallery/thumbnail/' . $image['image'])) {
                    unlink('./uploads/item_image_gallery/thumbnail/' . $image['image']);
                }
            }
        }

        $this->item_images_model->delete($id);
    }
    
    function _get_cafeshops_catalog() {
        $result = $this->cafeshops_model->search(array('order_by' => 'name', 'order_direction' => 'ASC', 'start' => 0, 'perpage' => 1000));
        return $result['records'];
    }
    
    function export() {
        $result = $this->cafeshops_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC'));
        to_excel($result['records'], 'cafeshops');
    }
    
    function _delete_image_by_cafeshop_id($id) {
        $it = $this->cafeshops_model->get_by_id($id);

		if(null != $it && $it['image'] != '' && file_exists('./uploads/cafeshop/' . $it['image'])) {
			unlink('./uploads/cafeshop/' . $it['image']);
		}
    }
    
    function _get_categories_catalog() {
        $result = $this->categories_model->search(array('type' => 'cafeshop', 'order_by' => 'name', 'order_direction' => 'ASC'));
        return $result['records'];
    }
}
?>