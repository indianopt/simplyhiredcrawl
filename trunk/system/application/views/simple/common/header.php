<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?=property('app_title') . (isset($page_title) && !empty($page_title) ? " :: $page_title" : '')?></title>
        <meta name="keywords" content="<?=(isset($page_keywords) && !empty($page_keywords)) ? $page_keywords : property('app_keywords')?>" />
    	<meta name="description" content="<?=(isset($page_description) && !empty($page_description)) ? $page_description : property('app_description')?>" />
    	<meta name="copyright" content="<?=property('app_copyright')?>" />
        <meta name="author" content="<?=property('app_author')?>" />
    	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
        
    	<?=style('style.css')?>
    </head>
    <body>
      <div class="content">
    		<div class="header">
    			<div class="logo">
    				<h1><a href="#" title="Centralized Internet Content">Logo here</a></h1>
    			</div>
    		</div>
            <div class="search_field">
    			<form method="post" action="<?=site_url('job/search')?>">
    				<p>Keywords:&nbsp;<input type="text" name="keyword" />&nbsp;&nbsp;&nbsp;Location:&nbsp;<input type="text" name="location" />&nbsp;&nbsp;<input type="submit" value="Tìm" /></p>
    			</form>
    		</div>
            <div class="subheader">
    			<p><b>Lorem ipsum dolor</b> sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam <b>erat volutpat</b>. Ut wisi enim ad minim veniam, quis nostrud exerci.</p>
    		</div>