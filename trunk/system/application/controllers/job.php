<?php

class Job extends Controller {

    function Job() {
        parent::Controller();
        $this->load->model('jobcategories_model', 'jobcategories_model', true);
        $this->load->model('jobs_model', 'jobs_model', true);
        $this->load->library('pagination');
    }

    function listing($type, $id, $alias, $start = 0) {
        $result = $this->jobs_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC', 'perpage' => 10, 'start' => $start), "AND category_id = $id");

        $data['jobs'] = $result['records'];
        
        $config['base_url'] = site_url("job/listing/$type//$id/$alias/");
        $config['total_rows'] = $result['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;

        $this->pagination->initialize($config); 
        
        $categories = $this->jobcategories_model->get_by_id($id);
        $data['category'] = $categories['name'];
        $this->layout->buildPage('job/listing', $data);
    }
    
    function search() {
        $keyword = $this->input->post('keyword');
        $location = $this->input->post('location');
        
        redirect('job/result/' . ($keyword ? $keyword : 'none') . '/' . ($location ? $location : 'none'), 'refresh');
    }
    
    function result($keyword, $location) {
    }
    
}
?>
