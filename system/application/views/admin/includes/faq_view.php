<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/faq/edit/' . $faq['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
	<tr>
		<td width="15%" class="tabDetailViewDL">Title:</td>
		<td width="85%" class="tabDetailViewDF"><?=stripslashes($faq['title'])?>&nbsp;</td>
	</tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Question:</td>
		<td width="85%" class="tabDetailViewDF"><?=stripslashes($faq['question'])?>&nbsp;</td>
	</tr>
	</tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Answer:</td>
		<td width="85%" class="tabDetailViewDF"><?=stripslashes($faq['answer'])?>&nbsp;</td>
	</tr>
	</tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Questioner:</td>
		<td width="85%" class="tabDetailViewDF"><?=stripslashes($faq['questioner'])?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Added date:</td>
		<td width="85%" class="tabDetailViewDF"><?=$faq['added_date']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Last updated:</td>
		<td width="85%" class="tabDetailViewDF"><?=$faq['last_updated']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Status:</td>
		<td width="85%" class="tabDetailViewDF"><?=status_2_string($faq['status'])?>&nbsp;</td>
	</tr>
</table>