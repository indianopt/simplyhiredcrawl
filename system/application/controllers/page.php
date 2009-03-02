<?php

class Page extends Controller {

    function Page() {
        parent::Controller();
        $this->load->model('nodes_model', 'nodes_model', true);
    }
    
    function index($name) {
        $node = $this->nodes_model->get_by_reference_name($name);
        if(null != $node) {
            $this->layout->buildPage('page/index', array('node' => $node));
        }
        else {
            show_404();
        }
    }
}
?>