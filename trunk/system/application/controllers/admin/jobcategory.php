<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class JobCategory extends Authentication {

	function JobCategory() {
		parent::Authentication();
        $this->load->model('jobcategories_model', 'jobcategories_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('jobcategory_search_params');
		redirect('admin/jobcategory/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$jobcategory_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$jobcategory_search_params['name'] = $this->input->post('name');
		}
		else {
			$jobcategory_search_params = $this->session->userdata('jobcategory_search_params');
		}
		$jobcategory_search_params['order_by'] = $order_by;
		$jobcategory_search_params['order_direction'] = $order_direction;
		$jobcategory_search_params['perpage'] = 30;
		$jobcategory_search_params['start'] = $start;
		$this->session->set_userdata('jobcategory_search_params', $jobcategory_search_params);

		$result = $this->jobcategories_model->search($jobcategory_search_params);

		$data['current_tab'] = 'jobcategory';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Job category: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Name', 'value' => 'name', 'width' => '20%'), array('name' => 'Url', 'value' => 'url', 'width' => '30%'), array('name' => 'Sort order', 'value' => 'sort_order', 'width' => '10%'), array('name' => 'Added date', 'value' => 'added_date', 'width' => '20%'), array('name' => 'Last updated', 'value' => 'last_updated', 'width' => '20%'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/jobcategory');
		$grid_settings['search_url'] = site_url('admin/jobcategory/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $jobcategory_search_params['perpage'], 'start' => $start);

		$data['main_content'] = $this->load->view('admin/includes/jobcategory_search', array('jobcategory_search_params' => $jobcategory_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$jobcategory = $this->jobcategories_model->get_by_id($id);
        
		$this->_render_view($jobcategory);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$jobcategory = $this->jobcategories_model->get_by_id($id);
            
    		$this->_render_edit($jobcategory);
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
                $data['url'] = $this->input->post('alias');
                $data['parent_id'] = $this->input->post('parent_id');
                $data['sort_order'] = $this->input->post('sort_order');
                $data['last_updated'] = date('Y-m-d h:i:s');
                
    			if($id != '') {
                    $this->jobcategories_model->update($id, $data);
                }
                else {
                    $data['added_date'] = date('Y-m-d h:i:s');
                    $this->jobcategories_model->insert($data);
                }
                redirect('admin/jobcategory');
    		}
		}
	}
    
     function name_check($name) {
        $user = $this->jobcategories_model->get_by_name($name);
        if($user != null && $user['id'] != $this->input->post('id')) {
            $this->validation->set_message('name_check', "The $name is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function alias_check($alias) {
        $user = $this->jobcategories_model->get_by_alias($alias);
        if($user != null && $user['id'] != $this->input->post('id')) {
            $this->validation->set_message('alias_check', "The $alias is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function _render_view($jobcategory = array()) {
        $data['current_tab'] = 'jobcategory';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Job category: ' . $jobcategory['name'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/jobcategory_view', array('jobcategory' => $jobcategory), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($jobcategory = array()) {
        $data['current_tab'] = 'jobcategory';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Job category', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/jobcategory_edit', array('jobcategory' => $jobcategory), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->jobcategories_model->delete_by_id($this->uri->segment(4));
		redirect('admin/jobcategory');
	}

    function crawl_categories() {
        $links = extract_internal_links_from_url('http://www.simplyhired.com/job-search/');
        
        $num_inserted = 0;
        $num_existed = 0;
        foreach($links as $l) {
            $a = extract_anchor($l);
           
            $url = $a['href'];
            $name = $a['name'];

            if(!strpos($url, 'job-search/onet') === false) {
                $c = $this->jobcategories_model->get_by_name(addslashes($name));

                if(null == $c) {
                    $data['name'] = addslashes($name);
                    $data['alias'] = strip_disallowed_characters($name);
                    $data['url'] = $url;
                    $data['parent_id'] = 0;
                    $data['last_updated'] = date('Y-m-d h:i:s');
                    $data['added_date'] = date('Y-m-d h:i:s');

        			$id = $this->jobcategories_model->insert($data);

                    $num_inserted++;
                }
                else {
                    $id = $c['id'];
                    $num_existed++;
                }
                
                $sub_cat_links = extract_internal_links_from_url($url);
            
                foreach($sub_cat_links as $scl) {
                    $a = extract_anchor($scl);
           
                    $url = $a['href'];
                    $name = $a['name'];
                    if(!strpos($url, '/jobs/list/q') === false) {
                        $c = $this->jobcategories_model->get_by_name(addslashes($name));

                        if(null == $c) {
                            $data['name'] = addslashes($name);
                            $data['alias'] = strip_disallowed_characters($name);
                            $data['url'] = $url;
                            $data['parent_id'] = $id;
                            $data['last_updated'] = date('Y-m-d h:i:s');
                            $data['added_date'] = date('Y-m-d h:i:s');

                			$id = $this->jobcategories_model->insert($data);
                            $num_inserted++;
                        }
                        else {
                            $id = $c['id'];
                            $num_existed++;
                        }
                    }
                }
            }
        }
        
        $this->load->view('admin/crawl_jobcategories_report', array('num_inserted' => $num_inserted, 'num_existed' => $num_existed));
    }
}
?>