<div class="breadcrumb">
    <?foreach($links as $k => $v) {?>
        <?if(is_array($v)) {?>
            <?$i = 0?>
            <?foreach($v as $glk => $glv) {?>
                <a href="<?=$glk?>"><?=$glv?></a>
                <?if(++$i != count($v)) {?>
                    /
                <?} else {?>
                    >
                <?}?>
            <?}?>
        <?} else {?>
            <a href="<?=$k?>"><?=$v?></a> >
        <?}?>
    <?}?>
    <?=$current?>            
</div>