<?php

class Home extends Controller {

    function Home() {
        parent::Controller();
        $this->load->model('categories_model', 'categories_model', true);
        $this->load->model('provinces_model', 'provinces_model', true);
        $this->load->model('districts_model', 'districts_model', true);
        $this->load->model('news_model', 'news_model', true);
        $this->load->model('cafeshops_model', 'cafeshops_model', true);
    }

    function index() {
        $data['categories_catalog'] = $this->categories_model->get_cafeshop_categories_and_number_of_items();
        $data['provinces_catalog'] = get_provinces_and_districts_and_number_of_items(4);
        $data['latest_news'] = $this->_get_latest_news();
        $data['latest_cafeshops'] = $this->_get_latest_cafeshops();

        $this->layout->buildPage('home/index', $data);
    }
    
    function _get_latest_news() {
        $latest_news = $this->news_model->search(array('status' => 1, 'order_by' => 'added_date', 'order_direction' => 'DESC'));
        return $latest_news['records'];
    }
    
    function _get_latest_cafeshops() {
        $latest_cafeshops = $this->cafeshops_model->search(array('status' => 1, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => 0, 'perpage' => 5));
        return $latest_cafeshops['records'];
    }
}
?>
