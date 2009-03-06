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

        $this->pagination->initialize($config); 
        
        $data['title'] = "Titles - " . strtoupper($title);
        
        $this->layout->buildPage('job/listing', $data);
    }
    
    function search() {
        $keyword = $this->input->post('keyword');
        $location = $this->input->post('location');
        
        $code = md5(microtime());
        $this->search_model->insert(array('code' => $code, 'keyword' => $keyword, 'location' => $location, 'time' => time()));
        
        redirect('job/result/' . $code, 'refresh');
    }
    
    function result($code, $start = 0) {
        $criteria = $this->search_model->get_by_code($code);
        $keyword = '';
        $location = '';
        if($criteria != null) {
            $keyword = $criteria['keyword'];
            $location = $criteria['location'];
        }
        $result = $this->jobs_model->search(array('keyword' => $keyword, 'location' => $location, 'order_by' => $keyword ? 'relevance' : 'added_date', 'order_direction' => 'DESC', 'perpage' => 10, 'start' => $start));

        $data['jobs'] = $result['records'];

        $config['base_url'] = site_url("job/result/$keyword/$location");
        $config['total_rows'] = $result['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;

        $this->pagination->initialize($config); 
        
        $data['title'] = 'Result';
        $this->layout->buildPage('job/listing', $data);
    }
}
?>
