<?php

class Contact extends Controller {

    function Contact() {
        parent::Controller();
        $this->load->model('settings_model', 'settings_model', true);
    }
    
    function index() {
        $this->layout->buildPage('contact/index', array('setting' => $this->settings_model->get()));
    }

}
?>