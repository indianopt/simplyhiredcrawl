<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/jobcategory/edit/' . $jobcategory['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
	<tr>
		<td width="15%" class="tabDetailViewDL">Name:</td>
		<td width="85%" class="tabDetailViewDF"><?=$jobcategory['name']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Alias:</td>
		<td width="85%" class="tabDetailViewDF"><?=$jobcategory['alias']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Url:</td>
		<td width="85%" class="tabDetailViewDF"><?=$jobcategory['url']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Sort order:</td>
		<td width="85%" class="tabDetailViewDF"><?=$jobcategory['sort_order']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Added date:</td>
		<td width="85%" class="tabDetailViewDF"><?=$jobcategory['added_date']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Last updated:</td>
		<td width="85%" class="tabDetailViewDF"><?=$jobcategory['last_updated']?>&nbsp;</td>
	</tr>
</table>