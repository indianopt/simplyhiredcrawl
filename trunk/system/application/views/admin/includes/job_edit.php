<form action="<?=site_url('admin/job/edit')?>" method="post" onsubmit="return validateStandard(this, 'error')">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/job')?>'" />
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
								<td class="dataLabel" width="100%">Category</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <?=jobcategories_dropdown(isset($job['category_id']) ? $job['category_id'] : 0, 'id="category_id" name="category_id" realname="Category" required="true"', false)?>
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="100%">Name<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <input type="hidden" name="id" value="<?=isset($job['id']) ? $job['id'] : ''?>" />
									<input type="text" id="name" name="name" realname="Name" regexp="" required="true" maxlenght="128" value="<?=isset($job['name']) ? $job['name'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Alias<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="alias" name="alias" realname="Alias" regexp="" required="true" maxlenght="128" value="<?=isset($job['alias']) ? $job['alias'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Company<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="company" name="company" realname="Company" regexp="" required="true" maxlenght="128" value="<?=isset($job['company']) ? $job['company'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Location<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="location" name="location" realname="Location" regexp="" required="true" maxlenght="128" value="<?=isset($job['location']) ? $job['location'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Url<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="url" name="url" realname="Url" regexp="" required="true" maxlenght="128" value="<?=isset($job['url']) ? $job['url'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Time latest<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="time_latest" name="time_latest" realname="Time latest" regexp="" required="true" maxlenght="128" value="<?=isset($job['time_latest']) ? $job['time_latest'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Crawl from<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="crawl_from" name="crawl_from" realname="Crawl from" regexp="" required="true" maxlenght="128" value="<?=isset($job['crawl_from']) ? $job['crawl_from'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Description<span class="required">*</span></td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<textarea id="description" name="description" realname="Description" regexp="" required="true" rows="6" cols="80"><?=isset($job['description']) ? $job['description'] : ''?></textarea>
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
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/job')?>'" />
			</td>
		</tr>
	</table>
</form>