<form action="<?=site_url('admin/navigation/edit')?>" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error');">
    <input type="hidden"name="status"  value="<?=isset($navigation['status']) ? $navigation['status'] : '0'?>" />
    <input type="hidden" name="id" value="<?=isset($navigation['id']) ? $navigation['id'] : ''?>" />    
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($navigation['status']) ? $navigation['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/navigation')?>'" />
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
								<td class="dataLabel" width="100%">Name<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="name" name="name" realname="Name" regexp="" required="true" maxlenght="64" value="<?=isset($navigation['name']) ? stripslashes($navigation['name']) : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">URL<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="url" name="url" realname="URL" regexp="" required="true" maxlenght="64" value="<?=isset($navigation['url']) ? $navigation['url'] : ''?>" size="60" /> Ex: http://yourdomain.com/index.php
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Sort order:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="sort_order" name="sort_order" realname="Sort order" regexp="JSVAL_RX_INT" required="false" maxlenght="64" value="<?=isset($navigation['sort_order']) ? $navigation['sort_order'] : ''?>" size="10" />
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
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($navigation['status']) ? $navigation['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/navigation')?>'" />
			</td>
		</tr>
	</table>
</form>