<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/navigation/edit/' . $navigation['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
	<tr>
		<td width="15%" class="tabDetailViewDL">Name:</td>
		<td width="85%" class="tabDetailViewDF"><?=stripslashes($navigation['name'])?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">URL:</td
		<td width="85%" class="tabDetailViewDF"><?=$navigation['url']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Sort order:</td>
		<td width="85%" class="tabDetailViewDF"><?=$navigation['sort_order']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Status:</td>
		<td width="85%" class="tabDetailViewDF"><?=status_2_string($navigation['status'])?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Added date:</td>
		<td width="85%" class="tabDetailViewDF"><?=$navigation['added_date']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Last updated:</td>
		<td width="85%" class="tabDetailViewDF"><?=$navigation['last_updated']?>&nbsp;</td>
	</tr>
</table>