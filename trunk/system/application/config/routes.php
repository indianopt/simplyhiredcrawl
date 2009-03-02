<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| 	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved 
| routes must come before any wildcard or regular expression routes.
|
*/

$route['default_controller'] = "home";
//$route['default_controller'] = "underconstruction";
//$route['default_controller'] = "vplshovu";
$route['scaffolding_trigger'] = "";

$route['adminpanel'] = "adminpanel/home";

$route['page/([a-z A-Z _-]+)'] = "page/index/$1";

$route['top-stories'] = "news";

$route['news/search'] = "news/search";

$route['news/(\d+)'] = "news/index/none/$1";
$route['news/([a-z A-Z _-]+)'] = "news/index/$1";
$route['news/([a-z A-Z _-]+)/(\d+)'] = "news/index/$1/$2";

//$route['news/(\d+)'] = "news/index/$1";
$route['news/(\d+)/(\d+)/([a-z A-Z 0-9 _-]+)'] = "news/view/$1/$2/$3";
//$route['news/([a-z A-Z _-]+)'] = "news/category/$1/";
$route['products/(\d+)'] = "products/index/$1";
$route['products/([a-z A-Z 0-9 _-]+)'] = "products/category/$1";
$route['login'] = "authenticate/login";
$route['admin'] = "admin/home";

$route['claimprofile/(\d+)'] = "claimprofile/index/$1";
$route['doctors/contact/(\d+)'] = "doctors/contact/$1";
$route['doctors/comments/(\d+)'] = "doctors/comments/$1";
$route['doctors/log/(\d+)'] = "doctors/log/$1";

$route['doctor/([a-z A-Z 0-9 _-]+)'] = "doctors/view/0/$1";

$route['doctors/(\d+)/([a-z A-Z _-]+)'] = "doctors/view/$1/$2";
$route['doctors/map'] = "doctors/map";
$route['doctors/index/(\d+)'] = "doctors/index/$1";
$route['doctors/([a-z A-Z _-]+)'] = "doctors/search/$1";
$route['doctors/([a-z A-Z _-]+)/(\d+)'] = "doctors/search/$1/any-city/$2";
$route['doctors/([a-z A-Z _-]+)/([a-z A-Z _-]+)'] = "doctors/search/$1/$2";
$route['doctors/([a-z A-Z _-]+)/([a-z A-Z _-]+)/(\d+)'] = "doctors/search/$1/$2/$3";
$route['archives/(\d+)/(\d+)'] = "archives/index/$1/$2";

/* End of file routes.php */
/* Location: ./system/application/config/routes.php */