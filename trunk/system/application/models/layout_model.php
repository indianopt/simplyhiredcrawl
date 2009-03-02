<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Layout Model Class
 *
 * @package		YATS -- The Layout Library
 * @subpackage	Models
 * @category	Template
 * @author		Mario Mariani
 * @copyright	Copyright (c) 2006-2007, mariomariani.net All rights reserved.
 * @license		http://svn.mariomariani.net/yats/trunk/license.txt
 */
class Layout_model extends Model 
{
	var $common;
	var $theme;
	
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	function Layout_model() {
		parent::Model();
		$this->theme  = $this->config->config['layout']['views_folder'] . '/' . $this->config->config['layout']['views_content'] . '/' ;
		$this->common = $this->config->config['layout']['views_folder'] . '/' . $this->config->config['layout']['views_commons'] . '/' ;
	}
}

// EOF
?>