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
        <link rel="stylesheet" href="<?=base_url()?>js/modalbox/modalbox.css" type="text/css" media="screen" />
        <script type="text/javascript" src="<?=base_url()?>js/prototype/prototype.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/scriptaculous/scriptaculous.js?load=effects"></script>
        <script type="text/javascript" src="<?=base_url()?>js/modalbox/modalbox.js"></script>
    </head>
    <body>
      <div class="content">
    		<div class="header">

    			<div class="top_info">
    				<div class="top_info_right">
    					<p>
                            <?$user = $this->session->userdata('user');?>
                            <?if($user == FALSE) {?>
                                <b>Bạn chưa đăng nhập!</b> <a href="<?=site_url('member/login')?>" rel="nofollow">Đăng nhập</a> để kiểm tra thông điệp.<br />
        					    Bạn muốn <a href="<?=site_url('member/login')?>" rel="nofollow">Đăng nhập</a> hay <a href="<?=site_url('member/register')?>" rel="nofollow">đăng ký</a>?
                            <?} else {?>
                                Chào bạn <b><?=$user['name']?></b>.<br />
        					    <a href="<?=site_url('member/myaccount')?>">Tài khoản của tôi</a> | <a href="<?=site_url('member/logout')?>" rel="nofollow">Đăng xuất</a>
                            <?}?>
                        </p>
    				</div>		
    				<div class="top_info_left">
    					<p>Hôm nay: <b><?=date("F j, Y")?></b><br />
    					Xem <a href="#">tin nóng</a> hay <a href="#">quán mới</a> hôm nay</p>
    				</div>
    			</div>

    			<div class="logo">
    				<h1><a href="#" title="Centralized Internet Content">Sành Điệu 24h</a></h1>
    			</div>
    		</div>
    		
    		<div class="bar">
                <?=$navigation?>
    		</div>
    		<div class="search_field">
    			<form method="post" action="">
    				<p><input type="text" name="keyword" /> <input type="submit" value="Tìm" /></p>
    			</form>
    		</div>
    		<div class="subheader">
    			<p><b>Lorem ipsum dolor</b> sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam <b>erat volutpat</b>. Ut wisi enim ad minim veniam, quis nostrud exerci.</p>
    		</div>
            <?=isset($breadcrumb) ? $breadcrumb : ''?>