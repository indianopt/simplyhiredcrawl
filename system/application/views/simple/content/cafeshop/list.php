<h2>Quán cafe</h2>
<div>
    <?foreach($cafeshops as $c) {?>
	    <p class="justify clear_both">
            <?if($c['image'] != '' && file_exists('./uploads/cafeshop/' . $c['image'])) {?>
                <img class="image" src="<?=base_url() . 'uploads/cafeshop/' . $c['image']?>" alt="<?=$c['name']?>" />
            <?}?>
            <a href="<?=site_url('cafeshop/detail/' . $c['alias'])?>"><b><?=$c['name']?></b></a><br />
            <?=stripslashes($c['summary'])?>
        </p>
    <?}?>
    <?=$this->pagination->create_links()?>
</div>