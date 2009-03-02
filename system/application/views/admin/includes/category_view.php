<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/category/edit/' . $category['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
	<tr>
		<td width="15%" class="tabDetailViewDL">Name:</td>
		<td width="85%" class="tabDetailViewDF"><?=$category['name']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Alias:</td>
		<td width="85%" class="tabDetailViewDF"><?=$category['alias']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Added date:</td>
		<td width="85%" class="tabDetailViewDF"><?=$category['added_date']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Last updated:</td>
		<td width="85%" class="tabDetailViewDF"><?=$category['last_updated']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Type:</td>
		<td width="85%" class="tabDetailViewDF"><?=$category['type']?>&nbsp;</td>
	</tr>
</table>