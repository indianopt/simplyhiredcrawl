<form action="<?=site_url('admin/setting/edit')?>" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error');">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/setting')?>'" />
			</td>
			<td align="right" nowrap="nowrap"><span class="required">*</span> Indicate required fields</td>
		</tr>
	</table>
	
	<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td>
					<table border="0" cellpadding="2" cellspacing="0" width="100%">
						<tbody>
                            <?if($this->validation->error_string != '') {?>
                                <tr>
                                    <td colspan="2" style="color: red"><?=$this->validation->error_string?></td>
                                </tr>
                            <?}?>
                            <tr>
								<td class="dataLabel" width="15%">Sender name<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="text" id="sender_name" name="sender_name" realname="Sender name" regexp="" required="true" maxlenght="64" value="<?=isset($setting['sender_name']) ? $setting['sender_name'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Sender email<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="text" id="sender_email" name="sender_email" realname="Sender email" regexp="" required="true" maxlenght="64" value="<?=isset($setting['sender_email']) ? $setting['sender_email'] : ''?>" size="60" />
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="15%">SMTP host<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="text" id="smtp_host" name="smtp_host" realname="SMTP host" regexp="" required="true" maxlenght="64" value="<?=isset($setting['smtp_host']) ? $setting['smtp_host'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">SMTP user<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="text" id="smtp_user" name="smtp_user" realname="SMTP user" regexp="" required="true" maxlenght="64" value="<?=isset($setting['smtp_user']) ? $setting['smtp_user'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">SMTP password<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="text" id="smtp_password" name="smtp_password" realname="SMTP password" regexp="" required="true" maxlenght="64" value="<?=isset($setting['smtp_password']) ? $setting['smtp_password'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">SMTP auth:</td>
								<td class="dataField" width="85%">
									<input type="checkbox" id="smtp_auth" value="1" name="smtp_auth" <?=isset($setting) && $setting['smtp_auth'] == 1 ? 'checked' : ''?> />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Word wrap<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="text" id="wordwrap" name="wordwrap" realname="Word wrap" regexp="JSVAL_RX_INT" required="true" maxlenght="64" value="<?=isset($setting['wordwrap']) ? $setting['wordwrap'] : ''?>" size="10" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Charset<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="text" id="charset" name="charset" realname="Charset" regexp="" required="true" maxlenght="64" value="<?=isset($setting['charset']) ? $setting['charset'] : ''?>" size="10" />
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
    <br />
    <table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td>
					<table border="0" cellpadding="2" cellspacing="0" width="100%">
						<tbody>
                            <tr>
								<td class="dataLabel" width="15%">Contact address:</td>
								<td class="dataField" width="85%">
									<input type="text" id="contact_address" name="contact_address" realname="Contact address" regexp="" required="false" maxlenght="128" value="<?=isset($setting['contact_address']) ? $setting['contact_address'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Contact email:</td>
								<td class="dataField" width="85%">
									<input type="text" id="contact_email" name="contact_email" realname="Contact email" regexp="" required="false" maxlenght="64" value="<?=isset($setting['contact_email']) ? $setting['contact_email'] : ''?>" size="60" />
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="15%">Contact phone:</td>
								<td class="dataField" width="85%">
									<input type="text" id="contact_phone" name="contact_phone" realname="Contact phone" regexp="" required="false" maxlenght="64" value="<?=isset($setting['contact_phone']) ? $setting['contact_phone'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Contact fax:</td>
								<td class="dataField" width="85%">
									<input type="text" id="contact_fax" name="contact_fax" realname="Contact fax" regexp="" required="false" maxlenght="64" value="<?=isset($setting['contact_fax']) ? $setting['contact_fax'] : ''?>" size="60" />
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-top: 2px;">
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/setting')?>'" />
			</td>
		</tr>
	</table>
</form>