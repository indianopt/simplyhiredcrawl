<div class="left">
    <?if(count($latest_news) > 0) {?>
    	<div class="left_articles">
            <?foreach($latest_news as $n) {?>
    		    <p class="justify clear_both">
                    <?if($n['image'] != '' && file_exists('./uploads/news/' . $n['image'])) {?>
                        <img class="image" src="<?=base_url() . 'uploads/news/' . $n['image']?>" alt="<?=stripslashes($n['title'])?>" />
                    <?}?>
                    <a href="<?=site_url('news/detail/' . $n['alias'])?>"><b><?=stripslashes($n['title'])?></b></a><br />
                    <?=stripslashes($n['summary'])?>
                </p>
            <?}?>
    	</div>
    <?}?>    
	
    <?if(count($categories_catalog) > 0) {?>
        <?$middle = ceil(count($categories_catalog) / 2);?>
        <div class="left_links">  
            <b>Chọn quán theo phong cách</b>
    		<div class="left_side">
                <?for($i = 0; $i < $middle; $i++) {?>
        			<p>
                        <b><?=image('arrow.gif', '>')?><a class="title" href="<?=site_url('cafeshop/category/' . $categories_catalog[$i]['alias'])?>"><?=$categories_catalog[$i]['name']?> (<?=$categories_catalog[$i]['number_of_items']?>)</a></b>
                    </p>
                <?}?>
    		</div>
    		<div class="right_side">
    			<?for($i = $middle; $i < count($categories_catalog); $i++) {?>
        			<p>
                        <b><?=image('arrow.gif', '>')?><a class="title" href="<?=site_url('cafeshop/category/' . $categories_catalog[$i]['alias'])?>"><?=$categories_catalog[$i]['name']?> (<?=$categories_catalog[$i]['number_of_items']?>)</a></b>
                    </p>
                <?}?>
    		</div>
            <p class="clear_both"></p>
    	</div>
    <?}?>
    <?if(count($provinces_catalog) > 0) {?>
        <div class="left_links">  
            <b>Chọn quán theo địa điểm</b>
                <?for($i = 0; $i < count($provinces_catalog); $i++) {?>
        			<p>
                        <b><?=image('arrow.gif', '>')?><a class="title" href="<?=site_url('cafeshop/location/' . $provinces_catalog[$i]['alias'])?>"><?=$provinces_catalog[$i]['name']?> (<?=$provinces_catalog[$i]['number_of_items']?>)</a></b>
                        <br />
                        <?foreach($provinces_catalog[$i]['districts'] as $d) {?>
			                <a href="<?=site_url('cafeshop/location/' . $provinces_catalog[$i]['alias'] . '/' . $d['alias'])?>"><?=$d['name']?> (<?=$d['number_of_items']?>)</a>&nbsp;
                        <?}?>
                    </p>
                <?}?>
            <p class="clear_both"><a href="<?=site_url('cafeshop/alllocations')?>">Xem tất cả...</a></p>
    	</div>
    <?}?>
    <!--
	<div class="left_message">
		<p><b>Lorem ipsum dolor</b> sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam <b>erat volutpat</b>. Ut wisi enim ad minim veniam, quis nostrud exerci.</p>
	</div>
	<div class="left_box">
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex.</p>
		
	</div>
    -->
</div>	
<div class="right">
	<?foreach($latest_cafeshops as $it) {?>
        <div class="right_articles">
		    <p class="justify clear_both">
                <?if($it['image'] != '' && file_exists('./uploads/cafeshop/' . $it['image'])) {?>
                    <img class="image" src="<?=base_url() . 'uploads/cafeshop/' . $it['image']?>" alt="<?=$it['name']?>" />
                <?}?>
                <a href="<?=site_url('cafeshop/detail/' . $it['alias'])?>"><b><?=$it['name']?></b></a><br />
                <?=$it['summary']?>
            </p>
        </div>
    <?}?>
</div>