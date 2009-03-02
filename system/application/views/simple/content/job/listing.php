<h1><?=$category?></h1>
<div class="content">
    <?foreach($jobs as $j) {?>
        <a href="<?=site_url('job/detail/' . $j['id'] . '/' . $j['alias'])?>"><b><?=$j['name']?></b></a><br />
    <?}?>
    <?=$this->pagination->create_links()?>                
</div>