<h1>Job categories</h1>
<div class="content">
    <?foreach($categories as $c) {?>
        <a href="<?=site_url('jobcategory/browse/' . $c['id'] . '/' . $c['alias'])?>"><b><?=$c['name']?></b></a><br />
    <?}?>
</div>