<form action="<?=site_url('admin/category/edit')?>" method="post" onsubmit="return validateStandard(this, 'error')">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/category')?>'" />
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
                                    <input type="hidden" name="id" value="<?=isset($category['id']) ? $category['id'] : ''?>" />
									<input type="text" id="name" name="name" realname="Name" regexp="" required="true" maxlenght="128" value="<?=isset($category['name']) ? $category['name'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Alias<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="alias" name="alias" realname="Alias" regexp="" required="true" maxlenght="128" value="<?=isset($category['alias']) ? $category['alias'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%" valign="top">Type<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <?=category_types_dropdown(isset($category['type']) ? $category['type'] : '', 'id="type" name="type" realname="Type" regexp="" required="true" exclude="-1"')?>
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Sort order:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="sort_order" name="sort_order" realname="Sort order" regexp="JSVAL_RX_INT" required="false" maxlenght="64" value="<?=isset($category['sort_order']) ? $category['sort_order'] : ''?>" size="10" />
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
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/category')?>'" />
			</td>
		</tr>
	</table>
</form>