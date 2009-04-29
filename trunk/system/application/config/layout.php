<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Theme Settings
| -------------------------------------------------------------------
|  views_folder     = path to the default theme view files
|  views_commons = path to common elements folder inside view/theme
|  views_content = path to content elements folder inside view/theme
|  assets_folder = path to the assets folder 
|  assets_design = path to the default theme assets
|  assets_shared = path to a shared assets folder
|  assets_styles = path to css folder inside assets
|  assets_images = path to images folder inside assets
|  assets_script = path to javascript folder inside assets
| -------------------------------------------------------------------
*/
$config['views_folder']  = "simple";
$config['views_commons'] = "common";
$config['views_content'] = "content";
$config['assets_folder'] = "assets";
$config['assets_design'] = "simple";
$config['assets_shared'] = "shared";
$config['assets_styles'] = "css";
$config['assets_images'] = "images";
$config['assets_script'] = "script";

/*
| -------------------------------------------------------------------
|  Layout Elements
| -------------------------------------------------------------------
|  layout_model    = common elements model name
|  layout_elements = references all functions in this model so the 
|                    library can automatically call each one of them. 
|                    Don't forget to write them in 'layout_model' ;-)
|  					 prototype: array("function" => "parameter", ...);
|			  		 where function is the funcion name and parameter
|					 is a single value or an array of values to send 
|					 to that function. 
| -------------------------------------------------------------------
*/
$config['layout_model']    = "layout_model";
$config['layout_elements'] = array(
								);

/*
| -------------------------------------------------------------------
|  Application Properties
| -------------------------------------------------------------------
|  Here you can come up with any setting you find necessary. Bellow
|  we can see some of the usual suspects for a website.
|
|  Note: in order to work all properties must have the 'app_' prefix.
| -------------------------------------------------------------------
*/

$config['app_title']	   = "QuickJobHunt.com";
$config['app_keywords']    = "";
$config['app_description'] = "";
$config['app_copyright']   = "(c) 2008 Dang Ngoc Giao All Rights Reserved.";
$config['app_author']   = "Dang Ngoc Giao at giaodn@gmail.com.";

/* End of file layout.php */
/* Location: ./system/application/config/layout.php */