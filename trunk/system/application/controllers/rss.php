<?php
  
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class RSS extends Controller {

	function RSS() {
		parent::Controller();
        
        $this->load->model('news_articles_model', 'news_articles_model', true);
        $this->load->helper('xml');
        $this->load->config('news');
	}

    function index() {
        $data['categories'] = array_values($this->config->item('categories'));        
		$data['activeTab'] = 'rss';

		$data['pageTitle'] = 'RSS Feed';
		$this->layout->buildPage('rss/index', $data);
    }

    function category($category = '', $limit = 20) {
        $result = $this->news_articles_model->search(array('news_category' => $category, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => 0, 'perpage' => $limit));
        
        $posts = array();
        foreach($result['records'] as $r) {
            $link = ($r['description'] == '' && $r['source_url'] != '') ? $r['source_url']: site_url('news_articles/view/' . $r['id']);
            $posts[] = array(
                                'title'         => $r['title'],
                                'link'          => $link,
                                'guid'          => $link,
                                'description'   => $r['summary'],
                                'pubDate'       => $r['added_date']
                            );
        }
        
        $data['posts'] = $posts;    
      
        $data['encoding'] = 'utf-8';
        $data['feed_name'] = 'healthnews.org';
        $data['feed_url'] = 'http://www.healthnews.org';
        $data['page_description'] = 'HealthNews.org provides the latest health news, information and resources.  Whether you are looking for doctor profiles, breaking news, health videos or general heath information, HealthNews.org should be your first stop';
        $data['page_language'] = 'en-us';
        $data['creator_email'] = 'healthnews.org';
        header("Content-Type: application/rss+xml");
        $this->load->view('feed/rss', $data);
    }
    
    function keyword($keyword = '', $limit = 20) {
        $result = $this->news_articles_model->search(array('keyword' => $keyword, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => 0, 'perpage' => $limit));
        
        $posts = array();
        foreach($result['records'] as $r) {
            $link = ($r['description'] == '' && $r['source_url'] != '') ? $r['source_url']: site_url('news_articles/view/' . $r['id']);
            $posts[] = array(
                                'title'         => $r['title'],
                                'link'          => $link,
                                'guid'          => $link,
                                'description'   => $r['summary'],
                                'pubDate'       => $r['added_date']
                            );
        }
        
        $data['posts'] = $posts;    
      
        $data['encoding'] = 'utf-8';
        $data['feed_name'] = 'healthnews.org';
        $data['feed_url'] = 'http://www.healthnews.org';
        $data['page_description'] = 'HealthNews.org provides the latest health news, information and resources.  Whether you are looking for doctor profiles, breaking news, health videos or general heath information, HealthNews.org should be your first stop';
        $data['page_language'] = 'en-us';
        $data['creator_email'] = 'healthnews.org';
        header("Content-Type: application/rss+xml");
        $this->load->view('feed/rss', $data);
    }
    
    function source($source = '', $limit = 20) {
        $result = $this->news_articles_model->search(array('source' => $source, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => 0, 'perpage' => $limit));
        
        $posts = array();
        foreach($result['records'] as $r) {
            $link = ($r['description'] == '' && $r['source_url'] != '') ? $r['source_url']: site_url('news_articles/view/' . $r['id']);
            $posts[] = array(
                                'title'         => $r['title'],
                                'link'          => $link,
                                'guid'          => $link,
                                'description'   => $r['summary'],
                                'pubDate'       => $r['added_date']
                            );
        }
        
        $data['posts'] = $posts;    
      
        $data['encoding'] = 'utf-8';
        $data['feed_name'] = 'healthnews.org';
        $data['feed_url'] = 'http://www.healthnews.org';
        $data['page_description'] = 'HealthNews.org provides the latest health news, information and resources.  Whether you are looking for doctor profiles, breaking news, health videos or general heath information, HealthNews.org should be your first stop';
        $data['page_language'] = 'en-us';
        $data['creator_email'] = 'healthnews.org';
        header("Content-Type: application/rss+xml");
        $this->load->view('feed/rss', $data);
    }
}
?>