<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/setting/edit')?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
    <tr>
		<td width="15%" class="tabDetailViewDL">Sender name:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['sender_name']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Sender email:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['sender_email']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">SMTP host:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['smtp_host']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">SMTP host:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['smtp_host']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">SMTP user:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['smtp_user']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">SMTP password:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['smtp_password']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">SMTP auth:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['smtp_auth'] == 1 ? 'True' : 'False'?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Charset:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['charset']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Word wrap:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['wordwrap']?>&nbsp;</td>
	</tr>
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
    <tr>
		<td width="15%" class="tabDetailViewDL">Contact address:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['contact_address']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Contact email:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['contact_email']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Contact phone:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['contact_phone']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Contact fax:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$setting['contact_fax']?>&nbsp;</td>
	</tr>
</table>