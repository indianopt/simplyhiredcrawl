<script type="text/javascript">
    function validateCategories() {
        var cs = document.getElementsByName('category_id[]');
        var ok = false;
        for(var i = 0; i < cs.length; i++) {
            if(cs[i].checked) {
                ok = true;
                break;
            }
        }
        
        if(!ok) {
            alert('You must select at least one category for this news');
            return false;
        }
        return true;
    }
</script>
<form action="<?=site_url('admin/news/edit')?>" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error') && validateCategories();">
    <input type="hidden"name="status"  value="<?=isset($news['status']) ? $news['status'] : '0'?>" />
    <input type="hidden" name="id" value="<?=isset($news['id']) ? $news['id'] : ''?>" />    
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($news['status']) ? $news['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/news')?>'" />
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
									<?if(isset($news['image']) && $news['image']) {?>
										<?=$news['image']?>&nbsp;&nbsp;<a href="javascript: void(0)" onclick="this.parentNode.innerHTML='<input type=\'file\' name=\'image\' size=\'40\'/>'">[Remove]</a>
									<?} else {?>
										<input type="file" name="image" size="40"/>&nbsp;<span class="required"><?if(isset($this->upload)) echo $this->upload->display_errors('', '')?></span>
									<?}?>
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="100%">Date<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="added_date" name="added_date" realname="Date" regexp="JSVAL_RX_DATE" required="true" maxlenght="10" value="<?=isset($news['added_date']) ? substr($news['added_date'], 0, 10) : ''?>" size="10" /> <a href="javascript: void(0)" onclick="create_calendar('added_date', false, true)"><img src="<?=base_url()?>images/admin/calendar.png" title="YYYY-MM-DD" border="0"></a>
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Categories<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
								<?
                                    foreach($categories_catalog as $c) {?>
                                        <span style="float-left"><input style="border: 0" type="checkbox" name="category_id[]" value="<?=$c['id']?>" <?=isset($news['categories']) && is_array($news['categories']) && in_array($c['id'], $news['categories']) ? 'checked' : ''?>"/>&nbsp;<?=$c['name']?>&nbsp;&nbsp;</span>
                                    <?}
                                ?>
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="100%">Title<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="title" name="title" realname="Title" regexp="" required="true" maxlenght="64" value="<?=isset($news['title']) ? $news['title'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Alias<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="alias" name="alias" realname="Alias" regexp="" required="true" maxlenght="64" value="<?=isset($news['alias']) ? $news['alias'] : ''?>" size="60" />
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="100%" valign="top">Summary<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<textarea style="width: 100%" cols="80" rows="3" id="summary" name="summary" realname="Summary" regexp="" required="true"><?=isset($news['summary']) ? $news['summary'] : ''?></textarea>
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%" valign="top">Description<span class="required">*</span>:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
                                    <?=form_fckeditor(array('name' => 'description', 'value' => (isset($news['description']) ? $news['description'] : ''), 'width' => '100%', 'height' => '500px'))?>
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Source:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="source_name" name="source_name" realname="Source" regexp="" required="false" maxlenght="64" value="<?=isset($news['source_name']) ? $news['source_name'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">Source link:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="source_url" name="source_url" realname="Source link" regexp="" required="false" maxlenght="64" value="<?=isset($news['source_url']) ? $news['source_url'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">SEO keywords:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="seo_keywords" name="seo_keywords" realname="SEO keywords" regexp="" required="false" maxlenght="128" value="<?=isset($news['seo_keywords']) ? $news['seo_keywords'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="100%">SEO description:</td>
                            </tr>
                            <tr>
								<td class="dataField" width="100%">
									<input type="text" id="seo_description" name="seo_description" realname="SEO description" regexp="" required="false" maxlenght="128" value="<?=isset($news['seo_description']) ? $news['seo_description'] : ''?>" size="120" />
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
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($news['status']) ? $news['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/news')?>'" />
			</td>
		</tr>
	</table>
</form>