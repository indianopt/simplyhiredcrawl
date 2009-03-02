<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");
    
    /*
    * Created by Dang Ngoc Giao at giaodn@gmail.com
    */

    function header_with_tabs($current_tab = null) {
        $CI =& get_instance();
        $CI->load->config('settings');
        $modules = $CI->config->item('modules');
        
        $tabs['home'] = array('name' => 'Home', 'url' => site_url('admin/home'));
        $tabs['setting'] = array('name' => 'Settings', 'url' => site_url('admin/setting'));
        $tabs['user'] = array('name' => 'Users', 'url' => site_url('admin/user'));
        $tabs['category'] = array('name' => 'Categories', 'url' => site_url('admin/category'));
        $tabs['news'] = array('name' => 'News', 'url' => site_url('admin/news'));
        $tabs['cafeshop'] = array('name' => 'Cafe shops', 'url' => site_url('admin/cafeshop'));
        $tabs['faq'] = array('name' => 'FAQs', 'url' => site_url('admin/faq'));
		$tabs['node'] = array('name' => 'Nodes', 'url' => site_url('admin/node'));
        $tabs['navigation'] = array('name' => 'Navigations', 'url' => site_url('admin/navigation'));
        
        $tabs['jobcategory'] = array('name' => 'Job categories', 'url' => site_url('admin/jobcategory'));
        $tabs['job'] = array('name' => 'Jobs', 'url' => site_url('admin/job'));
        
        $visible_tabs = array();
        foreach($tabs as $module_name => $dat) {
            if(array_key_exists($module_name, $modules) && $modules[$module_name]) {
                $visible_tabs[$module_name] = $dat;
            }
        }
        	
    	$CI =& get_instance();
    	return $CI->load->view('admin/includes/header', array('tabs' => $visible_tabs, 'current_tab' => $current_tab, 'user' => $CI->session->userdata('user_id')), true);
    }

    function shortcuts($current_tab) {
        $shortcuts['home'] = array(
    								array('icon_image' => 'list.png', 'name' => 'Create user', 'url' => site_url('admin/user/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'Create category', 'url' => site_url('admin/category/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'Create news', 'url' => site_url('admin/news/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'Create item', 'url' => site_url('admin/item/edit')),
    							);
        $shortcuts['setting'] = array();
        $shortcuts['category'] = array(
    								array('icon_image' => 'new.png', 'name' => 'Create', 'url' => site_url('admin/category/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'List', 'url' => site_url('admin/category')),
    							);            
    	$shortcuts['user'] = array(
    								array('icon_image' => 'new.png', 'name' => 'Create', 'url' => site_url('admin/user/edit')),
    								array('icon_image' => 'list.png', 'name' => 'List', 'url' => site_url('admin/user'))
    							);
        $shortcuts['news'] = array(
    								array('icon_image' => 'new.png', 'name' => 'Create', 'url' => site_url('admin/news/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'List', 'url' => site_url('admin/news')),
                                    array('icon_image' => 'list.png', 'name' => 'Export', 'url' => site_url('admin/news/export'))
    							);
        $shortcuts['cafeshop'] = array(
    								array('icon_image' => 'new.png', 'name' => 'Create', 'url' => site_url('admin/cafeshop/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'List', 'url' => site_url('admin/cafeshop'))
    							);
    	$shortcuts['faq'] = array(
    								array('icon_image' => 'new.png', 'name' => 'Create', 'url' => site_url('admin/faq/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'List', 'url' => site_url('admin/faq'))
    							);
		$shortcuts['node'] = array(
    								array('icon_image' => 'new.png', 'name' => 'Create', 'url' => site_url('admin/node/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'List', 'url' => site_url('admin/node'))
    							);
        $shortcuts['navigation'] = array(
    								array('icon_image' => 'new.png', 'name' => 'Create', 'url' => site_url('admin/navigation/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'List', 'url' => site_url('admin/navigation'))
    							);
    	
    	$shortcuts['jobcategory'] = array(
    								array('icon_image' => 'new.png', 'name' => 'Create', 'url' => site_url('admin/jobcategory/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'List', 'url' => site_url('admin/jobcategory')),
    							);
        
        $shortcuts['job'] = array(
    								array('icon_image' => 'new.png', 'name' => 'Create', 'url' => site_url('admin/job/edit')),
                                    array('icon_image' => 'list.png', 'name' => 'List', 'url' => site_url('admin/job')),
    							);

    	$CI =& get_instance();
    	return $CI->load->view('admin/includes/shortcuts', array('shortcuts' => $shortcuts[$current_tab]), true);
    }

    function module_title($title_info) {
    	$CI =& get_instance();
    	return $CI->load->view("admin/includes/module_title", $title_info, true);
    }

    function create_grid($settings){
        $show_form = isset($settings['form']) && isset($settings['form']['buttons']);
        
        $form_buttons = '&nbsp;';
        if($show_form) {
            foreach($settings['form']['buttons'] as $b) {
                
                $form_buttons .= '<input type="submit" class="button" name="' . $b['name'] . '" value=" ' . $b['name'] . ' " onclick="this.form.action.value=\'' . $b['action'] . '\'" />&nbsp;';
            }
        }

    	$pagination = 	'
    					<tr>
    						<td colspan="100%" align="right">
    							<table border="0" cellpadding="0" cellspacing="0" width="100%">
    								<tr>
    									<td align="left" class="listViewPaginationTdS1">' . $form_buttons . '</td>
    									<td class="listViewPaginationTdS1" align="right" nowrap="nowrap" id="listViewPaginationButtons">'
    									. pagination_links($settings['search_url'], $settings['pagination']['total'], $settings['pagination']['perpage'], $settings['pagination']['start']) .
    									'</td>
    								</tr>
    							</table>
    						</td>
    					</tr>';
        			
    	$heading = 	'<tr height="20">' . ($show_form ? '<td scope="col" class="listViewThS1" nowrap width="1%"><input type="checkbox" class="checkbox" name="toggle" value="" onclick="toggle_checkbox(\'grid_form\', \'selected_id[]\', this.checked)" /></td>' : '');
        				foreach ($settings['heading'] as $h) {
        					$image_icon = 'arrow.gif';
        					$dir = '';
        					if ($settings['order_by'] == $h['value']) {
        						if (strcasecmp($settings['order_direction'], 'ASC') == 0) {
        							$image_icon = 'arrow_up.gif';
        							$dir = 'DESC';
        						}
        						if (strcasecmp($settings['order_direction'], 'DESC') == 0) {
        							$image_icon = 'arrow_down.gif';
        							$dir = 'ASC';
        						}
        					}
        					$heading .= 	'<td scope="col" width="' . $h['width'] . '" class="listViewThS1" nowrap>
        										<div style="white-space: nowrap;"width="100%" align="left">
        											<a href="' . $settings['search_url'] . '/0/' . $h['value'] . (($dir != '') ? '/' . $dir : '') . '" class="listViewThLinkS1">' . $h['name'] . '&nbsp;&nbsp;
        												<img border="0" src="'  . base_url().  'images/admin/' . $image_icon . '" width="8" height="10" align="absmiddle" alt="">
        											</a>
        										</div>
        									</td>';
        				}
    				
    	$heading .= '<td scope="col" class="listViewThS1" nowrap width="1%">Action(s)</td>
    			</tr>';


    	$data = '';
    	$index = 1;
    	foreach ($settings['items'] as $item) {
    		$class = ($index - 1) % 2 == 0 ? 'oddListRowS1' : 'evenListRowS1';
    		$bgcolor = ($index - 1) % 2 == 0 ? '#fdfdfd' : '#f1f1f1';
    		$index++;
    		$data .= '<tr height="20">' . ($show_form ? '<td width="1%" class="' . $class . '" bgcolor="' . $bgcolor . '" nowrap><input onclick="" type="checkbox" class="checkbox" name="selected_id[]" value="' . $item[$settings['id_field']] . '"></td>' : '');
    		foreach ($settings['heading'] as $h) {
    			$value = stripslashes($item[$h['value']]);
    			if(isset($h['function'])) $value = $h['function']($item[$h['value']]);
    			$data .= 	'<td scope="row" align="left" valign=top class="' . $class . '" bgcolor="' . $bgcolor . '">' . $value . '</td>';
    		}		
    		$data .= '<td width="1%" class="' . $class . '" bgcolor="' . $bgcolor . '" nowrap>
    					<a title="View" href="' . $settings['base_url'] . '/detail/' . $item[$settings['id_field']] . '"><img border=0 src='  . base_url() .  'images/admin/view.gif></a>&nbsp;<a title="Edit" href="' . $settings['base_url'] . '/edit/' . $item[$settings['id_field']] . '"><img border=0 src='  . base_url() .  'images/admin/edit.gif></a>&nbsp;<a title="Delete" href="' . $settings['base_url'] . '/delete/' . $item[$settings['id_field']] . '" onclick="return confirm(\'Are you sure you want to delete?\')"><img border=0 src='  . base_url() .  'images/admin/delete.gif></a>
    				</td>
    			</tr>
    		';
    		$data .= '<tr><td colspan="100%" class="listViewHRS1"></td></tr>';
    	}
    	
    	//$grid = '<form id="grid_form" name="grid_form" action="' . $settings['base_url'] . '/handle_action' . '" method="post"><input type="hidden" id="grid_action" name="action" value="" /><table cellpadding="0" cellspacing="0" width="100%" border="0" class="listView">' . $pagination . $heading . $data . $pagination . '</table></form>';
        $grid = '<table cellpadding="0" cellspacing="0" width="100%" border="0" class="listView">' . $pagination . $heading . $data . $pagination . '</table>';
        
    	if(isset($settings['mass_update_form'])) $grid .= '<p></p>' . $settings['mass_update_form'];
        
        if($show_form) {
            $grid = '<form id="grid_form" name="grid_form" action="' . $settings['form']['action'] . '" method="post"><input type="hidden" id="grid_action" name="action" value="" />' . $grid . '</form>';
        }
        
    	return $grid;
    }

    function pagination_links($search_url, $total, $perpage, $start = 0) {
    	$end = ($start + $perpage) < $total ? $start + $perpage : $total;
    	
    	$first = _create_link($search_url . '/0', 'start', ($start != 0 && $total > 0) ? 'on' : 'off');
    	$next = _create_link($search_url . '/' . ($start + $perpage), 'next', ($start + $perpage < $total) ? 'on' : 'off');
    	$previous = _create_link($search_url . '/' . ($start - $perpage), 'previous', ($start > 0) ? 'on' : 'off');
    	$last = _create_link($search_url . '/' . (floor($total / $perpage) * $perpage), 'end', (($start + $perpage) < $total) ? 'on' : 'off');
    	
    	return $first . '&nbsp;&nbsp;' . $previous . '&nbsp;&nbsp;' . '<span class="pageNumbers">(' . ($total != 0 ? $start + 1 : $start) . ' - ' . $end . ' of ' . $total . ')</span>&nbsp;&nbsp;' . $next . '&nbsp;&nbsp;' . $last;
    }

    function _create_link($url, $direction, $status) {
    	$image_icon = ($status == 'off') ? $direction . '_off.gif' : $direction . '.gif';
    	$h = '<img src="' . base_url() . 'images/admin/' . $image_icon . '" align="absmiddle" border="0">';
    	$t = ucfirst($direction);
    	$link = ($direction == 'start' || $direction == 'previous') ? $h . $t : $t . $h;

    	return ($status == 'off') ? $link : '<a href="' . $url . '" class="listViewPaginationLinkS1">' . $link . '</a>';
    }

    function form_fckeditor($data = '', $value = '', $extra = '') {
    	$CI =& get_instance();

    	$fckeditor_basepath = base_url() . 'system/plugins/fckeditor/';

    	require_once(BASEPATH . 'plugins/fckeditor/fckeditor.php');
    	
    	$instanceName = ( is_array($data) && isset($data['name'])  ) ? $data['name'] : $data;
    	$fckeditor = new FCKeditor($instanceName);

    	if( $fckeditor->IsCompatible() ) {
    		//$fckeditor->Value = html_entity_decode($value);
            $fckeditor->Value = $value;
    		$fckeditor->BasePath = $fckeditor_basepath;
    		
    		$fckeditor->ToolbarSet = 'office2003';

    		if( is_array($data) ) {
    			if( isset($data['value']) )
    				//$fckeditor->Value = html_entity_decode($data['value']);
                    $fckeditor->Value = $data['value'];
    			if( isset($data['basepath']) )
    				$fckeditor->BasePath = $data['basepath'];
    			if( isset($data['toolbarset']) )
    				$fckeditor->ToolbarSet = $data['toolbarset'];
    			if( isset($data['width']) )
    				$fckeditor->Width = $data['width'];
    			if( isset($data['height']) )
    				$fckeditor->Height = $data['height'];
    		}

    		return $fckeditor->CreateHtml();
    	}
    	else {
    		return form_textarea( $data, $value, $extra );
    	}
    }

    function date_rank($period) {
    	$today = date('Y-m-d H:i:s');
    	if($period == 'today') {
    		return array('start_date' =>  date('Y-m-d 00:00:00'), 'end_date' => $today);
    	}
    	else if($period == 'this_week') {
    		return array('start_date' =>  date('Y-m-d 00:00:00', strtotime("last Monday")), 'end_date' => $today);
    	}
    	else if($period == 'this_month') {
    		return array('start_date' => date('Y-m-01 00:00:00'), 'end_date' => $today);
    	}
    	else if($period == 'this_year') {
    		return array('start_date' => date('Y-01-01 00:00:00'), 'end_date' => $today);
    	}
    }

    function generate_code() {
    	foreach ($_REQUEST as $key => $val) {
    		echo "\$data['" . $key . "'] = addslashes(\$this->input->post('" . $key . "'));<br/>";
    	}
    }

    function true_or_false($value) {
    	if($value == 0) return '<input type="checkbox" disabled="disabled" />';
    	else if($value == 1) return '<input type="checkbox" disabled="disabled" checked="checked" />';
    	else return '';
    }

    function gender_to_string($value) {
        if($value == '0') return 'Female';
    	else if($value == '1') return 'Male';
    	else return '';
    }

    function status_2_string($value) {
        if($value == '0') return 'Not publish';
    	else if($value == '1') return 'Publish';
        else if($value == '2') return 'Draft';
    	else return '';   
    }

    function cafeshop_categories($cafeshop_id, $delimit = '<br />') {
        $CI =& get_instance();
        $CI->load->model('cafeshops_model', 'cafeshops_model', true);
        $categories = $CI->cafeshops_model->get_categories_by_cafeshop_id($cafeshop_id);
        $res = '';
        $i = 0;
        foreach($categories as $c) {
            $res .= $c['name'];
            if(++$i < count($categories)) {
                $res .= $delimit;
            }
        }
        return $res;
    }

    function object_2_array($data) {
    	if(is_array($data) || is_object($data)) {
    		$result = array(); 
    		foreach ($data as $key => $value) { 
    			$result[$key] = object_2_array($value); 
    		}
    		return $result;
    	}
    	return $data;
    }
   
    function categories_dropdown($type, $cid = '', $html = '') {
    	$CI =& get_instance();
        
        $CI->load->model('categories_model', 'categories_model', true);
        $result = $CI->categories_model->search(array('type' => $type, 'order_by' => 'name', 'order_direction' => 'ASC', 'start' => 0, 'perpage' => 1000));
        $categories = $result['records'];
    	
    	$sel = "<select $html>";
    	$sel .= "<option value='-1'>&nbsp;</option>";
    	
    	foreach($categories as $k => $v) {
    		if($cid != '' && $cid == $v['id']) $sel .= "<option value='" . $v['id'] . "' selected='selected'>" . $v['name'] . "</option>";
    		else $sel .= "<option value='" . $v['id'] . "'>" . $v['name'] . "</option>";
    	}
    	$sel .= "</select>";
    	return $sel;
    }
    
    function manufacturers_dropdown($cid = '', $html = '') {
    	$CI =& get_instance();
        
        $CI->load->model('manufacturers_model', 'manufacturers_model', true);
    	$result = $CI->manufacturers_model->search(array('order_by' => 'name', 'order_direction' => 'ACS'));
        $manufacturers = $result['records'];
    	
    	$sel = "<select $html>";
    	$sel .= "<option value='-1'>&nbsp;</option>";
    	
    	foreach($manufacturers as $k => $v) {
    		if($cid != '' && $cid == $v['id']) $sel .= "<option value='" . $v['id'] . "' selected='selected'>" . $v['name'] . "</option>";
    		else $sel .= "<option value='" . $v['id'] . "'>" . $v['name'] . "</option>";
    	}
    	$sel .= "</select>";
    	return $sel;
    }
    
    function provinces_dropdown($cid = '', $html = '') {
    	$CI =& get_instance();
        
        $CI->load->model('provinces_model', 'provinces_model', true);
    	$result = $CI->provinces_model->search(array('order_by' => 'name', 'order_direction' => 'ACS'));
        $provinces = $result['records'];
    	
    	$sel = "<select $html>";
    	$sel .= "<option value='-1'>&nbsp;</option>";
    	
    	foreach($provinces as $k => $v) {
    		if($cid != '' && $cid == $v['id']) $sel .= "<option value='" . $v['id'] . "' selected='selected'>" . $v['name'] . "</option>";
    		else $sel .= "<option value='" . $v['id'] . "'>" . $v['name'] . "</option>";
    	}
    	$sel .= "</select>";
    	return $sel;
    }
    
    function districts_dropdown($cid = '', $html = '', $province_id = '') {   	
    	$sel = "<select $html>";
    	$sel .= "<option value='-1'>&nbsp;</option>";
    	
    	if($cid != '' || $province_id != '') {
            $CI =& get_instance();
        
            $CI->load->model('districts_model', 'districts_model', true);
        	$result = $CI->districts_model->search(array('province_id' => $province_id, 'order_by' => 'name', 'order_direction' => 'ACS'));
            $districts = $result['records'];
        	foreach($districts as $k => $v) {
        		if($cid != '' && $cid == $v['id']) $sel .= "<option value='" . $v['id'] . "' selected='selected'>" . $v['name'] . "</option>";
        		else $sel .= "<option value='" . $v['id'] . "'>" . $v['name'] . "</option>";
        	}
        }
        
    	$sel .= "</select>";
    	return $sel;
    }
    
    function generate_populate_districts_js($districts_dropdown_id = 'district_id') {
        $CI =& get_instance();
        
        $CI->load->model('provinces_model', 'provinces_model', true);
        $CI->load->model('districts_model', 'districts_model', true);
        
    	$provinces = $CI->provinces_model->search(array('order_by' => 'name', 'order_direction' => 'ACS'));
        $provinces = $provinces['records'];
    	
    	
        $js = "<script type=\"text/javascript\">\n";
        $js .= "function populate_districts(province_id) {\n
				var dictrict_id = document.getElementById('$districts_dropdown_id');\n
				if(!dictrict_id){ return; }\n";
        $js .= "var provinces = new Array();\n";
            
            foreach($provinces as $p) {
                $districts = $CI->districts_model->search(array('province_id' => $p['id'], 'order_by' => 'name', 'order_direction' => 'ACS'));
                $districts = $districts['records'];
                $dis_arr = array();
                foreach($districts as $d) {
                    $dis_arr[] = "'" . $d['id'] . '#' . $d['name'] . "'";
                }
                            
                $js .= "provinces['" . $p['id'] . "'] = [" . implode(', ', $dis_arr) . "]\n";
        	}

		$js .= "dictrict_id.options.length = 0;\n
    			cur = provinces[province_id.options[province_id.selectedIndex].value];\n
    			if(!cur){return;}\n

    			dictrict_id.options.length = cur.length + 1;\n
				dictrict_id.options[0].text = '';\n
				dictrict_id.options[0].value = -1;\n

    			for(var i = 1; i <= cur.length; i++) {\n
                    var pair = cur[i].split('#');\n
    				dictrict_id.options[i].text = pair[1];\n
    				dictrict_id.options[i].value = pair[0];\n
    			}\n
    		}\n
        </script>\n";

    	return $js;
    }
    
    function open_time_dropdown($cid = '', $html = '', $period = '') {
    	$am = array(
            '1' => '06:00',
            '2' => '06:30',
            '3' => '07:00',
            '4' => '07:30',
            '5' => '08:00',
            '6' => '08:30',
            '7' => '09:00',
            '8' => '09:30',
            '9' => '10:00',
            '10' => '10:30',
            '11' => '11:00',
            '12' => '11:30'
        );
        
        $pm = array(
            '13' => '12:00',
            '14' => '12:30',
            '15' => '13:00',
            '16' => '13:30',
            '17' => '14:00',
            '18' => '14:30',
            '19' => '15:00',
            '20' => '15:30',
            '21' => '16:00',
            '22' => '16:30',
            '23' => '17:00',
            '24' => '17:30',
            '25' => '18:00',
            '26' => '18:30',
            '27' => '19:00',
            '28' => '19:30',
            '29' => '20:00',
            '30' => '20:30',
            '31' => '21:00',
            '32' => '21:30',
            '33' => '22:00',
            '34' => '22:30',
            '35' => '23:00',
            '36' => '23:30',
            '37' => '24:00'
        );
    	if($period == 'AM') {
            $options = $am;
        }
        else if($period == 'PM') {
            $options = $pm;
        }
        else {
    	    $options = array_merge($am, $pm);
        }
        
    	
    	$sel = "<select $html>";
    	$sel .= "<option value='-1'>&nbsp;</option>";
    	
    	foreach($options as $k => $v) {
    		if($cid != '' && $cid == $k) $sel .= "<option value='" . $k . "' selected='selected'>" . $v . "</option>";
    		else $sel .= "<option value='" . $k . "'>" . $v . "</option>";
    	}
    	$sel .= "</select>";
    	return $sel;
    }
    
    function show_open_time($index) {
    	$options = array(
            '1' => '06:00',
            '2' => '06:30',
            '3' => '07:00',
            '4' => '07:30',
            '5' => '08:00',
            '6' => '08:30',
            '7' => '09:00',
            '8' => '09:30',
            '9' => '10:00',
            '10' => '10:30',
            '11' => '11:00',
            '12' => '11:30',
            '13' => '12:00',
            '14' => '12:30',
            '15' => '13:00',
            '16' => '13:30',
            '17' => '14:00',
            '18' => '14:30',
            '19' => '15:00',
            '20' => '15:30',
            '21' => '16:00',
            '22' => '16:30',
            '23' => '17:00',
            '24' => '17:30',
            '25' => '18:00',
            '26' => '18:30',
            '27' => '19:00',
            '28' => '19:30',
            '29' => '20:00',
            '30' => '20:30',
            '31' => '21:00',
            '32' => '21:30',
            '33' => '22:00',
            '34' => '22:30',
            '35' => '23:00',
            '36' => '23:30',
            '37' => '24:00'
        );
        
    	return $options[$index];
    }
    
    function category_types_dropdown($cid = '', $html = '') {
    	$CI =& get_instance();

    	$sel = "<select $html>";
    	$sel .= "<option value='-1'>&nbsp;</option>";
        
        $CI =& get_instance();
        $CI->load->config('settings');
        $category_types = $CI->config->item('category_types');
        $enabled_category_types = array();

        foreach($category_types as $type => $enabled) {
            if($enabled) {
                $enabled_category_types[] = $type;
            }
        }
            	
    	foreach($enabled_category_types as $t) {
    		if($cid != '' && $cid == $t) $sel .= "<option value='" . $t . "' selected='selected'>" . $t . "</option>";
    		else $sel .= "<option value='" . $t . "'>" . $t . "</option>";
    	}
    	$sel .= "</select>";
    	return $sel;
    }
    
    function news_sources_dropdown($cid = '', $html = '') {
    	$CI =& get_instance();
        
        $CI->load->config('news');

        $rss_sources = $CI->config->item('rss_sources');
    	
    	$sel = "<select $html>";
    	$sel .= "<option value='-1'>&nbsp;</option>";
    	
    	foreach($rss_sources as $s) {
    		if($cid != '' && $cid == $s['source']) $sel .= "<option value='" . $s['source'] . "' selected='selected'>" . $s['source'] . "</option>";
    		else $sel .= "<option value='" . $s['source'] . "'>" . $s['source'] . "</option>";
    	}
    	$sel .= "</select>";
    	return $sel;
    }

    function get_feed($url, $limit = 0) {
        $CI =& get_instance();
        $CI->load->library('simplepie');
        $CI->simplepie->set_feed_url($url);
        $CI->simplepie->enable_cache(false);
        $CI->simplepie->init();
        if($limit > 0) {
            return $CI->simplepie->get_items(0, $limit);
        }
        else {
            return $CI->simplepie->get_items();
        }    
    }
    
    function clean_html($str) {
        if(strpos($str, '</nobr>') != false) {
            $image = strip_tags($str, '<img>');
    		preg_match_all('<img[^<>]+>', $image, $images);
    		
    		if(count($images) >0 && $images[0][0] != '') {
    			$image = '<' . $images[0][0] . '>';
    			if($image == '<img alt="" height="1" width="1">') {
    				$image = "";
    			}
    		}
            else {
    			$image = '';
    		}
            
            $str = strip_tags($str, '<p><a><br/><nobr>');
    		$arr_temp = explode("</nobr>", $str);
    		$str = $arr_temp[1];
    		$arr_temp = explode('<a', $str);
    		$str = $arr_temp[0];
    		return $image . $str . '<br clear="all" />';    
        }
		return $str;
    }
    
	function build_address($province, $district, $ward, $street) {
		$arr = array($street, $ward ? "Phường $ward" : '', $district ? "Quận $district" : '', $province);
		return implode(', ', $arr);
	}

    function build_sql_strip_disallowed_characters($field_name) {
        $arr['\\\'s'] = '';    
        $arr['\\\''] = '';    
        $arr[':'] = '';
        $arr['?'] = '';
        $arr['!'] = '';
        $arr[','] = '';
        $arr['.'] = '';
        $arr['~'] = '';
        $arr['%'] = '';
        $arr['^'] = '';
        $arr['+'] = '';
        $arr[' '] = '-';
        $arr['('] = '';
        $arr[')'] = '';
        
        $res = "LOWER($field_name)";
        foreach($arr as $k => $v) {
            $res = "REPLACE($res, '$k', '$v')";
        }
        return $res;
    }
    
    function real_title($title) {        
        $pattern = '/\s(\(.*?\)|- .*?)$/';
        return preg_replace($pattern, '', $title);
    }
    
    function strip_disallowed_characters($str) {
        $pattern = '/[a-z A-Z 0-9]/';
        preg_match_all($pattern, str_replace("'s", '', trim(strtolower($str))), $matches);
        
        $str = str_replace(' ', '-', implode('', $matches[0]));
        return $str;
    }
    
    function build_rating($objid, $type, $number_rate, $total_value) {
        $ul = "<ul id='rating_" . $objid . '_' . $type . "' class='star-rating'>" . build_current_rating($number_rate, $total_value);
        $CI =& get_instance();
        if($CI->session->userdata("memberID") != '' & (!isset($_COOKIE['rating_' . $objid . '_' . $type]) || $_COOKIE['rating_' . $objid . '_' . $type] != 'disabled')) {
                $ul .= "<li><a href='javascript: void(0)' onclick=\"javascript: Rating.rate('" . site_url('rating/rate') . "', " . $objid . ", '$type', 1, " . $CI->session->userdata("memberID") . ")\" title='1 star out of 5' class='one-star'>1</a></li>
                    	<li><a href='javascript: void(0)' onclick=\"javascript: Rating.rate('" . site_url('rating/rate') . "', " . $objid . ", '$type', 2, " . $CI->session->userdata("memberID") . ")\" title='2 stars out of 5' class='two-stars'>2</a></li>
                    	<li><a href='javascript: void(0)' onclick=\"javascript: Rating.rate('" . site_url('rating/rate') . "', " . $objid . ", '$type', 3, " . $CI->session->userdata("memberID") . ")\" title='3 stars out of 5' class='three-stars'>3</a></li>
                    	<li><a href='javascript: void(0)' onclick=\"javascript: Rating.rate('" . site_url('rating/rate') . "', " . $objid . ", '$type', 4, " . $CI->session->userdata("memberID") . ")\" title='4 stars out of 5' class='four-stars'>4</a></li>
                    	<li><a href='javascript: void(0)' onclick=\"javascript: Rating.rate('" . site_url('rating/rate') . "', " . $objid . ", '$type', 5, " . $CI->session->userdata("memberID") . ")\" title='5 stars out of 5' class='five-stars'>5</a></li>";
        }
        $ul .= "</ul>";
        return $ul;
    }
    
    function build_current_rating($number_rate, $total_value) {
        $current_rating = 0;
        if($number_rate != '' && $total_value != '')
            $current_rating = round($total_value / $number_rate, 1);
        return "<li class='current-rating' style='width:" . ceil($current_rating * 30) . "px;'>" . ($current_rating ? $current_rating . '/5' : '') . "</li>";
    }
    
    
    /*
    * Excel library for Code Igniter applications
    * Author: Derek Allard, Dark Horse Consulting, www.darkhorse.to, April 2006
    */
    /*
    function to_excel($res_array, $filename='exceloutput') {
         $headers = '';
         $data = '';
         
         $obj =& get_instance();
         
         if (count($res_array) == 0) {
              echo '<p>The table appears to have no data.</p>';
         } else {
              foreach (array_keys($res_array[0]) as $fn) {
                 $headers .= $fn . "\t";
              }
         
              foreach ($res_array as $row) {
                   $line = '';
                   foreach($row as $value) {                                            
                        if ((!isset($value)) OR ($value == "")) {
                             $value = "\t";
                        } else {
                             $value = str_replace('"', '""', $value);
                             $value = '"' . $value . '"' . "\t";
                        }
                        $line .= $value;
                   }
                   $data .= trim($line)."\n";
              }
              
              $data = str_replace("\r","",$data);
     
              header("Content-type: application/x-msdownload");
              header("Content-Disposition: attachment; filename=$filename.xls");
              echo "$headers\n$data";  
         }
    }*/
  
    /*  
    function to_excel($res_array, $filename='exceloutput') {
        $CI =& get_instance();
        $CI->load->library('excelexport');
        
        if (count($res_array) == 0) {
              echo '<p>The table appears to have no data.</p>';
        }
        else {
            $CI->excelexport->addRow(array_keys($res_array[0]));
            
            foreach ($res_array as $row) {
                $ar = array();
                foreach($row as $i) {
                    $ar[] = addslashes($i);
                }
                $CI->excelexport->addRow(array_values($ar));
            }
        }
        
        $CI->excelexport->download("$filename.xls");
    }
    */
    
    function to_excel($res_array, $filename='exceloutput') {
        if (count($res_array) == 0) {
              echo '<p>The table appears to have no data.</p>';
        }
        else {
            $data = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
                   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                   <html>
                        <head>
                    	    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
                            <style id="Classeur1_16681_Styles"></style>
                        </head>
                        <body>
                            <div id="Classeur1_16681" align=center x:publishsource="Excel">
                                <table x:str border=0 cellpadding=0 cellspacing=0 width=100% style="border-collapse: collapse">';
            $data .= '<tr>';
            foreach(array_keys($res_array[0]) as $fn) {
                $data .= '<td class=xl2216681 nowrap><b>' . htmlspecialchars(stripslashes($fn)) . '</b></td>';
            }
            $data .= '</tr>';
            
            foreach ($res_array as $row) {
                $data .= '<tr>';
                foreach($row as $value) {
                    $data .= '<td class=xl2216681 nowrap>' . htmlspecialchars($value) . '</td>';
                }
                $data .= '</tr>';
            }
        
        $data .=               '</table>
                            </div>
                        </body>
                    </html>'; 
        
        header("Content-type: application/x-msdownload");
        header("Content-Disposition: attachment; filename=$filename.xls");
        echo "$headers\n$data"; 
        }
    }
    
    function extract_xml_text($tag, $xml) {
         preg_match_all("/\<$tag\>(.*?)\<\/$tag\>/s", $xml, $arr );
         return $arr[1][0];
    }
    
    function get_news_image_upload_config() {
        $config['upload_path'] = './uploads/news/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '100';
		$config['max_height']  = '70';
        $config['encrypt_name']  = TRUE;

        return $config;   
    }
    
    function get_cafeshop_image_upload_config() {
        $config['upload_path'] = './uploads/cafeshop/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '145';
		$config['max_height']  = '110';
        $config['encrypt_name']  = TRUE;

        return $config;   
    }
    
    function get_item_image_gallery_upload_config() {
        $config['upload_path'] = './uploads/item_image_gallery/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '460';
		$config['max_height']  = '345';
        $config['encrypt_name']  = TRUE;

        return $config;   
    }
    
    function current_controller($default) {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace(array('http://', '/index.php'), array('', ''), $uri);
        
        $arr = split('/', $uri);
        if(isset($arr[1])) {
            return $arr[1];
        }
        return $default;
    }
    
    function detect_local_controller($uri, $default) {
        if(strpos($uri, site_url()) == 0) {
            $uri = str_replace(array('http://', '/index.php'), array('', ''), $uri);
            $arr = split('/', $uri);

            if(isset($arr[1])) {
                return $arr[1];
            }
            return $default;
        }
        return '';
    }
    
    function send_mail($sender, $receivers, $subject, $body) {
        $CI =& get_instance();
        $CI->load->model('settings_model', 'settings_model', true);
        
        $setting = $CI->settings_model->get();
        if(null != $setting) {
            $CI->load->plugin('phpmailer');
        	$phpmailer = new PHPMailer();

        	$phpmailer->IsSMTP();
            $phpmailer->IsHTML(true);
            $phpmailer->SMTPAuth = $setting['smtp_auth'] == 1 ? true : false;
            $phpmailer->Mailer   = "smtp";
        	$phpmailer->Host     = $setting['smtp_host'];
        	$phpmailer->Password = $setting['smtp_password'];
        	$phpmailer->Username = $setting['smtp_user'];
        	$phpmailer->CharSet  = $setting['charset'];
        	$phpmailer->WordWrap = $setting['wordwrap']; 
        	
        	if($sender == false) {
                $sender_name = $setting['sender_name'];
                $sender_email = $setting['sender_email'];
            }
            else {
                $sender_name = $sender['name'];
                $sender_email = $sender['email'];
            }
        	$phpmailer->From     = $sender_email;
        	$phpmailer->FromName = $sender_name;
        	
        	if(isset($receivers['email']) && isset($receivers['name'])) {
                $phpmailer->AddAddress($receivers['email'], $receivers['name']);    
            }
            else {
                foreach($receivers as $r) {
                    if(isset($r['email']) && isset($r['name'])) {
                        $phpmailer->AddAddress($r['email'], $r['name']);
                    }
                }
            }
        	
        	$phpmailer->Subject =  $subject;
        	$phpmailer->Body    =  $body;

        	if(!$phpmailer->Send()) {
        	   echo "Message was not sent <br>";
        	   echo "Mailer Error: " . $phpmailer->ErrorInfo;
        	}
        }
        else {
            echo 'Please config email';
        }
    }
    
    function generate_bread_crumb($links, $current) {
        if($links && $current) {
            $CI =& get_instance();
            return $CI->layout->dumpPage('bread_crumb/index', array('links' => $links, 'current' => $current));
        }
        return '';
    }
    
    function get_provinces_and_districts_and_number_of_items($limit = false) {
        $CI =& get_instance();
        $CI->load->model('provinces_model', 'provinces_model', true);
        $CI->load->model('districts_model', 'districts_model', true);
        $provinces = $CI->provinces_model->get_provinces_and_number_of_items($limit);
        foreach($provinces as &$p) {
            $p['districts'] = $CI->districts_model->get_districts_and_number_of_items($p['id']);
        }
        return $provinces;
    }
    
    function strip_sign($str) {
        $sign = array(  "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
                        "ằ","ắ","ặ","ẳ","ẵ",
                        "è","é","ẹ","ẻ","ẽ","ê","ề" ,"ế","ệ","ể","ễ",
                        "ì","í","ị","ỉ","ĩ",
                        "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
                        ,"ờ","ớ","ợ","ở","ỡ",
                        "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
                        "ỳ","ý","ỵ","ỷ","ỹ",
                        "đ",
                        "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
                        ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
                        "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
                        "Ì","Í","Ị","Ỉ","Ĩ",
                        "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
                        ,"Ờ","Ớ","Ợ","Ở","Ỡ",
                        "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
                        "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
                        "Đ","ê","ù","à");

        $unsign = array("a","a","a","a","a","a","a","a","a","a","a"
                        ,"a","a","a","a","a","a",
                        "e","e","e","e","e","e","e","e","e","e","e",
                        "i","i","i","i","i",
                        "o","o","o","o","o","o","o","o","o","o","o","o"
                        ,"o","o","o","o","o",
                        "u","u","u","u","u","u","u","u","u","u","u",
                        "y","y","y","y","y",
                        "d",
                        "A","A","A","A","A","A","A","A","A","A","A","A"
                        ,"A","A","A","A","A",
                        "E","E","E","E","E","E","E","E","E","E","E",
                        "I","I","I","I","I",
                        "O","O","O","O","O","O","O","O","O","O","O","O"
                        ,"O","O","O","O","O",
                        "U","U","U","U","U","U","U","U","U","U","U",
                        "Y","Y","Y","Y","Y",
                        "D","e","u","a");
    
        return str_replace($sign, $unsign, $str);
    }

    function to_alias($str) {
        return str_replace(' ', '-', strip_sign(trim(strtolower($str))));
    }

    function extract_internal_links_from_url($url) {
        $original_file = @file_get_contents($url);
        if(!$original_file) die("Error loading {$url}");

        $path_info = parse_url($url);
        $base = $path_info['scheme'] . "://" . $path_info['host'];

        $stripped_file = strip_tags($original_file, "<a>");
        
        $fixed_file = preg_replace("/<a([^>]*)href=\"\//is", "<a$1href=\"{$base}/", $stripped_file);
        $fixed_file = preg_replace("/<a([^>]*)href=\"\?/is", "<a$1href=\"{$url}/?", $fixed_file);
        preg_match_all("/<a(?:[^>]*)href=\"([^\"]*)\"(?:[^>]*)>(?:[^<]*)<\/a>/is", $fixed_file, $matches);

        return $matches[0];
    }
    
    function extract_anchor($anchor) {
        $regex_pattern = "/<a(?:[^>]*)href=\"([^\"]*)\"(?:[^>]*)>(.*)<\/a>/is";
        preg_match_all($regex_pattern, $anchor, $matches);
        
        return array('href' => $matches[1][0], 'name' => $matches[2][0]);
    }
    
    function get_redirect_url($url){
    	$redirect_url = null; 
     
    	$url_parts = @parse_url($url);
    	if(!$url_parts) return false;
    	if(!isset($url_parts['host'])) return false; //can't process relative URLs
    	if(!isset($url_parts['path'])) $url_parts['path'] = '/';
     
    	$sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : 80), $errno, $errstr, 30);
    	if(!$sock) return false;
     
    	$request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n"; 
    	$request .= 'Host: ' . $url_parts['host'] . "\r\n"; 
    	$request .= "Connection: Close\r\n\r\n"; 
    	fwrite($sock, $request);
    	$response = '';
    	while(!feof($sock)) $response .= fread($sock, 8192);
    	fclose($sock);
     
    	if(preg_match('/^Location: (.+?)$/m', $response, $matches)){
    		return trim($matches[1]);
    	}
        else {
    		return false;
    	}
    }
    
    function jobcategories_dropdown($cid = '', $html = '', $is_root = true) {
    	$CI =& get_instance();
        
        $CI->load->model('jobcategories_model', 'jobcategories_model', true);
        $result = $CI->jobcategories_model->search(array('order_by' => 'name', 'order_direction' => 'ASC'), $is_root ? ' AND parent_id = 0' : ' AND parent_id <> 0');
        $categories = $result['records'];
    	
    	$sel = "<select $html>";
    	$sel .= "<option value='-1'>&nbsp;</option>";
    	
    	foreach($categories as $k => $v) {
    		if($cid != '' && $cid == $v['id']) $sel .= "<option value='" . $v['id'] . "' selected='selected'>" . $v['name'] . "</option>";
    		else $sel .= "<option value='" . $v['id'] . "'>" . $v['name'] . "</option>";
    	}
    	$sel .= "</select>";
    	return $sel;
    }
?>