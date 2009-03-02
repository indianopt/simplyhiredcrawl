<?php
/**
 * MY_Input: an extension to Code Igniter's input class, allowing read of $_GET and other superglobals
 * 
 * @author Andrew Champion
 * @version 0.9
 */

class MY_Input extends CI_Input {
	function MY_Input()
	{
		parent::CI_Input();
	}
	
	/**
	 * Retrieve $_GET data
	 *
	 * @access public
	 * @param  string $index
	 * @param  bool   $xss_clean Cross-site scripting filter (default: false)
	 * @return mixed The form field value
	 */
	function get($index, $xss_clean = false)
	{
		$result = (isset($_GET[$index])) ? $this->_gpc($_GET[$index], $xss_clean) : false;
		return $result;
	}
	
	function get_list()
	{
		$data = $this->_multi(func_get_args());
		
		foreach ($data['args'] as $arg)
		{
			$result[$arg] = $this->get($arg, $data['xss_clean']);
		}
	
		return $result;
	}
	
	/**
	 * Retrieve $_POST data
	 *
	 * @access public
	 * @param  string $index
	 * @param  bool   $xss_clean Cross-site scripting filter (default: false)
	 * @return mixed The form field value
	 */
	function post($index, $xss_clean = false)
	{
		$result = (isset($_POST[$index])) ? $this->_gpc($_POST[$index], $xss_clean) : false;
		return $result;
	}
	
	function post_list()
	{
		$data = $this->_multi(func_get_args());
		
		foreach ($data['args'] as $arg)
		{
			$result[$arg] = $this->post($arg, $data['xss_clean']);
		}
	
		return $result;
	}

	/**
	 * Retrieve $_COOKIE data
	 *
	 * @access public
	 * @param  string $index
	 * @param  bool   $xss_clean Cross-site scripting filter (default: false)
	 * @return mixed The form field value
	 */
	function cookie($index, $xss_clean = false)
	{
		$result = (isset($_COOKIE[$index])) ? $this->_gpc($_COOKIE[$index], $xss_clean) : false;
		return $result;
	}

	function cookie_list()
	{
		$data = $this->_multi(func_get_args());
		
		foreach ($data['args'] as $arg)
		{
			$result[$arg] = $this->cookie($arg, $data['xss_clean']);
		}
	
		return $result;
	}
	
	/**
	 * Retrieve $_REQUEST data -- considered harmful
	 *
	 * @access public
	 * @param  string $index
	 * @param  bool   $xss_clean Cross-site scripting filter (default: false)
	 * @return mixed The form field value
	 */
	function request($index, $xss_clean = false)
	{
		$result = (isset($_REQUEST[$index])) ? $this->_gpc($_REQUEST[$index], $xss_clean) : false;
		return $result;
	}

	function request_list()
	{
		$data = $this->_multi(func_get_args());
		
		foreach ($data['args'] as $arg)
		{
			$result[$arg] = $this->request($arg, $data['xss_clean']);
		}
	
		return $result;
	}

	// hey, since we're at it...
	/**
	 * Retrieve $_SESSION data -- why the hell not?
	 *
	 * @access public
	 * @param  string $index
	 * @param  bool   $xss_clean Cross-site scripting filter (default: false)
	 * @return mixed The form field value
	 */
	function session($index, $xss_clean = false)
	{
		$result = (isset($_SESSION[$index])) ? $this->_gpc($_SESSION[$index], $xss_clean) : false;
		return $result;
	}

	function session_list()
	{
		$data = $this->_multi(func_get_args());
		
		foreach ($data['args'] as $arg)
		{
			$result[$arg] = $this->session($arg, $data['xss_clean']);
		}
	
		return $result;
	}
	
	/**
	 * Retrieve $_SERVER data
	 *
	 * @access public
	 * @param  string $index
	 * @param  bool   $xss_clean Cross-site scripting filter (default: false)
	 * @return mixed The form field value
	 */
	function server($index, $xss_clean = false)
	{
		$result = (isset($_SERVER[$index])) ? $this->_gpc($_SERVER[$index], $xss_clean) : false;
		return $result;
	}

	function server_list()
	{
		$data = $this->_multi(func_get_args());
		
		foreach ($data['args'] as $arg)
		{
			$result[$arg] = $this->server($arg, $data['xss_clean']);
		}
	
		return $result;
	}
	
	
	/**
	 * Retrieve GET/POST/COOKIE/SESSION/REQUEST data
	 * 
	 * @access private
	 * @param string $super Name of superglobal
	 * @param string $index Key in superglobal
	 * @return mixed A string/array containing the value, or FALSE if not set
	 */
	
	function _gpc($value, $xss_clean)
	{
		$gpc = $value;
		$is_arr = is_array($gpc);
		
		// Cross-site scripting filter
		if ($xss_clean === true)
		{
			if ($is_arr === true)
			{
				foreach($value as $key => $val)
				{					
					$gpc[$key] = $this->xss_clean($val);
				}
			}
			else {
				$gpc = $this->xss_clean($value);
			}					
		}
		
		// strip slashes if necessary (magic quotes are a misfeature, anyway)
		if (get_magic_quotes_gpc())
		{
			if ($is_arr === true)
			{
				foreach ($value as $key => $val)
				{
					$gpc[$key] = stripslashes($gpc[$key]);
				}
			}
			else
			{
				$gpc = stripslashes($value);
			}
		}
		
		return $gpc;
	}
	
	/**
	 * Parses the variable argument list for multi-superglobal fetches
	 * 
	 * @access private
	 * @param  array $arg The variable argument list
	 * @return array Returns associative array with bool 'xss_clean', and 'args', a multi-dimensional array of arguments
	 *
	 */
	function _multi($arg)
	{
		$multi['xss_clean'] = end($arg);
		if ($multi['xss_clean'] === true || $multi['xss_clean'] === false)
		{
			// The var is a *boolean* TRUE/FALSE
			array_pop($arg);
		}
		else
		{
			// not a boolean, use default
			$multi['xss_clean'] = false;
		}
		
		
		if (is_array($arg[0]))
		{
			// user passed the list as an array
			$multi['args'] = $arg[0];
		}
		else if (strpos($arg[0], ','))
		{
			$multi['args'] = explode(',', $arg[0]);
		}
		else {
			while ($val = array_shift($arg))
			{
				$multi['args'][] = $val;
			}			
		}

		
		return $multi;
	}
}
?>