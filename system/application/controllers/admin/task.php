<?php

class Task extends Controller {

    function Task() {
        parent::Controller();
    }

    function clear_search_keywords($numer_of_days = 5) {
        $this->load->model('search_model', 'search_model', true);
        $this->search_model->clear_search_keywords($numer_of_days);
    }
}
?>
