<?php

class CafeShop extends Controller {

    function CafeShop() {
        parent::Controller();
        $this->load->model('cafeshops_model', 'cafeshops_model', true);
        $this->load->model('item_images_model', 'item_images_model', true);
        $this->load->library('pagination');
    }
    
    function index() {
        $this->category();
    }

    function category($category = 'all', $start = 0) {
        $cafeshops = $this->cafeshops_model->search(array('status' => 1, 'category_alias' => $category, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => $start, 'perpage' => 10));
        
        $config['base_url'] = site_url("cafeshop/category/$category/");
        $config['total_rows'] = $cafeshops['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;

        $this->pagination->initialize($config); 

		$links = array(site_url() => 'Trang chủ');
        if($category != 'all') {
            $this->load->model('categories_model', 'categories_model', true);
            $c = $this->categories_model->get_by_alias($category);

            if(null != $c) {
                $curent_location = $c['name'];
				$data['breadcrumb'] = generate_bread_crumb($links, $curent_location);
            }
        }

		$data['cafeshops'] = $cafeshops['records'];
        $this->layout->buildPage('cafeshop/list', $data);
    }
    
    function location($province = 'all', $district = 'all', $start = 0) {
        $cafeshops = $this->cafeshops_model->search(array('status' => 1, 'province_alias' => $province, 'district_alias' => $district, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => $start, 'perpage' => 10));
        
        $config['base_url'] = site_url("cafeshop/location/$province/$district");
        $config['total_rows'] = $cafeshops['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;

        $this->pagination->initialize($config);
        
        $links = array(site_url() => 'Trang chủ');
        if($province != 'all') {
            $this->load->model('provinces_model', 'provinces_model', true);
            $p = $this->provinces_model->get_by_alias($province);
            
            $this->load->model('districts_model', 'districts_model', true);
            $d = null;
            if($district != 'all') {
                $d = $this->districts_model->get_by_alias($district);
            }
            if(null != $p && null == $d) {
                $curent_location = $p['name'];
                $links = array_merge($links, array(site_url('cafeshop/alllocations/') => 'Tất cả địa điểm'));
            }
            else {
                $links = array_merge($links, array(site_url('cafeshop/alllocations/') => 'Tất cả địa điểm', site_url('cafeshop/location/' . $p['alias']) => $p['name']));
                $curent_location = $d['name'];
            }
        }
        $data['breadcrumb'] = generate_bread_crumb($links, $curent_location);
        
        $data['cafeshops'] = $cafeshops['records'];
        
        $this->layout->buildPage('cafeshop/list', $data);
    }
    
    function alllocations() {
        $data['provinces_catalog'] = get_provinces_and_districts_and_number_of_items();
        
        $links = array(site_url() => 'Trang chủ');            
        $data['breadcrumb'] = generate_bread_crumb($links, 'Tất cả địa điểm');
        
        $this->layout->buildPage('cafeshop/all_locations', $data);
    }
    
    function detail($alias) {
        $cafeshop = $this->cafeshops_model->get_by_alias($alias);
        if(null != $cafeshop) {
            $this->cafeshops_model->update($cafeshop['id'], array('number_views' => $cafeshop['number_views'] + 1));
            
            $links = array();
            $categories = $this->cafeshops_model->get_categories_by_cafeshop_id($cafeshop['id']);
            foreach($categories as $c) {
                $links = array_merge($links, array(site_url('cafeshop/category/' . $c['alias']) => $c['name']));
            }
            $links = array(site_url() => 'Trang chủ', site_url('cafeshop') => 'Quán cafe', $links);            
            $data['breadcrumb'] = generate_bread_crumb($links, $cafeshop['name']);
            
            $data['cafeshop'] = $cafeshop;
            $data['relate_cafeshops'] = $this->cafeshops_model->get_relate_cafeshops($cafeshop['id']);
            $item_images = $this->item_images_model->search(array('item_id' => $cafeshop['id'], 'order_by' => 'title', 'order_direction' => 'ACS'), "AND image <> ''");
            $data['item_images'] = $item_images['records'];
            
            $data['page_title'] = $cafeshop['name'];
            $data['page_keywords'] = $cafeshop['seo_keywords'];
            $data['page_description'] = $cafeshop['seo_description'];
            
            $this->layout->buildPage('cafeshop/detail', $data);    
        }
        else {
            show_404();
        }
    }
    
    function gallery($alias) {
        $cafeshop = $this->cafeshops_model->get_by_alias($alias);
        if(null != $cafeshop) {
            $data['cafeshop'] = $cafeshop;
            $item_images = $this->item_images_model->search(array('item_id' => $cafeshop['id'], 'order_by' => 'title', 'order_direction' => 'ACS'), "AND image <> ''");
            $data['item_images'] = $item_images['records'];
            $this->load->view('smooth_gallery' ,$data);    
        }
        else {
            show_404();
        }
    }
}

?>
