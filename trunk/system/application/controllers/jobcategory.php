<?php

class JobCategory extends Controller {

    function JobCategory() {
        parent::Controller();
        $this->load->model('jobcategories_model', 'jobcategories_model', true);
    }

    function browse($category_id = 0) {
        $result = $this->jobcategories_model->search(array('order_by' => 'name'), "AND parent_id = $category_id");

        $data['categories'] = $result['records'];
        $parent = $this->jobcategories_model->get_by_id($category_id);
        $data['parent_category'] = $parent['name'];
        $this->layout->buildPage('jobcategory/index', $data);
    }
}
?>
