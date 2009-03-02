<?if(isset($news) && count($news) > 0) {?>
    <h4>Popular news</h4>
    <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
        <?for($i = 0; $i < count($news); $i++) {?>
        	<tr>
        		<td width="70%" class="tabDetailViewDL"><?=$news[$i]['title']?>:</td>
        		<td width="30%" class="tabDetailViewDF"><?=$news[$i]['number_views']?>&nbsp;</td>
        	</tr>
        <?}?>
    </table>
<?}?>
<?if(isset($articles) && count($articles) > 0) {?>
    <h4>Popular articles</h4>
    <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
        <?for($i = 0; $i < count($articles); $i++) {?>
        	<tr>
        		<td width="70%" class="tabDetailViewDL"><?=$articles[$i]['title']?>:</td>
        		<td width="30%" class="tabDetailViewDF"><?=$articles[$i]['number_views']?>&nbsp;</td>
        	</tr>
        <?}?>
    </table>
<?}?>
<?if(isset($products) && count($products) > 0) {?>
    <h4>Popular products</h4>
    <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
        <?for($i = 0; $i < count($products); $i++) {?>
        	<tr>
        		<td width="70%" class="tabDetailViewDL"><?=$products[$i]['name']?>:</td>
        		<td width="30%" class="tabDetailViewDF"><?=$products[$i]['number_views']?>&nbsp;</td>
        	</tr>
        <?}?>
    </table>
<?}?>