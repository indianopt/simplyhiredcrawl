<?php

class Job extends Controller {

    function Job() {
        parent::Controller();
        $this->load->model('jobcategories_model', 'jobcategories_model', true);
        $this->load->model('jobs_model', 'jobs_model', true);
        $this->load->model('search_model', 'search_model', true);
        $this->load->library('pagination');
    }

    function category($id, $alias, $start = 0) {
        $result = $this->jobs_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC', 'perpage' => 10, 'start' => $start), "AND j.category_id = $id");

        $data['jobs'] = $result['records'];

        $config['base_url'] = site_url("job/category/$id/$alias/");
        $config['total_rows'] = $result['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;
        $config['uri_segment'] = 5;

        $this->pagination->initialize($config); 
        
        $category = $this->jobcategories_model->get_by_id($id);
        
        $parent = $this->jobcategories_model->get_by_id($category['parent_id']);
        $data['category'] = $parent;
        $data['title'] = $category['name'];
        
        $this->layout->buildPage('job/listing', $data);
    }
    
    function location($location, $start = 0) {
        $result = $this->jobs_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC', 'perpage' => 10, 'start' => $start), "AND j.location LIKE \"$location\"");

        $data['jobs'] = $result['records'];

        $config['base_url'] = site_url("job/location/$location/");
        $config['total_rows'] = $result['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config); 
        
        $data['title'] = $location;
        
        $this->layout->buildPage('job/listing', $data);
    }
    
    function company($company, $start = 0) {
        $result = $this->jobs_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC', 'perpage' => 10, 'start' => $start), "AND j.company LIKE \"$company%\"");

        $data['jobs'] = $result['records'];

        $config['base_url'] = site_url("job/company/$company/");
        $config['total_rows'] = $result['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config); 
        
        $data['title'] = "Companies - " . strtoupper($company);
        
        $this->layout->buildPage('job/listing', $data);
    }
    
    function title($title, $start = 0) {
        $result = $this->jobs_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC', 'perpage' => 10, 'start' => $start), "AND j.name LIKE \"$title%\"");

        $data['jobs'] = $result['records'];

        $config['base_url'] = site_url("job/title/$title/");
        $config['total_rows'] = $result['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config); 
        
        $data['title'] = "Titles - " . strtoupper($title);
        
        $this->layout->buildPage('job/listing', $data);
    }
    
    function search() {
        $mode = $this->input->post('mode');
        if($mode == '') {
            $mode = 'basic';
        }
        
        $code  = md5(microtime());
            
        $data['code'] = $code;
        $data['time'] = time();
        
        if($mode == 'basic') {
            $data['keyword'] = addslashes($this->input->post('keyword'));
            $data['location'] = addslashes($this->input->post('location'));
            $data['mode'] = 'basic';
        }
        else if($mode == 'advanced') {
            $data['keyword'] = addslashes($this->input->post('keyword'));
            $data['location'] = addslashes($this->input->post('location'));
            $data['keyword_within_job_title'] = addslashes($this->input->post('keyword_within_job_title'));
            $data['keyword_within_company_name'] = addslashes($this->input->post('keyword_within_company_name'));
            $data['category_id'] = $this->input->post('category_id');
            $data['preference_perpage'] = $this->input->post('preference_perpage');
            $data['preference_sortby'] = $this->input->post('preference_sortby');            
            $data['mode'] = 'advanced';
        }
        
        $this->search_model->insert($data);
        redirect('job/result/' . $code, 'refresh');
    }
    
    function advanced_search() {
        $result = $this->jobcategories_model->search(array('order_by' => 'name'), 'AND parent_id <> 0');

        $data['categories'] = $result['records'];
        
        $this->layout->buildPage('job/advanced_search', $data);
    }
    
    function result($code, $start = 0) {
        $criteria = $this->search_model->get_by_code($code);
        $keyword = '';
        $location = '';
        $keyword_within_job_title = ''; 
        $keyword_within_company_name = ''; 
        $category_id = 0;
        
        $oder_by = 'added_date';
        $perpage = 10;
        
        if($criteria != null) {
            if($criteria['mode'] == 'basic') {
                $keyword = stripslashes($criteria['keyword']);
                $location = stripslashes($criteria['location']);
                if($keyword) {
                    $oder_by = 'relevance';
                }
            }
            else if($criteria['mode'] == 'advanced') {
                $keyword = stripslashes($criteria['keyword']);
                $location = stripslashes($criteria['location']);
                $keyword_within_job_title = stripslashes($criteria['keyword_within_job_title']); 
                $keyword_within_company_name = stripslashes($criteria['keyword_within_company_name']); 
                $category_id = $criteria['category_id']; 
                
                if($criteria['preference_perpage']) {
                    $perpage = $criteria['preference_perpage'];
                }
                
                if($criteria['preference_perpage'] == 'relevance') {
                    if($keyword) {
                        $oder_by = 'relevance';
                    }
                    else if(keyword_within_job_title) {
                        $oder_by = 'job_title_relevance';
                    }
                    else if(keyword_within_company_name) {
                        $oder_by = 'company_relevance';
                    }
                }
            }
            
            $this->search_model->update($criteria['code'], array('time' => time()));
        }

        $result = $this->jobs_model->search(array('keyword' => $keyword, 'location' => $location, 'category_id' => $category_id, 'keyword_within_job_title' => $keyword_within_job_title, 'keyword_within_company_name' => $keyword_within_company_name, 'order_by' => $oder_by, 'order_direction' => 'DESC', 'perpage' => $perpage, 'start' => $start));

        $data['jobs'] = $result['records'];

        $config['base_url'] = site_url("job/result/$code");
        $config['total_rows'] = $result['total'];
        $config['per_page'] = $perpage;
        $config['cur_page'] = $start;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config); 
        
        $data['title'] = 'Result';
        $this->layout->buildPage('job/listing', $data);
    }
    
    function detail($id, $alias) {
        $job = $this->jobs_model->get_by_id($id);
        if($job) {
            $url = $job['url'];
            $redirect_url = get_redirect_url($url);
            
            if($redirect_url) {
            	if(strpos($redirect_url, 'http') === false) {
	            	$redirect_url = "http://www.simplyhired.com$redirect_url";
	            }
                header("location: $redirect_url");
            }
            else {
                header("location: $url");
            }
        }
        else {
            show_404();
        }
    }
}
?>
