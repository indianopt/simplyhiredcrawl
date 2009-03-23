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
        <div id="container">
            <div id="header">

                <div id="c_header_logo">
                    <div><a rel="nofollow" href="<?=site_url()?>" title=""><h1 style="font-size: 40px">Logo here</h1></a></div>
                </div><!--c_header_logo-->

                <div id="c_header_search">
                    <form name="search" action="<?=site_url('job/search')?>" method="post">
                        <div class="element">
                            <label for="keyword" class="text">Keywords</label>
                            <div><input id="keyword" class="text" name="keyword" value="" type="text"></div>
                        </div>
                        <div class="element">
                            <label for="location" class="text">Location</label>
                            <div><input id="location" class="text" name="location" value="" type="text"></div>
                        </div>
                        <div class="element">
                            <label>&nbsp;</label>
                            <div><input class="button" value="Search Jobs" type="submit"></div>
                        </div>
                        <div class="element">
                            <label>&nbsp;</label>
                            <p>&nbsp;</p>
                            <p><a rel="nofollow" id="l_advanced_search" href="<?=site_url('job/advanced_search')?>">Advanced Job Search</a></p>
                        </div>

                    </form>
                </div><!--c_header_search-->
            </div><!--header-->
            <div class="clear"></div>