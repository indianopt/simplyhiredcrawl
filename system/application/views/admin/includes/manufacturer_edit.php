<form action="<?=site_url('admin/manufacturer/edit')?>" method="post" onsubmit="return validateStandard(this, 'error')">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/manufacturer')?>'" />
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
								<td class="dataLabel" width="100%">Name<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <input type="hidden" name="id" value="<?=isset($manufacturer['id']) ? $manufacturer['id'] : ''?>" />
									<input type="text" id="name" name="name" realname="Name" regexp="" required="true" maxlenght="64" value="<?=isset($manufacturer['name']) ? $manufacturer['name'] : ''?>" size="60" />
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
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/manufacturer')?>'" />
			</td>
		</tr>
	</table>
</form>