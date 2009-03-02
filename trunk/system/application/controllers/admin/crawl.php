<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

class Crawl extends Controller {

	function Crawl() {
        parent::Controller();
        $this->load->model('jobs_model', 'jobs_model', true);
        $this->load->model('jobcategories_model', 'jobcategories_model', true);
	}

	function index() {

	}
   
    function jobs() {
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
    
    function categories() {
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
    
    function test() {
        echo 'Ok!';
    }
}
?>