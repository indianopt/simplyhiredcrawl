<?
    $chars = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
?>
<div id="navbar">
    <div class="breadcrumbs"><a rel="nofollow" href="<?=site_url()?>">Home</a></div>
</div><!--navbar-->
<div id="content">
    <div id="browse">
        <div class="browse_box">
            <div class="browse_box_header"><div class="c_left_col"><h2>Job Categories</h2></div>
            <div class="c_right_col">
                <h3>Job titles:
                    <ul>  
                        <?foreach($chars as $c) {?>
                            <li><a href="<?=site_url('job/title/' . strtolower($c))?>"><?=stripslashes($c)?></a></li>
                        <?}?>
                    </ul>
                </h3>    
            </div>
            <div class="clear"></div>
        </div><!-- /browse_box_header -->
        <div class="lists">
            <?
                $total = count($categories);
                $per_column = ceil($total / 4);
            ?>
            <?for($i = 0; $i < 4; $i++) {?>
                <ul class="cols4">
                    <?for($j = $i*$per_column ; ($j < ($i*$per_column)+$per_column) && isset($categories[$j]); $j++) {?>
                        <?$c = $categories[$j]?>
                        <li><a href="<?=site_url('jobcategory/subcategory/' . $c['id'] . '/' . $c['alias'])?>" class="display_string"><?=$c['name']?></a></li>
                    <?}?>
                </ul>
            <?}?>
        </div>
        <div class="clear"></div>
    </div>
    <!---->
    <div id="browse">
        <div class="browse_box">
            <div class="browse_box_header"><div class="c_left_col"><h2>Location</h2></div>
            <div class="clear"></div>
        </div><!-- /browse_box_header -->
        <div class="lists">
        <?
            $locations = array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'Washington DC', 'West Virginia', 'Wisconsin', 'Wyoming');
            $total = count($locations);
            $per_column = ceil($total / 4);
        ?>
        <?for($i = 0; $i < 4; $i++) {?>
            <ul class="cols4">
                <?for($j = $i*$per_column ; ($j < ($i*$per_column)+$per_column) && isset($locations[$j]); $j++) {?>
                    <?$l = $locations[$j]?>
                    <li><a href="<?=site_url('job/location/' . $l)?>" class="display_string"><?=$l?></a></li>
                <?}?>
            </ul>
        <?}?>
        <div class="clear"></div>
    </div>
    <!---->
    <div id="browse">
        <div class="browse_box">
            <div class="browse_box_header"><div class="c_left_col"><h2>Company</h2></div>
            <div class="clear"></div>
        </div><!-- /browse_box_header -->
        <div class="lists">
            <ul class="row"></ul>
            <ul class="row">  
                <?foreach($chars as $c) {?>
                    <li><a href="<?=site_url('job/company/' . strtolower(stripslashes($c)))?>"><?=stripslashes($c)?></a></li>
                <?}?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>