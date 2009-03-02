<form action="<?=site_url('admin/faq/edit')?>" method="post" onsubmit="return validateStandard(this, 'error');">
    <input type="hidden"name="status"  value="<?=isset($faq['status']) ? $faq['status'] : '0'?>" />
    <input type="hidden" name="id" value="<?=isset($faq['id']) ? $faq['id'] : ''?>" />    
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($faq['status']) ? $faq['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/faq')?>'" />
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
								<td class="dataLabel" width="100%">Title<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="title" name="title" realname="Title" regexp="" required="true" maxlenght="64" value="<?=isset($faq['title']) ? $faq['title'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%" valign="top">Question<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <?=form_fckeditor(array('name' => 'question', 'value' => (isset($faq['question']) ? stripslashes($faq['question']) : ''), 'width' => '100%', 'height' => '200px'))?>
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="100%" valign="top">Answer<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <?=form_fckeditor(array('name' => 'answer', 'value' => (isset($faq['answer']) ? stripslashes($faq['answer']) : ''), 'width' => '100%', 'height' => '300px'))?>
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="100%">Questioner:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="questioner" name="questioner" realname="Questioner" regexp="" required="true" maxlenght="64" value="<?=isset($faq['questioner']) ? $faq['questioner'] : ''?>" size="60" />
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
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($faq['status']) ? $faq['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/news')?>'" />
			</td>
		</tr>
	</table>
</form>