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
   
    function jobs($perpage = 5, $continue_run = false, $ignore_existed = false) {
		$result = $this->jobcategories_model->search(
                                                        array(
                                                            'order_by' => 'added_date',
                                                            'perpage' => 1,
                                                            'start' => 0
                                                        ),
                                                        'AND parent_id <> 0 AND is_crawl_completed = 0'
                                                    );        
        $is_complete = false;
        $output = '';                                                        
        if(!empty($result['records'])) {
            $category = $result['records'][0];
            $url = $category['next_url'] ? $category['next_url'] : $category['url'];
            $category_id = $category['id'];
            $index = 1;
            while($url) {
                $output .= "$category_id::$url <br />";
                $this->jobcategories_model->update($category_id, array('next_url' => $url));
                if($index > $perpage) {
                    break;
                }
                $url = $this->process_url($url, $category_id, $ignore_existed);
                $index++;
            }
            if(!$url) {
                $this->jobcategories_model->update($category_id, array('is_crawl_completed' => 1));
            }
        }
        else {
            $this->jobcategories_model->update(false, array('is_crawl_completed' => 1, 'next_url' => ''));
            $is_complete = true;
        }
        $this->load->view('admin/crawl_jobs_report', array('output' => $output, 'continue_run' => $continue_run, 'is_complete' => $is_complete));
    }
    
    function daily_crawl_jobs($deep = 3, $perpage = 5, $continue_run = false) {
        $result = $this->jobcategories_model->search(
                                                        array(
                                                            'order_by' => 'added_date',
                                                            'perpage' => 1,
                                                            'start' => 0
                                                        ),
                                                        'AND parent_id <> 0 AND is_crawl_daily_completed = 0'
                                                    );        
        $is_complete = false;
        $output = '';                                                        
        if(!empty($result['records'])) {
            $category = $result['records'][0];
            $url = $category['daily_next_url'] ? $category['daily_next_url'] : $category['url'];
            $category_id = $category['id'];
            $index = 1;
            $number_of_duplicated = 0;
            $ignore_existed = true;
            while($url) {
                $output .= "$category_id::$url <br />";
                $this->jobcategories_model->update($category_id, array('daily_next_url' => $url));
                if($index > $perpage) {
                    break;
                }
                if($number_of_duplicated >= $deep) {
                    $ignore_existed = true;
                }
                $url = $this->process_url($url, $category_id, $ignore_existed, $number_of_duplicated);
                $index++;
            }
            if(!$url) {
                $this->jobcategories_model->update($category_id, array('is_crawl_daily_completed' => 1));
            }
        }
        else {
            $this->jobcategories_model->update(false, array('is_crawl_daily_completed' => 1, 'daily_next_url' => ''));
            $is_complete = true;
        }
        $this->load->view('admin/crawl_jobs_report', array('output' => $output, 'continue_run' => $continue_run, 'is_complete' => $is_complete));
    }    
    
    function process_url($url, $category_id, $ignore_existed = false, &$number_of_duplicated = 0) {       
        $content = @file_get_contents($url);
        if($content) {
            $path_info = parse_url($url);
            $base = $path_info['scheme'] . "://" . $path_info['host'];
            $content = preg_replace("/<a([^>]*)href=\"\//is", "<a$1href=\"{$base}/", $content);
            $content = preg_replace("/<a([^>]*)href=\"\?/is", "<a$1href=\"{$url}/?", $content);
            
            preg_match_all("/<a class=\"next\" rel=\"nofollow\" href=\"([^\"]*)\"(?:[^>]*)>(?:[^<]*)<\/a>/is", $content, $matches);
            $next_url = isset($matches[1][0]) ? $matches[1][0] : false;
            
            //preg_match_all("/<div class=\"results\">(.*)<div class=\"results featured\">/is", $content, $matches);
            //$content = $matches[0][0];
            
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
                $detail_url = $a['href'];
                
                $f = strpos($c, '<div class="details">');
                $l = strpos($c, '<div class="description">');
                $temp = substr($c, $f, ($l - $f));
                
                $company = '';
                $location = '';
                if(strpos($temp, 'class="company who"><u>') !== false) {
                    $f = strpos($temp, 'class="company who"><u>') + strlen('class="company who"><u>');
                    $l = strpos($temp, '</u></a>', $f);
                    $company = substr($temp, $f, ($l - $f));
                        
                }
                else if(strpos($temp, '<span class="company">') !== false) {
                    $f = strpos($temp, '<span class="company">') + strlen('<span class="company">');
                    $l = strpos($temp, '</span>', $f);
                    $company = substr($temp, $f, ($l - $f));
                        
                }
                if(strpos($temp, '<span class="location">') !== false) {
                    $f = strpos($temp, '<span class="location">') + strlen('<span class="location">');
                    $l = strpos($temp, '</span>', $f);
                    $location = substr($temp, $f, ($l - $f));
                        
                }
                
                $description = '';
                if(strpos($c, '<div class="description">') !== false) {    
                    $f = strpos($c, '<div class="description">');
                    $l = strpos($c, '</div>', $f);
                    $description = trim(strip_tags(substr($c, $f, ($l - $f))));
                }
                             
                $time_latest = '';
                if(strpos($c, '<span class="time latest">') !== false) {    
                    $f = strpos($c, '<span class="time latest">');
                    $l = strpos($c, '</span>', $f);
                    $time_latest = trim(strip_tags(substr($c, $f, ($l - $f))));
                }
                
                $crawl_from = '';
                if(strpos($c, 'from') !== false) {    
                    $f = strpos($c, 'from') + strlen('from');
                    $l = strpos($c, '</a>', $f);
                    $crawl_from = trim(strip_tags(substr($c, $f, ($l - $f))));
                }
                // End parse $c
                
                $data['name'] = addslashes($name);
                $data['alias'] = trim(strip_disallowed_characters($name));
                $data['company'] = addslashes($company);
                $data['location'] = addslashes($location);
                $data['description'] = addslashes($description);
                $data['time_latest'] = addslashes($time_latest);
                $data['crawl_from'] = addslashes($crawl_from);
                echo '<pre>';
                    print_r($data);
                echo '</pre>';
                echo '<hr />';
                /*
                $data['category_id '] = $category_id;
                $data['url '] = $detail_url;
                
                $data['last_updated'] = date('Y-m-d h:i:s');
                $data['added_date'] = date('Y-m-d h:i:s');
                
                $j = $this->jobs_model->get_by_name_company_location_description_time_latest_crawl_from_category_id(addslashes($name), addslashes($company), addslashes($location), addslashes($description), addslashes($time_latest), addslashes($crawl_from), $category_id);
                if(null == $j) {
                    $this->jobs_model->insert($data);
                }
                else {
                    $number_of_duplicated++;
                    if(!$ignore_existed) {
                        return false;
                    }
                }
                */
            }
            
            return $next_url;    
        }
        else {
            return false;
        }
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
                    $data['alias'] = trim(strip_disallowed_characters($name));
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
                            $data['alias'] = trim(strip_disallowed_characters($name));
                            $data['url'] = $url;
                            $data['parent_id'] = $id;
                            $data['last_updated'] = date('Y-m-d h:i:s');
                            $data['added_date'] = date('Y-m-d h:i:s');

                			$this->jobcategories_model->insert($data);
                            $num_inserted++;
                        }
                        else {
                            $num_existed++;
                        }
                    }
                }
            }
        }
        
        $this->load->view('admin/crawl_jobcategories_report', array('num_inserted' => $num_inserted, 'num_existed' => $num_existed));
    }
    
    function test() {
        $this->process_url('http://www.simplyhired.com/a/jobs/list/q-Administration', 0);
    }
    
    function test_cron() {
        echo 'Ok';
    }
}
?>