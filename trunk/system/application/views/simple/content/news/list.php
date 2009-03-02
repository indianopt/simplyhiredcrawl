<h2>Tin tức</h2>
<div>
    <?foreach($news as $n) {?>
	    <p class="justify clear_both">
            <?if($n['image'] != '' && file_exists('./uploads/news/' . $n['image'])) {?>
                <img class="image" src="<?=base_url() . 'uploads/news/' . $n['image']?>" alt="<?=$n['title']?>" />
            <?}?>
            <a href="<?=site_url('news/detail/' . $n['alias'])?>"><b><?=$n['title']?></b></a><br />
            <?=$n['summary']?>
        </p>
    <?}?>
    <?=$this->pagination->create_links()?>
</div>