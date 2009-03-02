<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class News extends Authentication {

	function News() {
		parent::Authentication();

		$this->load->model('news_model', 'news_model', true);
        $this->load->model('categories_model', 'categories_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('news_search_params');
		redirect('admin/news/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$news_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$news_search_params['title'] = $this->input->post('title');
			$news_search_params['description'] = $this->input->post('description');
			$news_search_params['status'] = $this->input->post('status');
		}
		else {
			$news_search_params = $this->session->userdata('news_search_params');
		}
		$news_search_params['order_by'] = $order_by;
		$news_search_params['order_direction'] = $order_direction;
		$news_search_params['perpage'] = 30;
		$news_search_params['start'] = $start;
		$this->session->set_userdata('news_search_params', $news_search_params);

		$result = $this->news_model->search($news_search_params);

		$data['current_tab'] = 'news';
		$data['title_info'] = array('icon_image' => null, 'title' => 'News: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Title', 'value' => 'title', 'width' => '50%'), array('name' => 'Added date', 'value' => 'added_date', 'width' => '20%'), array('name' => 'Last updated', 'value' => 'last_updated', 'width' => '20%'), array('name' => 'Submiter', 'value' => 'username', 'width' => '10%'), array('name' => 'Views', 'value' => 'number_views', 'width' => '10%'), array('name' => 'Status', 'value' => 'status', 'width' => '14%', 'function' => 'status_2_string'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/news');
		$grid_settings['search_url'] = site_url('admin/news/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $news_search_params['perpage'], 'start' => $start);

        $grid_settings['form'] = array('action' => site_url('admin/news/do_action'), 'buttons' => array(array('name' => 'Publish', 'action' => 'publish'), array('name' => 'Un-publish', 'action' => 'unpublish')));

		$data['main_content'] = $this->load->view('admin/includes/news_search', array('news_search_params' => $news_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$news = $this->news_model->get_by_id($id);
        $news['categories'] = $this->news_model->get_categories_by_news_id($id);
        
		$this->_render_view($news);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$news = $this->news_model->get_by_id($id);
            
            $news['categories'] = array();
            foreach($this->news_model->get_categories_by_news_id($id) as $c) {
                $news['categories'][] = $c['id'];
            }
            
    		$this->_render_edit($news);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');
            
            $rules['title']	= "required|callback_title_check";
            $rules['alias']	= "required|callback_alias_check";
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
                $_POST['categories'] = $this->input->post('category_id');
    			$this->_render_edit($_POST);
    		}
    		else {
                $data['status'] = addslashes($this->input->post('status'));
                $data['title'] = addslashes($this->input->post('title'));
                $data['alias'] = addslashes($this->input->post('alias'));
                $data['summary'] = addslashes($this->input->post('summary'));
                $data['description'] = addslashes($this->input->post('description'));
                $data['categories'] = $this->input->post('category_id');
                $data['source_name'] = addslashes($this->input->post('source_name'));
                $data['source_url'] = addslashes($this->input->post('source_url'));
                $data['seo_keywords'] = addslashes($this->input->post('seo_keywords'));
                $data['seo_description'] = addslashes($this->input->post('seo_description'));
                
                $data['last_updated'] = date('Y-m-d h:i:s');

                if(isset($_FILES['image']['name'])) {
                    if($_FILES['image']['name'] != '') {
                        if($id != '') {
                            $this->_delete_image_by_news_id($id);
                            $data['image'] = '';
        				}
                        $this->load->library('upload', get_news_image_upload_config());

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
                        $this->_delete_image_by_news_id($id);
                        $data['image'] = '';                        
                    }
    			}

    			if($id != '') {
                    $this->news_model->update($id, $data);
                }
                else {
                    $user = $this->session->userdata('user');
                    $data['user_id'] = $user['id'];
                    $data['added_date'] = $this->input->post('added_date') != false ? $this->input->post('added_date') . ' ' . date('h:i:s') : date('Y-m-d h:i:s');
                    $this->news_model->insert($data);
                }
                redirect('admin/news');
    		}
		}
	}
    
    function title_check($title) {
        $a = $this->news_model->get_by_title($title);
        if($a != null && $a['id'] != $this->input->post('id')) {
            $this->validation->set_message('title_check', "The $title is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function alias_check($alias) {
        $a = $this->news_model->get_by_alias($alias);
        if($a != null && $a['id'] != $this->input->post('id')) {
            $this->validation->set_message('alias_check', "The $alias is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function _render_view($news = array()) {
        $data['current_tab'] = 'news';
		$data['title_info'] = array('icon_image' => null, 'title' => 'News: ' . $news['title'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/news_view', array('news' => $news), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($news = array()) {
        $data['current_tab'] = 'news';
		$data['title_info'] = array('icon_image' => null, 'title' => 'News', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/news_edit', array('news' => $news, 'categories_catalog' =>$this->_get_categories_catalog()), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->news_model->delete_by_id($this->uri->segment(4));
		redirect('admin/news');
	}
    
    function do_action() {
        $action = $this->input->post('action'); 
        
        if($action && $this->input->post('selected_id')) {          
            foreach($this->input->post('selected_id') as $aid) {
                if($action == 'publish') {
                    $this->news_model->update($aid, array('status' => '1'));
                }
                else if($action == 'unpublish') {
                    $this->news_model->update($aid, array('status' => '0'));
                }
            }  
        }
        redirect('admin/news');
    }
    
    function _get_categories_catalog() {
        $result = $this->categories_model->search(array('type' => 'news', 'order_by' => 'name', 'order_direction' => 'ASC'));
        return $result['records'];
    }
    
    function export() {
        $result = $this->news_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC'));
        to_excel($result['records'], 'news');
    }
    
    function _delete_image_by_news_id($id) {
        $n = $this->news_model->get_by_id($id);
		if(null != $n && $n['image'] != '' && file_exists('./uploads/news/' . $n['image'])) {
			unlink('./uploads/news/' . $n['image']);
		}
    }
}
?>