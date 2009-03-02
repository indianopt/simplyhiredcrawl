<form action="<?=site_url('admin/node/edit')?>" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error');">
    <input type="hidden"name="status"  value="<?=isset($node['status']) ? $node['status'] : '0'?>" />
    <input type="hidden" name="id" value="<?=isset($node['id']) ? $node['id'] : ''?>" />    
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($node['status']) ? $node['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/node')?>'" />
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
									<input type="text" id="name" name="name" realname="Name" regexp="" required="true" maxlenght="64" value="<?=isset($node['name']) ? $node['name'] : ''?>" size="60" />
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="100%">Reference name<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="reference_name" name="reference_name" realname="Reference name" regexp="" required="true" maxlenght="64" value="<?=isset($node['reference_name']) ? $node['reference_name'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%" valign="top">Content<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <?=form_fckeditor(array('name' => 'content', 'value' => (isset($node['content']) ? stripslashes($node['content']) : ''), 'width' => '100%', 'height' => '500px'))?>
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">SEO keywords:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="seo_keywords" name="seo_keywords" realname="SEO keywords" regexp="" required="false" maxlenght="128" value="<?=isset($node['seo_keywords']) ? $node['seo_keywords'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">SEO description:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="seo_description" name="seo_description" realname="SEO description" regexp="" required="false" maxlenght="128" value="<?=isset($node['seo_description']) ? $node['seo_description'] : ''?>" size="120" />
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
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($node['status']) ? $node['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/node')?>'" />
			</td>
		</tr>
	</table>
</form>