<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Job extends Authentication {

	function Job() {
		parent::Authentication();
        $this->load->model('jobs_model', 'jobs_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('job_search_params');
		redirect('admin/job/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$job_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$job_search_params['name'] = $this->input->post('name');
		}
		else {
			$job_search_params = $this->session->userdata('job_search_params');
		}
		$job_search_params['order_by'] = $order_by;
		$job_search_params['order_direction'] = $order_direction;
		$job_search_params['perpage'] = 30;
		$job_search_params['start'] = $start;
		$this->session->set_userdata('job_search_params', $job_search_params);

		$result = $this->jobs_model->search($job_search_params);

		$data['current_tab'] = 'job';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Job category: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Name', 'value' => 'name', 'width' => '20%'), array('name' => 'Category', 'value' => 'category_name', 'width' => '20%'), array('name' => 'Company', 'value' => 'company', 'width' => '20%'), array('name' => 'Location', 'value' => 'location', 'width' => '20%')/*, array('name' => 'Added date', 'value' => 'added_date', 'width' => '20%'), array('name' => 'Last updated', 'value' => 'last_updated', 'width' => '20%')*/);
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/job');
		$grid_settings['search_url'] = site_url('admin/job/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $job_search_params['perpage'], 'start' => $start);

		$data['main_content'] = $this->load->view('admin/includes/job_search', array('job_search_params' => $job_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
		$job = $this->jobs_model->get_by_id($id);
        
		$this->_render_view($job);
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4, 0);
    		$job = $this->jobs_model->get_by_id($id);
            
    		$this->_render_edit($job);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');
            
            $rules['name']	        = "required";  
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
    			$this->_render_edit($_POST);
    		}
    		else {
                $data['name'] = addslashes($this->input->post('name'));
                $data['company'] = addslashes($this->input->post('company'));
                $data['location'] = addslashes($this->input->post('location'));
                $data['description'] = addslashes($this->input->post('description'));
                $data['time_latest'] = addslashes($this->input->post('time_latest'));
                $data['crawl_from'] = addslashes($this->input->post('crawl_from'));
                $data['url'] = addslashes($this->input->post('url'));
                
                $data['category_id'] = $this->input->post('category_id');
                
                $data['last_updated'] = date('Y-m-d h:i:s');
                
    			if($id != '') {
                    $this->jobs_model->update($id, $data);
                }
                else {
                    $data['added_date'] = date('Y-m-d h:i:s');
                    $this->jobs_model->insert($data);
                }
                redirect('admin/job');
    		}
		}
	}
    
     function name_check($name) {
        $user = $this->jobs_model->get_by_name($name);
        if($user != null && $user['id'] != $this->input->post('id')) {
            $this->validation->set_message('name_check', "The $name is not available");
            return false;
        }
        else {
            return true;
        }
	}
    
    function _render_view($job = array()) {
        $data['current_tab'] = 'job';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Job: ' . $job['name'], 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/job_view', array('job' => $job), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($job = array()) {
        $data['current_tab'] = 'job';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Job', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/job_edit', array('job' => $job), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->jobs_model->delete_by_id($this->uri->segment(4));
		redirect('admin/job');
	}
    
    function crawl_jobs() {
        $this->load->model('jobcategories_model', 'jobcategories_model', true);

		$result = $this->jobcategories_model->search(
                                                        array(
                                                            'order_by' => 'added_date',
                                                            //'perpage' => 1,
                                                            //'start' => 0
                                                        ),
                                                        'AND parent_id <> 0'
                                                    );        
        if(!empty($result['records'])) {
            $url = $result['records'][0]['url'];
            $category_id = $result['records'][0]['id'];
            while($url) {
                $url = $this->process_url($url, $category_id);    
            }    
        }
    }
    
    function process_url($url, $category_id) {       
        $content = @file_get_contents($url);
        if(!$content) die("Error loading {$url}");
        
        $path_info = parse_url($url);
        $base = $path_info['scheme'] . "://" . $path_info['host'];
        $content = preg_replace("/<a([^>]*)href=\"\//is", "<a$1href=\"{$base}/", $content);
        $content = preg_replace("/<a([^>]*)href=\"\?/is", "<a$1href=\"{$url}/?", $content);
        
        preg_match_all("/<a class=\"next\" rel=\"nofollow\" href=\"([^\"]*)\"(?:[^>]*)>(?:[^<]*)<\/a>/is", $content, $matches);
        $next_url = isset($matches[1][0]) ? $matches[1][0] : false;
        
        preg_match_all("/<div class=\"results\">(.*)<div class=\"results featured\">/is", $content, $matches);
        $content = $matches[0][0];
        
        $result = array();
        $s_pattern = '<div class="job">';
        $e_pattern = '</div><!--job-->';
        
        while(strpos($content, $s_pattern) !== false) {
            $s = strpos($content, $s_pattern);
            $e = strpos($content, $e_pattern);
        
            $c = substr($content, $s, ($e - $s) + strlen($e_pattern));
            $content = substr($content, $e + strlen($e_pattern));
            $c = str_replace("/<span class=\"tools\">/is", '', $c);
            
            // Parse $c
            $f = strpos($c, '<div class="heading">');
            $l = strpos($c, '<div class="details">');
            $heading = strip_tags(substr($c, $f, ($l - $f)), '<a>');
            
            $a = extract_anchor($heading);
            
            $name = $a['name'];
            $url = $a['href'];
            
            $f = strpos($c, '<div class="details">');
            $l = strpos($c, '<div class="description">');
            $temp = substr($c, $f, ($l - $f));
            
            $details = strip_tags($temp);
            $details = explode('-', $details);
            if(strpos($temp, 'class="company who"') !== false) {
                $company = trim($details[0]);
                if(strpos($temp, '<span class="location">') !== false) {
                    $location = trim($details[1]);
                }
                    
            }
            else {
                $company = '';
                if(strpos($temp, '<span class="location">') !== false) {
                    $location = trim($details[0]);
                }
            }
            
            $f = strpos($c, '<div class="description">');
            $l = strpos($c, '<div class="info">');
            $description = trim(strip_tags(substr($c, $f, ($l - $f))));
            
            $f = strpos($c, '<span class="info">');
            $l = strpos($c, '<span class="tools">');
            $info = trim(strip_tags(substr($c, $f, ($l - $f))));
            
            $info = explode('from', $info);
            $time_latest = $info[0];
            $crawl_from = $info[1];
            // End parse $c
            
            $data['name'] = addslashes($name);
            $data['company'] = addslashes($company);
            $data['location'] = addslashes($location);
            $data['description'] = addslashes($description);
            $data['time_latest'] = addslashes($time_latest);
            $data['crawl_from'] = addslashes($crawl_from);
            $data['category_id '] = $category_id;
            
            $data['last_updated'] = date('Y-m-d h:i:s');
            $data['added_date'] = date('Y-m-d h:i:s');
            
            $j = $this->jobs_model->get_by_name_company_location_description_time_latest_crawl_from_category_id(addslashes($name), addslashes($company), addslashes($location), addslashes($description), addslashes($time_latest), addslashes($crawl_from), $category_id);
            if(null == $j) {
                $this->jobs_model->insert($data);
            }
            else {
                return false;   
            }
        }
        
        return $next_url;
    }
    
    function test() {
        $this->process_url('http://www.simplyhired.com/a/jobs/list/q-Administration', 2);
    }
}
?>