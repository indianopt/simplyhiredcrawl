<?php

class UnderConstruction extends Controller {

    function UnderConstruction() {
        parent::Controller();
    }

    function index() {
        $this->load->view('under_consctruction');
    }
}

?>
