<?php

class Home extends Controller {

    function Home() {
        parent::Controller();
        $this->load->model('jobcategories_model', 'jobcategories_model', true);
        $this->load->model('jobs_model', 'jobs_model', true);
    }

    function index() {
        $result = $this->jobcategories_model->search(array('order_by' => 'name'), 'AND parent_id = 0');

        $data['categories'] = $result['records'];
        
        $this->layout->buildPage('home/index', $data);
    }
}
?>
