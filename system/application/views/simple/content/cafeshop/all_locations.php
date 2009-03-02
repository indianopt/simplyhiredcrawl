<h2>Tất cả địa điểm</h2>
<div class="left">
    <?if(count($provinces_catalog) > 0) {?>
        <?for($i = 0; $i < count($provinces_catalog); $i++) {?>
			<p>
                <b><?=image('arrow.gif', '>')?><a class="title" href="<?=site_url('cafeshop/location/' . $provinces_catalog[$i]['alias'])?>"><?=$provinces_catalog[$i]['name']?> (<?=$provinces_catalog[$i]['number_of_items']?>)</a></b>
                <br />
                <?foreach($provinces_catalog[$i]['districts'] as $d) {?>
	                <a href="<?=site_url('cafeshop/location/' . $provinces_catalog[$i]['alias'] . '/' . $d['alias'])?>"><?=$d['name']?> (<?=$d['number_of_items']?>)</a>&nbsp;
                <?}?>
            </p>
        <?}?>
    <?}?>
</div>