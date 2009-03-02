<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Validation extends CI_Validation
{

	var $_dataobject;

	

	/**
	 * Unique
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function unique($str)
	{
    return ( $this->_dataobject->is_unique($this->_current_field, $str) );
	}
	

	/**
	 * captcha
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function captcha($str)
	{
    return ( strtolower($_SESSION["captcha"]) == strtolower($str) );
	}

}

?>