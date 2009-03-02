<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ContentManager
{
	var $CI;

	function ContentManager()
	{
		$this->CI =& get_instance();
	}

	/**
	 * Create a user account
	 *
	 * @access	public
	 * @return	object array
	 */
	function getLeftContents() 
	{
		$this->CI->load->model("contents_model","contents",true);
		return $this->CI->contents->getLeftContents();	
	}

	/**
	 * Create a user account
	 *
	 * @access	public
	 * @return	object array
	 */
	function getMainMenu($outputType = 'list') 
	{
		$this->CI->load->model("contents_model","contents",true);
		return $this->CI->contents->getLeftContents();	
	}
	
	function getFooterMenu()
	{
	}
}
?>