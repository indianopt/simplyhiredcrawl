<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/user/edit/' . $user['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
	<tr>
		<td width="15%" class="tabDetailViewDL">Full name:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$user['name']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">User name:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$user['username']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Added date:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$user['added_date']?>&nbsp;</td>
	</tr>
</table>