<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/news/edit/' . $news['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
	<tr>
		<td width="15%" class="tabDetailViewDL">Title:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['title']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Alias:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['alias']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Added date:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['added_date']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Last updated:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['last_updated']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Number views:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['number_views']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Status:</td>
		<td width="85%" class="tabDetailViewDF"><?=status_2_string($news['status'])?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Categories:</td>
		<td width="85%" class="tabDetailViewDF">
            <?foreach($news['categories'] as $c) {?>
                <?=$c['name']?><br />
            <?}?>
        </td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Source:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['source_name']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Source link:</td>
		<td width="85%" class="tabDetailViewDF"><a href="<?=$news['source_url']?>" target="_blank"><?=$news['source_url']?></a>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Summary:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['summary']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Description:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['description']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">SEO keywords:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['seo_keywords']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">SEO description:</td>
		<td width="85%" class="tabDetailViewDF"><?=$news['seo_description']?>&nbsp;</td>
	</tr>
</table>