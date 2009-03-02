<?php
/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

require_once(APPPATH . 'controllers/admin/authentication.php');
class Setting extends Authentication {

	function Setting() {
		parent::Authentication();
        $this->load->library('validation');
        $this->load->model('settings_model', 'settings_model', true);
	}

	function index() {
        $data['current_tab'] = 'setting';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Settings: ', 'enabled_print' => false, 'enabled_help' => false);
        $setting = $this->settings_model->get();
        $data['main_content'] = $this->load->view('admin/includes/setting_view', array('setting' => $setting), true);

		$this->load->view('admin/main', $data);
	}
    
    function edit(){
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
    		$setting = $this->settings_model->get();
    		$this->_render_edit($setting);
		}
		else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rules['smtp_host'] = "required";
    		$rules['smtp_user']		= "required";
            $rules['smtp_password']		= "required";
    		
    		$this->validation->set_rules($rules);
            $this->validation->set_fields(array('smtp_host' => 'SMTP host', 'smtp_password' => 'SMTP password', 'smtp_user' => 'SMTP user'));
            
            if ($this->validation->run() == false) {
    			$this->_render_edit($_POST);
    		}
    		else {
                $data['smtp_host']          = $this->input->post('smtp_host');
                $data['smtp_user']          = $this->input->post('smtp_user');
                $data['smtp_password']      = $this->input->post('smtp_password');
                $data['wordwrap']           = $this->input->post('wordwrap');
                $data['charset']            = $this->input->post('charset');
                $data['sender_name']        = addslashes($this->input->post('sender_name'));
                $data['sender_email']       = $this->input->post('sender_email');
                $data['smtp_auth']          = ($this->input->post('smtp_auth') != '') ? $this->input->post('smtp_auth') : 0;
                
                $data['contact_address']    = addslashes($this->input->post('contact_address'));
                $data['contact_email']      = $this->input->post('contact_email');
                $data['contact_phone']      = $this->input->post('contact_phone');
                $data['contact_fax']        = $this->input->post('contact_fax');
                
                $this->settings_model->save($data);
                redirect('admin/setting');
    		}
		}
	}
    
    function _render_edit($setting = array()) {
        $data['current_tab'] = 'setting';
		$data['title_info'] = array('icon_image' => null, 'title' => 'Settings', 'enabled_print' => false, 'enabled_help' => false);
		$data['main_content'] = $this->load->view('admin/includes/setting_edit', array('setting' => $setting), true);

		$this->load->view('admin/main', $data);
    }
}
?>