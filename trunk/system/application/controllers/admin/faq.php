<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Faq extends Authentication {

	function Faq() {
		parent::Authentication();

		$this->load->model('faqs_model', 'faqs_model', true);
        $this->load->library('validation');
	}

	function index() {
        $this->session->unset_userdata('faqs_search_params');
		redirect('admin/faq/search/', 'refresh');
	}

	function search($start = 0, $order_by = '', $order_direction = 'ASC') {
		$faqs_search_params = array();

		$make_new_search = $this->input->post('make_new_search');
		if($make_new_search) {
			$faqs_search_params['question'] = $this->input->post('question');
			$faqs_search_params['answer'] = $this->input->post('answer');
			$faqs_search_params['status'] = $this->input->post('status');
			$faqs_search_params['reply'] = $this->input->post('reply');
		}
		else {
			$faqs_search_params = $this->session->userdata('faqs_search_params');
		}
		$faqs_search_params['order_by'] = $order_by;
		$faqs_search_params['order_direction'] = $order_direction;
		$faqs_search_params['perpage'] = 30;
		$faqs_search_params['start'] = $start;
		$this->session->set_userdata('faqs_search_params', $faqs_search_params);

		$result = $this->faqs_model->search($faqs_search_params);

		$data['current_tab'] = 'faq';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Faq: Home', 'enabled_print' => false, 'enabled_help' => false);

		$grid_settings['heading'] = array(array('name' => 'Questioner', 'value' => 'questioner', 'width' => '30%'), array('name' => 'Title', 'value' => 'title', 'width' => '40%'), array('name' => 'Added date', 'value' => 'added_date', 'width' => '20%'), array('name' => 'Status', 'value' => 'status', 'width' => '14%', 'function' => 'status_2_string'));
		$grid_settings['id_field'] = 'id';
		$grid_settings['order_by'] = $order_by;
		$grid_settings['order_direction'] = $order_direction;
		$grid_settings['base_url'] = site_url('admin/faq');
		$grid_settings['search_url'] = site_url('admin/faq/search');
		$grid_settings['items'] = $result['records'];
		$grid_settings['pagination'] = array('total' => $result['total'], 'perpage' => $faqs_search_params['perpage'], 'start' => $start);

        $grid_settings['form'] = array('action' => site_url('admin/faq/do_action'), 'buttons' => array(array('name' => 'Publish', 'action' => 'publish'), array('name' => 'Un-publish', 'action' => 'unpublish')));

		$data['main_content'] = $this->load->view('admin/includes/faq_search', array('faqs_search_params' => $faqs_search_params, 'data_grid' => create_grid($grid_settings)), true);

		$this->load->view('admin/main', $data);
	}

	function detail() {
		$id = $this->uri->segment(4);
       
		$this->_render_view($this->faqs_model->get_by_id($id));
	}

	function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $this->uri->segment(4);
    		$faq = $this->faqs_model->get_by_id($id);
            $this->_render_edit($faq);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id');
            
            $rules['title']	= "required";
    		
    		$this->validation->set_rules($rules);
            
            if ($this->validation->run() == false) {
    			$this->_render_edit($_POST);
    		}
    		else {
                $data['status'] = $this->input->post('status');
                $data['title'] = addslashes($this->input->post('title'));
                $data['question'] = addslashes($this->input->post('question'));
                $answer = trim(str_replace('<p>&#160;</p>', '', $this->input->post('answer'))) != '' ? $this->input->post('answer') : '';
                $data['answer'] = addslashes($answer);
                $data['questioner'] = addslashes($this->input->post('questioner'));
                
                $data['last_updated'] = date('Y-m-d h:i:s');

    			if($id != '') {
                    $this->faqs_model->update($id, $data);
                }
                else {
                    $data['added_date'] = date('Y-m-d h:i:s');
                    $this->faqs_model->insert($data);
                }
                redirect('admin/faq');
    		}
		}
	}
    
    function _render_view($faq = array()) {
        $data['current_tab'] = 'faq';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Faq: ' . stripslashes($faq['title']), 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/faq_view', array('faq' => $faq), true);

		$this->load->view('admin/main', $data);
    }
    
    function _render_edit($faq = array()) {
        $data['current_tab'] = 'faq';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Faq', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/faq_edit', array('faq' => $faq), true);
        
		$this->load->view('admin/main', $data);
    }

	function delete($id) {
		$this->faqs_model->delete_by_id($this->uri->segment(4));
		redirect('admin/faq');
	}
    
    function do_action() {
        $action = $this->input->post('action'); 
        
        if($action && $this->input->post('selected_id')) {          
            foreach($this->input->post('selected_id') as $aid) {
                if($action == 'publish') {
                    $this->faqs_model->update($aid, array('status' => '1'));
                }
                else if($action == 'unpublish') {
                    $this->faqs_model->update($aid, array('status' => '0'));
                }
            }  
        }
        redirect('admin/faq');
    }
    
    function export() {
        $result = $this->faqs_model->search(array('order_by' => 'added_date', 'order_direction' => 'DESC'));
        to_excel($result['records'], 'faq');
    }
}
?>