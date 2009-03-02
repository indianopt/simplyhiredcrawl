<form action="<?=site_url('admin/user/edit')?>" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error');">
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
								<td class="dataLabel" width="15%">Full name<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="hidden" name="id" value="<?=isset($user['id']) ? $user['id'] : ''?>" />   
									<input type="text" id="name" name="name" realname="Full name" regexp="/^\w*$/" required="true" maxlenght="64" value="<?=isset($user['name']) ? $user['name'] : ''?>" size="60" />&nbsp;Only characters are allowed
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">User name<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="text" id="username" name="username" realname="User name" regexp="" required="true" minlength="5" maxlenght="64" value="<?=isset($user['username']) ? $user['username'] : ''?>" size="60" />&nbsp;Must be at least 5 characters
								</td>
							</tr>
                            <?if(!isset($user['id']) || $user['id'] == '') {?>
                                <tr>
    								<td class="dataLabel" width="15%">Password<span class="required">*</span>:</td>
    								<td class="dataField" width="85%">
    									<input name="password" id="password" realname="Password" required="true" minlength="5" maxlength="12" type="password">&nbsp;Must be at least 5 characters and not more than 12
    								</td>
    							</tr>
                                <tr>
    								<td class="dataLabel" width="15%">Confirm password<span class="required">*</span>:</td>
    								<td class="dataField" width="85%">
    									<input name="confirm_password" id="confirm_password" realname="Confirm password" required="true" equals="password" err="Password two must be the same as password 1" type="password">
    								</td>
    							</tr>
                            <?}?>
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