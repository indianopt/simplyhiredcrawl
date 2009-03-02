<?php
define('ROUTER_DEFAULT_METHOD', 'index');

class MY_Router extends CI_Router {
	var $trigger;

	function MY_Router()
	{
		parent::CI_Router();
	}

	function _set_route_mapping()
	{
		// Load the routes.php file.
		@include(APPPATH.'config/routes'.EXT);
		$this->routes = ( ! isset($route) OR ! is_array($route)) ? array() : $route;
		unset($route);

		// Set the default controller so we can display it in the event
		// the URI doesn't correlated to a valid controller.
		$this->default_controller = ( ! isset($this->routes['default_controller']) OR $this->routes['default_controller'] == '') ? FALSE : strtolower($this->routes['default_controller']);

		// Fetch the complete URI and query strings
		$this->trigger = $this->config->item('route_trigger');
		$this->uri_string = $this->_get_uri_string();
		$this->_parse_query_string();

		// If the URI contains only a slash we'll kill it
		if ($this->uri_string == '/')
		{
			$this->uri_string = '';
		}

		// Is there a URI string? If not, the default controller specified in the "routes" file will be shown.
		if ($this->uri_string == '')
		{
			if ($this->default_controller === FALSE)
			{
				show_error("Unable to determine what should be displayed. A default route has not been specified in the routing file.");
			}

			$this->set_class($this->default_controller);
			$this->set_method(ROUTER_DEFAULT_METHOD);

			log_message('debug', "No URI present. Default controller set.");
		}
		else {
			unset($this->routes['default_controller']);

			// Do we need to remove the suffix specified in the config file?
			if  ($this->config->item('url_suffix') != "")
			{
				$this->uri_string = preg_replace("|".preg_quote($this->config->item('url_suffix'))."$|", "", $this->uri_string);
			}

			// Explode the URI Segments. The individual segments will
			// be stored in the $this->segments array.
			foreach(explode("/", preg_replace("|/*(.+?)/*$|", "\\1", $this->uri_string)) as $val)
			{
				// Filter segments for security
                $val = trim($this->_filter_uri($val));
				if ($val != '')
				{
					$this->segments[] = $val;
				}
			}

			// Parse any custom routing that may exist
			$this->_parse_routes();

			// Re-index the segment array so that it starts with 1 rather than 0
			$this->_reindex_segments();
		}
	}

	/**
	 * Get the URI String
	 *
	 * @access	private
	 * @return	string
	 */
	function _get_uri_string()
	{
		$uri_string = '';

		if (strtoupper($this->config->item('uri_protocol')) == 'AUTO')
		{
			$uri_string = ($this->trigger) ? $this->_uri_via_query() : $this->_uri_via_pathinfo();
		}
		else
		{
			$uri = strtoupper($this->config->item('uri_protocol'));

			if ($uri == 'REQUEST_URI')
			{
				$uri_string = $this->_parse_request_uri();
			}
			else
			{
				$uri_string = (isset($_SERVER[$uri])) ? $_SERVER[$uri] : @getenv($uri);
			}
		}

		return $uri_string;
	}

	function _uri_via_query()
	{
		$uri_string = '';

		if (is_array($_GET))
		{
			$uri_string = $this->_uri_via_get();
		}
		else if (isset($_SERVER['QUERY_STRING']))
		{
			$data = explode('?', $_SERVER['QUERY_STRING']);
			array_pad($data, 2, '');

			$uri_string = $data[0];
			$_SERVER['QUERY_STRING'] = $data[1];
		}

		return $uri_string;
	}

	function _uri_via_get()
	{
		$uri_string = '';

		$param = array_keys($_GET);
		foreach ($param as $key)
		{
			if (substr($key, 0, 1) == '/')
			{
				$data = explode('?', $key);
				$uri_string = $data[0];

				if (count($data) > 1)
				{
					$_GET[$data[1]] = $_GET[$key];
					unset($_GET[$key]);
				}

				if (get_magic_quotes_gpc())
				{
					$uri_string = stripslashes($uri_string);
				}

				break;
			}
		}

		return $uri_string;
	}


	function _uri_via_pathinfo()
	{
		// Is there a PATH_INFO variable?
		// Note: some servers seem to have trouble with getenv() so we'll test it two ways
		$uri_string = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : @getenv('PATH_INFO');

		if ($uri_string == '' OR $uri_string == '/' . SELF)
		{
			// 2007-01-27 AC: removed query string check

			// No QUERY_STRING?... Maybe the ORIG_PATH_INFO variable exists?
			$uri_string = (isset($_SERVER['ORIG_PATH_INFO'])) ? $_SERVER['ORIG_PATH_INFO'] : @getenv('ORIG_PATH_INFO');

			if ($uri_string == '/' . SELF)
			{
				$uri_string = '';
			}
		}

		return $uri_string;
	}

	/**
	 * If using CI with query strings, this will parse out the segments and the actual query string to use.
	 *
	 * @access  private
	 * @return  void
	 *
	 */
	function _parse_query_string()
	{
		// guess the input array
		if (is_array($_GET))
		{
			$query = $_GET;
		}
		else if (isset($_SERVER['QUERY_STRING']))
		{
			$query = $this->_parse_server_query_string();
		}

		// rebuild $_GET array
		$_GET = array();
		foreach ($query as $key => $value)
		{
			// crush magic quotes with the input class, please.
			$_GET[$key] = $value;
		}
	}

	function _parse_server_query_string()
	{
		$parse = explode(ini_get('arg_separator.input'), $_SERVER['QUERY_STRING']);
		for ($i = 0; $i < count($parse); $i++)
		{
			$parse[$i] = urldecode($parse[$i]);
		}

		return $parse;
	}


	/**
	 * Compile Segments
	 *
	 * This function takes an array of URI segments as
	 * input, and puts it into the $this->segments array.
	 * It also sets the current class/method
	 *
	 * @access	private
	 * @param	array
	 * @param	bool
	 * @return	void
	 */
	function _compile_segments($segments = array())
	{
		parent::_compile_segments($segments);
		if (count($this->rsegments) < 2)
		{
			$this->rsegments[] = ROUTER_DEFAULT_METHOD;
		}
	}
}
?>