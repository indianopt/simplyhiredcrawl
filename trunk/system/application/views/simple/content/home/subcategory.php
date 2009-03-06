<div id="navbar">
    <div class="breadcrumbs"><a rel="nofollow" href="<?=site_url()?>">Home</a> <span class="s">&gt;</span> <h1><?=$parent_category?></h1></div>
</div><!--navbar-->
<div id="content">
    <div id="browse">
        <div class="browse_box">
            <div class="browse_box_header"><div class="c_left_col"><h2><?=$parent_category?></h2></div>
            <div class="clear"></div>
        </div><!-- /browse_box_header -->
        <div class="lists">
            <?
                $total = count($categories);
                $per_column = ceil($total / 2);
            ?>
            <?for($i = 0; $i < 2; $i++) {?>
                <ul class="cols2">
                    <?for($j = $i*$per_column ; ($j < ($i*$per_column)+$per_column) && isset($categories[$j]); $j++) {?>
                        <?$c = $categories[$j]?>
                        <li><a href="<?=site_url('job/category/' . $c['id'] . '/' . $c['alias'])?>" class="display_string"><?=$c['name']?></a></li>
                    <?}?>
                </ul>
            <?}?>
        </div>
        <div class="clear"></div>
    </div>