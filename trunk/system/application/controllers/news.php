<?php

class News extends Controller {

    function News() {
        parent::Controller();
        $this->load->model('news_model', 'news_model', true);
        $this->load->library('pagination');
        $this->load->library('validation');
        $this->load->helper('file');
    }
    
    function index() {
        $this->category();
    }
   
    function category($category = 'all', $start = 0) {
        $news = $this->news_model->search(array('status' => 1, 'category_alias' => $category, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => $start, 'perpage' => 10));
        
        $config['base_url'] = site_url("news/category/$category/");
        $config['total_rows'] = $news['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;

        $this->pagination->initialize($config); 
        
        $this->layout->buildPage('news/list', array('news' => $news['records']));
    }
    
    function detail($alias) {
        $news = $this->news_model->get_by_alias($alias);
        if(null != $news) {
            $this->news_model->update($news['id'], array('number_views' => $news['number_views'] + 1));

            $links = array();
            $categories = $this->news_model->get_categories_by_news_id($news['id']);
            foreach($categories as $c) {
                $links = array_merge($links, array(site_url('news/category/' . $c['alias']) => $c['name']));
            }
            $links = array(site_url() => 'Trang chủ', site_url('news') => 'Tin tức', $links);            
            $data['breadcrumb'] = generate_bread_crumb($links, $news['title']);

            $data['news'] = $news;
            $data['relate_news'] = $this->news_model->get_relate_news($news['id']);
            $this->layout->buildPage('news/detail', $data);
        }
        else {
            show_404();
        }
    }
    
    function print_version($alias) {
        $news = $this->news_model->get_by_alias($alias);
        if(null != $news) {
            print_r($news);
        }
        else {
            show_404();
        }
    }
}
?>