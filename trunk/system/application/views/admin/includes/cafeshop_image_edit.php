<form action="<?=site_url('admin/cafeshop/image_edit')?>" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error');">
    <input type="hidden" name="image_id" value="<?=isset($image['id']) ? $image['id'] : ''?>" />
    <input type="hidden" name="cafeshop_id" value="<?=isset($cafeshop['id']) ? $cafeshop['id'] : ''?>" />
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/cafeshop/detail/' . $cafeshop['id'])?>'" />
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
								<td class="dataField" width="100%">Image:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<?if(isset($image['image']) && $image['image']) {?>
										<?=$image['image']?>&nbsp;&nbsp;<a href="javascript: void(0)" onclick="this.parentNode.innerHTML='<input type=\'file\' name=\'image\' size=\'40\'/>'">[Remove]</a>
									<?} else {?>
										<input type="file" name="image" size="40"/>&nbsp;<span class="required"><?if(isset($this->upload)) echo $this->upload->display_errors('', '')?></span>
									<?}?>
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="100%">Title<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="title" name="title" realname="Title" regexp="" required="true" maxlenght="64" value="<?=isset($image['title']) ? $image['title'] : ''?>" size="60" />
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
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/cafeshop/detail/' . $cafeshop['id'])?>'" />
			</td>
		</tr>
	</table>
</form>