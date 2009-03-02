<form action="<?=site_url('admin/user/change_password')?>" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error');">
    <input type="hidden" name="id" value="<?=isset($user['id']) ? $user['id'] : ''?>" />
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/user')?>'" />
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
								<td class="dataLabel" width="15%">Current password:</td>
								<td class="dataField" width="85%">
									<input name="current_password" id="current_password" realname="Current password" required="true" minlength="5" maxlength="64" type="password">
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Password:</td>
								<td class="dataField" width="85%">
									<input name="password" id="password" realname="Password" required="true" minlength="5" maxlength="12" type="password">&nbsp;Must be at least 5 characters and not more than 12
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Confirm password:</td>
								<td class="dataField" width="85%">
									<input name="confirm_password" id="confirm_password" realname="Confirm password" required="true" equals="password" err="Password two must be the same as password 1" type="password">
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
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/user')?>'" />
			</td>
		</tr>
	</table>
</form>