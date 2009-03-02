<?php
/*
|--------------------------------------------------------------------------
| view theme folder
|--------------------------------------------------------------------------
|
| (folder name)  /application/rapyd/views/[theme]/component.php
| You may develop your themes, copy and paste the default theme then change at least the CSS, and then set here the theme
| You chan change themplate at runtime for example in a controller you can do:
| $this->rapyd->config->set_item("theme","mytheme");   
*/

$rpd['theme'] = 'default';


/*
|--------------------------------------------------------------------------
| images and libraries "base path"
|--------------------------------------------------------------------------
|
| rapyd need some icons/images and third party libs (javascript) for his components, so it need some public folders.
| by default these folders are /application/rapyd/images /application/rapyd/libraries
|
| normally you need to change this configuration if CI is outside the website root
| in this case you need to move rapyd image folder in a accessible path, and set an absolute path like:
| $config['images_path'] = '/rapydimg/';
| $config['libraries_path'] = '/citest/rapydlibs/';
|
| and/or if you use revrite roules, you may need to add in this folder an .htaccess file like this:
|  <IfModule mod_rewrite.c>
|    RewriteEngine off
|  </IfModule>
|
| you can't use rapyd constants here!
| the path must be absolute!
| leave it blank if you don't move rapyd image folder outside rapyd folder.
*/

$rpd['images_path'] = '/rapyd/images/';
$rpd['libraries_path'] = '/rapyd/libraries/';




/*
|--------------------------------------------------------------------------
| default language (buttons & messages)
|--------------------------------------------------------------------------
| rapyd need some messages for his components, so to keep multilanguage support, you need to set a language string to load constants file/files.
|
*/

$rpd['language'] = 'english';


/*
|--------------------------------------------------------------------------
| languages for internationalization (see rapyd_lang class)
|--------------------------------------------------------------------------
| if your application is multilanguage, you can specify accepted languages.
|
| note: CI language files & rapyd language files "are needed" for all language you decide to use
| by default CI include only english language; by default rapyd include english,italian,french.
*/

$rpd['languages'] = array('english','italian','french','german','spanish');

$rpd['browser-detect'] = true;
$rpd['browser-to-language'] = array(
	'us'    => 'english',
  'en'    => 'english',
  'it'    => 'italian',
  'fr'    => 'french',
  'de'    => 'german',
  'ru'    => 'russian',
  'es'    => 'spanish',

);


$rpd['ip-detect'] = false;
$rpd['country-to-language'] = array(
    'ITA'=>'italian',
    'USA'=>'english',
    'GBR'=>'english',
    //...
);

/*
|--------------------------------------------------------------------------
| keep language persistence in uri
|--------------------------------------------------------------------------
| it simply add, when you use anchor_lang (or anchor_popup_lang), the language segment first:
| anchor_lang("controller/function/param")  it's equal to anchor("{current_lang}/controller/function/param")
|
| It need to be used in conjunction with a custom uri sniff/reindex function.
*/ 
$rpd['uri_keep_lang'] = TRUE;


/*
|--------------------------------------------------------------------------
| rapyd_uri keywords
|--------------------------------------------------------------------------
| rapyd components need to reserve some words to manage application flow
| by default these keywords are simples and thinked to keep your urls really semantic:
| ../orderby/creation/desc/search
| ../uri_search/genre/female
| ../modify/10
| ../delete/5
| 
| but this mean that these words are reserved, if you need to use a rapyd component..
| you can't use give to a controller, method, or parameter the same name.
|
| Here you can configure/change some of these keywords.
| Important: use minuscase, CHANGE ONLY THE VALUES not keys, each uri_keyword need to be "unique" in your application uri.
*/

$rpd['uri_keywords'] = array(

     //rapyd_uri
    'gfid'        => 'gfid',
    
     //datefilter
    'search'      => 'search',
    'reset'       => 'reset',
    'uri_search'  => 'uri_search',

     //dataset / datagrid / datatable
    'osp'         => 'osp',
    'orderby'     => 'orderby',

    //dataedit
    'show'        => 'show',
    'create'      => 'create',
    'modify'      => 'modify',
    'delete'      => 'delete',
    'insert'      => 'insert',
    'update'      => 'update',
    'do_delete'   => 'do_delete'
    
  );


/*
|--------------------------------------------------------------------------
| session/persistence settings
|--------------------------------------------------------------------------
|
| Rapyd can save in $_SESSION each page/controller  status ($_POST, uri segments)
| It make possible to move across pages and keep persistence of rapyd components.
| How it work:
| When a component (Like a DataGrid) build detail links, pagination links, add buttons etc. it add a pair of segments: 
| ..youruri/gfid/{identifier}  The identifier is an index of a session var which keep "back_uri" and "back_post"
| So a component in anhoter page can bo back to the prev page, retriving the same component status.
*/

$rpd['persistence_duration'] = 240;  //max persistence seconds
$rpd['persistence_limit'] = 10;  //max number of concurrent sessions per uri.




/*
|--------------------------------------------------------------------------
| replace_functions 
|--------------------------------------------------------------------------
|
| is an array of php functions that can be used when a rapyd component parse the his content
|
| for example in a datagrid you can use the susbstr function to get the fists 100 chars of body field:
| $datagrid = new DataGrid();
| $datagrid->base_url = site_url('controller/function');
| $datagrid->per_page = 2;
| $datagrid->column("Title","title");
| //here I use a replace function (substr).  Note  the parameters, they are joined by | (pipe)
| $datagrid->column("Body", "<substr><#body#>|0|100</substr>..");
| $datagrid->build();
|
*/
$rpd['replace_functions'] = array(
  "htmlspecialchars","htmlentities","strtolower","strtoupper",
  "substr","nl2br","dbdate_to_human", "number_format", 
  "enum_to_human");



/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| For security reason, some rapyd components use CI Encryption class (i.e. rapyd_session)
| note, I've choosen to place encryption here instead using CI config key for compatibility reason.
| See: http://www.codeigniter.com/user_guide/libraries/encryption.html
*/
$rpd['encryption_key'] = "rapydencryptionkey";  //Important: please replace with your custom encryption_key.
  
?>