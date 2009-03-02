<?php

class Faq extends Controller {

    function Faq() {
        parent::Controller();
        $this->load->model('faqs_model', 'faqs_model', true);
		$this->load->library('pagination');
        $this->load->library('validation');
    }
    
    function index($start = 0) {
    	$faqs = $this->faqs_model->search(array('status' => 1, 'order_by' => 'added_date', 'order_direction' => 'DESC', 'start' => $start, 'perpage' => 10), 'AND (answer <> \'\' OR answer IS NOT NULL)');
    	
    	$config['base_url'] = site_url("faq/index/$start/");
        $config['total_rows'] = $faqs['total'];
        $config['per_page'] = 10;
        $config['cur_page'] = $start;
		$this->pagination->initialize($config);
        
        $this->layout->buildPage('faq/index', array('faqs' => $faqs['records']));
    }

	function ask() {
		$action = site_url("faq/ask");
		
        $rules['questioner'] = "required";
		$rules['title'] = "required";
        $rules['question'] = "required";
		
		$this->validation->set_rules($rules);
        $this->validation->set_fields(array('questioner' => 'Tên của bạn', 'title' => 'Tiêu đề', 'question' => 'Câu hỏi'));
        /* Convert GET to POST, hacking ModalBox for CI validation */
        $_POST = $_GET;
        /* End */
        if ($this->validation->run() == false) {
            $this->load->view('faq_ask', array('action' => $action, 'info' => $_REQUEST));
		}
		else {
            $data['title'] = addslashes($this->input->post('title'));
            $data['question'] = addslashes($this->input->post('question'));
            $data['questioner'] = addslashes($this->input->post('questioner'));
            
            $data['last_updated'] = date('Y-m-d h:i:s');
			$data['added_date'] = date('Y-m-d h:i:s');
            $this->faqs_model->insert($data);
            $this->load->view('faq_thankyou', array());
		}
	}
}
?>