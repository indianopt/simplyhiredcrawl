<h1><?=$title?></h1>
<div class="content">
    <?foreach($jobs as $j) {?>
        <p>
            <!--<a href="<?=site_url('job/detail/' . $j['id'] . '/' . $j['alias'])?>"><b><?=$j['name']?></b></a><br />-->
            <a href="<?=$j['url']?>"><b><?=$j['name']?></b></a><br />
            <?=$j['company']?> - <?=$j['location']?><br />
            <?=$j['description']?><br />
            <?=$j['time_latest']?> - <a href="<?=$j['url']?>"><?=$j['crawl_from']?></a><br />
        </p>
    <?}?>
    <?=$this->pagination->create_links()?>                
</div>