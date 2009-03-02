<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Sparks 
 *
 * A caching template library for CodeIgniter
 *
 * @package     Sparks
 * @author      Alastair James
 * @copyright   Copyright (c) 2007 Purple Sage Labs
 * @link        http://www.purplesagelabs.com
 * @version		1.1
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Main Sparks library class
 *
 * Handles caching of the templates
 *
 * @package     com.purplesagelabs.sparks
 * @category    Libraries
 * @author      Alastair James
 */
class Sparks {

	var $CI;

    var $ttl;
    
    var $cache_group = '';
    var $cache_id = ''; 
    
    var $template_file = null;
    var $content_file = null;
    
    var $data = array();

    /**
     *  Constructer
     *  
     *  No options
     */
    function Sparks($params = NULL)
    {
     
		$this->CI =& get_instance();
   
        //
        //  Default cache_id is the URI of this page
        //
        $this->cache_id = $_SERVER['REQUEST_URI'];

        //
        //  You can set the default template file in the config file.
        //
        if (isset($params))
        {
            
            if (isset($params['template'])) $this->template_file = $params['template'];
            
        }

    }

    // ------------------------------------------------------------------------
    
	/**
	 * 	Insert a 'view fragment' into the page
	 * 
	 * 	@param 	string 	filename of view
	 * 	@param	array 	optional data to (additionally) import into the namespace
	 */
	function part($view, $data = array()){
		
	    $data = array_merge($this->data, $data);

		$this->CI->load->view($view, $data);
		
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * 	Convenience method for php4 users.
	 * 	$this->sparks->initialize($id, $group, 10);
	 * 	Is the same as:
	 * 	$this->sparks->id($id)->group($group)->ttl(10);
	 * 
	 * 	@param	string	Cache id
	 * 	@param	string 	Cache group
	 * 	@param	int		Time to live (seconds)
	 */
	
	function initialize($cache_id, $cache_group, $ttl)
	{
		
		$this->id($cache_id);
		$this->group($cache_group);
		$this->ttl($ttl);
		
	}
	
	// ------------------------------------------------------------------------

    /**
     *  Set cache_id of this page
     *
     *  @access public
     *  @param  mixed   Id of the current page.
     *  @return object  A pointer to $this for chaining
     */
    function id($cache_id)
    {
        
        $this->cache_id = $cache_id;
        
        return $this;
        
    }
    
    /**
     *  Set the cache_group of this page
     *  
     *  @access public
     *  @param  mixed   Group of the current page.
     *  @return object  A pointer to $this for chaining
     */
    function group($cache_group)
    {
        
        $this->cache_group = $cache_group;
        
        return $this;
        
    }
    
    /**
     *  Set the content file of this page (if using templates)
     *  
     *  @access public
     *  @param  string  Filename of content file (inside application/view)
     *  @return object  A pointer to $this for chaining
     */
    function content($content_file)
    {
        
        $this->content_file = $content_file;
        
        return $this;
        
    }
    
    /**
     *  Set the template file of this page (if using templates)
     *  
     *  @access public
     *  @param  string  Filename of template file (inside application/view)
     *  @return object  A pointer to $this for chaining
     */
    function template($template_file)
    {
        
        $this->template_file = $template_file;
        
        return $this;
        
    }
    
    /**
     *  Set the data for this page. Assigns by reference....
     *  Note that this will overwrite and previously set data
     *  
     *  @access public
     *  @param  mixed   An (associative) array of data.
     *  @return object  A pointer to $this for chaining
     */
    function data(&$data)
    {
        
        $this->data =& $data;
        
        return $this;
        
    }

    /**
     *  Set a single data item for this page. 
     *  
     *  @access public
     *  @param  mixed   The key value
     *  @param  mixed   The data.
     *  @return object  A pointer to $this for chaining
     */
    function set($key, $data = NULL)
    {
	
		if (is_array($key) && empty($data)) 
		{
		
			$this->data($key);
			
		} else {
		
			$this->data[$key] =& $data;
			
		}
        
        return $this;
        
    }

    /**
     *  Set the time to live of this page. Set before you check if the cached file exists.
     *  
     *  @access public
     *  @param  int     Time to live (seconds)
     *  @return object  A pointer to $this for chaining
     */
    function ttl($ttl)
    {
    
        $this->ttl = $ttl;
        
        return $this;
        
    }

    /**
     *  Checks to see if a current cache file for this page exists
     *  
     *  @access public
     *  @return boolean 
     */
    function is_cached()
    {
        
        $fname =  $this->_cache_file_name();
        
        if (!is_file($fname))
        {
            return false;
        }
     
		if ($this->ttl === null) return true;
   
        $time = filemtime($fname);
        
        if ($time <  ( time() - $this->ttl ))
        {
            
            return false;
            
        }
        
        return true;
        
    }
    
    
    /**
     *  Display the current cache file
     *  
     *  @access public
     *  @return object  A pointer to $this for chaining
     */
    function display()
    {
	
		$CI = $this->CI; // Compatibility with version 1.0
        
        extract($this->data, EXTR_SKIP);
        
        include($this->_cache_file_name());

        return $this;
        
    }

    /**
     *  Save this page to the cache
     *  
     *  @access public
     *  @return object  A pointer to $this for chaining
     */ 
    function store()
    {
                                
        $file = (empty($this->template_file)) ? $this->content_file : $this->template_file;                

		$CI =& get_instance();
        
        $buffer = $CI->load->view($file, $this->data, TRUE);
        
        $this->_write_to_cache($buffer);
        
        return $this;
        
    } 

    /**
     *  Clear all cache files in a cache group
     *  
     *  @access public
     *  @param  mixed   Cache group identifier
     *  @param  array   Array of cache_id's to clear (option, if not set clears all cache files).
     *  @return void
     */
    function clear_group($cache_group, $cache_ids = null)
    {
        
        if ($cache_ids != null)
        {
            
            $this->_clear_all_group($cache_group);
            
        }
        else
        {
            
            $this->_clear_group_ids($cache_group, $cache_ids);
            
        }
        
    }
    
    /**
     *  Clear cache files with given cache_group and array of cache_ids
     *  
     *  @access private
     *  @param  mixed   Cache group identifier
     *  @param  array   Array of cache_ids
     *  @return void
     */
    function _clear_group_ids($cache_group, $cache_ids)
    {
        
        if (!is_array($cache_ids)) $cache_ids = array($cache_ids);
        
        $dirname = BASEPATH.'cache/';
        
        $prefix = 'sparks.'.md5($cache_group).'.';
        
        foreach($cache_ids as $cache_id)
        {
            
            $fname = $dirname.$prefix.md5($cache_id).'.php';
            
            if (is_file($fname))
            {
                
                unlink($fname);
                
            }
            
        }
        
        
    }
    
    /**
     *  Clear all cache files with given cache_group
     *  
     *  @access private
     *  @param  mixed   Cache group identifier
     *  @return void
     */
    function _clear_all_group($cache_group)
    {
        
        $dirname = BASEPATH.'cache/';

        $dir = opendir($dirname);

        $prefix = 'sparks.'.md5($cache_group);

        while (false !== ($file = readdir($dir))) {

            if (substr($file, 0,34) === $prefix)
            {
                
                unlink($dirname.$file);
                
            }

        }

        closedir($dir);
        
    }

    /**
     *  Write a buffer string to the cache
     *  
     *  @access private
     *  @param  string  HTML / PHP to buffer
     *  @return void
     */ 
    function _write_to_cache(&$buffer)
    {
        
        //
        //  Re-write delayed PHP blocks 
        //
        $buffer = preg_replace('/\<\$\?/', '<?', $buffer);
        $buffer = preg_replace('/\?\$\>/', '?>', $buffer);
        
        //
        //  Hmmmm....
        //  Should memory_useage and elapsed_time refer to the stats of the cached page or generating from scratch?
        //  For efficency (for now) I will use the generating stats as this avoids preg_replace'ing on each view.
        //
        $buffer = preg_replace('/\{memory_usage\}/', "<?= ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB' ?>", $buffer);
        $buffer = preg_replace('/\{elapsed_time\}/', "<?= \$CI->benchmark->elapsed_time('total_execution_time_start', 'total_execution_time_end') ?>", $buffer);
        
        $fname = $this->_cache_file_name();
        
        $file = fopen($fname, 'w');
        
        flock($file, LOCK_EX);
        fwrite($file, $buffer);
        flock($file, LOCK_UN);
        
        fclose($file);
        
    }
    
    /**
     *  Return the cache filename for this page.
     *  
     *  @access private
     *  @return void
     */
    function _cache_file_name()
    {
        
        return BASEPATH.'cache/sparks.'.md5($this->cache_group).'.'.md5($this->cache_id).'.php';
        
    }

}

/**
 *  Include one template inside another
 *  
 *  @access public
 *  @param  string  Filename of view file
 * 	@param	array 	Optional data to (additionally) import into the namespace
 *  @return void
 */
function sparks_include($view, $data = array())
{
    
    $CI =& get_instance();
    
	$CI->sparks->part($view, $data);
    
}

/**
 *  Placeholder for content file in templates
 *  
 *  @access public
 *  @return void
 */
function sparks_content()
{
    
    $CI =& get_instance();

    if ($CI->sparks->content_file == null) return;
    
    $CI->sparks->part($CI->sparks->content_file);
    
}

?>