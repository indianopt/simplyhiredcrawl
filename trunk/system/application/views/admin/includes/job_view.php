<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/job/edit/' . $job['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
    <tr>
		<td width="15%" class="tabDetailViewDL">Category:</td>
		<td width="85%" class="tabDetailViewDF"><?=$job['category_name']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Name:</td>
		<td width="85%" class="tabDetailViewDF"><?=$job['name']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Name:</td>
		<td width="85%" class="tabDetailViewDF"><?=$job['company']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Location:</td>
		<td width="85%" class="tabDetailViewDF"><?=$job['location']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Url:</td>
		<td width="85%" class="tabDetailViewDF"><?=$job['url']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Time latest:</td>
		<td width="85%" class="tabDetailViewDF"><?=$job['time_latest']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Crawl from:</td>
		<td width="85%" class="tabDetailViewDF"><?=$job['crawl_from']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Added date:</td>
		<td width="85%" class="tabDetailViewDF"><?=$job['added_date']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Last updated:</td>
		<td width="85%" class="tabDetailViewDF"><?=$job['last_updated']?>&nbsp;</td>
	</tr>
</table>