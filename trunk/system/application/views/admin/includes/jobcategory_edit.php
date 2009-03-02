<form action="<?=site_url('admin/jobcategory/edit')?>" method="post" onsubmit="return validateStandard(this, 'error')">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/jobcategory')?>'" />
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
								<td class="dataLabel" width="100%">Parent</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <?=jobcategories_dropdown(isset($jobcategory['parent_id']) ? $jobcategory['parent_id'] : 0, 'id="parent_id" name="parent_id" realname="Parent" required="false"', true)?>
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="100%">Name<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <input type="hidden" name="id" value="<?=isset($jobcategory['id']) ? $jobcategory['id'] : ''?>" />
									<input type="text" id="name" name="name" realname="Name" regexp="" required="true" maxlenght="128" value="<?=isset($jobcategory['name']) ? $jobcategory['name'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Alias<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="alias" name="alias" realname="Alias" regexp="" required="true" maxlenght="128" value="<?=isset($jobcategory['alias']) ? $jobcategory['alias'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Url<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="url" name="url" realname="Url" regexp="" required="true" maxlenght="128" value="<?=isset($jobcategory['url']) ? $jobcategory['url'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Sort order:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="sort_order" name="sort_order" realname="Sort order" regexp="JSVAL_RX_INT" required="false" maxlenght="64" value="<?=isset($jobcategory['sort_order']) ? $jobcategory['sort_order'] : ''?>" size="10" />
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
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/jobcategory')?>'" />
			</td>
		</tr>
	</table>
</form>