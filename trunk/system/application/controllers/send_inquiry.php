<?php

class Send_Inquiry extends Controller {

    function Send_Inquiry() {
        parent::Controller();
        $this->load->model('settings_model', 'settings_model', true);
        $this->load->library('validation');
        $this->load->helper('file');
    }
    
    function index() {
        $action = site_url("send_inquiry/index");
        
        $rules['sender_name'] = "required";
        $rules['sender_email'] = "required|valid_email";
        $rules['sender_phone'] = "required";
        $rules['title'] = "required";
        $rules['message'] = "required";
		
		$this->validation->set_rules($rules);
        $this->validation->set_fields(array('sender_name' => 'Tên của bạn', 'sender_email' => 'Email của bạn', 'receiver_email' => 'Email người nhận', 'title' => 'Tiêu đề', 'message' => 'Lời nhắn'));
        /* Convert GET to POST, hacking ModalBox for CI validation */
        $_POST = $_GET;
        /* End */
        if ($this->validation->run() == false) {
            $this->load->view('send_inquiry', array('action' => $action, 'info' => $_REQUEST));
		}
		else {
            $mail_body = read_file('./mail_templates/send_inquiry.txt');
            $mail_body = str_replace(array('$SENDER_NAME', '$SENDER_EMAIL', '$SENDER_PHONE', '$SENDER_COMPANY', '$TITLE', '$MESSAGE'), array($this->input->post('sender_name'), $this->input->post('sender_email'), $this->input->post('sender_phone'), $this->input->post('sender_company'), $this->input->post('title'), $this->input->post('message')), $mail_body);
            
            $setting = $this->settings_model->get();
                
            send_mail(array('name' => $this->input->post('sender_name'), 'email' => $this->input->post('sender_email')), array('name' => '', 'email' => $setting['contact_email']), 'Thông điệp liên gửi từ web', $mail_body);
            //send_mail(array('name' => $this->input->post('sender_name'), 'email' => $this->input->post('sender_email')), array(array('name' => '', 'email' => $setting['contact_email']), array('name' => '', 'email' => 'giao_dn@yahoo.com')), 'Thông điệp gửi qua web', $mail_body);
            echo 'Xin cám ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi qua email hoặc điện thoại bạn cung cấp sớm nhất có thể.';
		}
    }
}

?>
