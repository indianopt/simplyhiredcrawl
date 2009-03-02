<?php

class Send_2_Friends extends Controller {

    function Send_2_Friends() {
        parent::Controller();
        $this->load->model('news_model', 'news_model', true);
        $this->load->library('validation');
        $this->load->helper('file');
    }
    
    function index($type, $alias) {
        $item = null;
        $action = site_url("send_2_friends/index/$type/$alias");
        
        if(strtoupper($type) == 'NEWS') {
            $item = $this->news_model->get_by_alias($alias);
        }
        else if(strtoupper($type) == 'CAFESHOP') {
            $item = $this->cafeshop_model->get_by_alias($alias);
        }
        
        if(null != $item) {
            $rules['sender_name'] = "required";
            $rules['sender_email'] = "required|valid_email";
            $rules['receiver_email'] = "required|valid_email";
            $rules['title'] = "required";
            $rules['message'] = "required";
    		
    		$this->validation->set_rules($rules);
            $this->validation->set_fields(array('sender_name' => 'Tên của bạn', 'sender_email' => 'Email của bạn', 'receiver_email' => 'Email người nhận', 'title' => 'Tiêu đề', 'message' => 'Lời nhắn'));
            /* Convert GET to POST, hacking ModalBox for CI validation */
            $_POST = $_GET;
            /* End */
            if ($this->validation->run() == false) {
                $this->load->view('send_2_friends', array('action' => $action, 'info' => $_REQUEST));
    		}
    		else {
                $mail_body = read_file('./mail_templates/send_2_friend.txt');
                $mail_body = str_replace(array('$SENDER_NAME', '$SENDER_EMAIL', '$URL', '$MESSAGE'), array($this->input->post('sender_name'), $this->input->post('sender_email'), site_url("news/detail/$alias"), $this->input->post('message')), $mail_body);
                    
                send_mail(array('name' => $this->input->post('sender_name'), 'email' => $this->input->post('sender_email')), array('name' => '', 'email' => $this->input->post('receiver_email')), $this->input->post('title'), $mail_body);
                echo 'Thông tin đã được gửi đến bạn của bạn.';
    		}
        }
        else {
            show_404();
        }
    }
}

?>
