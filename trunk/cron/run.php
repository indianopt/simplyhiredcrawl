<?php
    /*
    * Created by Dang Ngoc Giao at giaodn@gmail.com
    */
    define('BASEPATH', true); // Do nothing, just for hacking CI, do not remove
    require_once('../system/application/config/config.php');
    $base_url = $config['base_url'];
    $path_info = parse_url($base_url);
    $base_url = $path_info['host'];
    
    $index = $config['index_page'];
    
    $target = $_GET['target'];
    
    $action = '';
    if($target == 'jobs') {
        $perpage = $_GET['perpage'] ? $_GET['perpage'] : 5;
        $continue_run = $_GET['continue_run'] ? $_GET['continue_run'] : false;
        $ignore_existed = $_GET['ignore_existed'] ? $_GET['ignore_existed'] : false;
        
        $action = $path_info['path'] . ($index ? "$index/" : '') . "admin/crawl/jobs/$perpage/$continue_run/$ignore_existed";
    }
    else if($target = 'categories') {
        $action = $path_info['path'] . ($index ? "$index/" : '') . "admin/crawl/categories";
    }

    $fp = fsockopen("$base_url", 80, $errno, $errstr, 30);
    if (!$fp) {
        echo "$errstr ($errno)<br />\n";
    } else {
        $out = "GET $action HTTP/1.1\r\n"; //The codeigniter url you need to run as a cron job
        $out .= "Host: $base_url\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
            echo fgets($fp, 128);
        }
        fclose($fp);
    }
?>