<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/node/edit/' . $node['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
	<tr>
		<td width="15%" class="tabDetailViewDL">Name:</td>
		<td width="85%" class="tabDetailViewDF"><?=$node['name']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Reference name:</td>
		<td width="85%" class="tabDetailViewDF"><?=$node['reference_name']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Content:</td>
		<td width="85%" class="tabDetailViewDF"><?=stripslashes($node['content'])?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">SEO keywords:</td>
		<td width="85%" class="tabDetailViewDF"><?=$node['seo_keywords']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">SEO description:</td>
		<td width="85%" class="tabDetailViewDF"><?=$node['seo_description']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Added date:</td>
		<td width="85%" class="tabDetailViewDF"><?=$node['added_date']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Last updated:</td>
		<td width="85%" class="tabDetailViewDF"><?=$node['last_updated']?>&nbsp;</td>
	</tr>
</table>