<?=generate_populate_districts_js('district_id')?>
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
<form action="<?=site_url('admin/cafeshop/edit')?>" method="post" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error') && validateCategories();">
    <input type="hidden"name="status"  value="<?=isset($cafeshop['status']) ? $cafeshop['status'] : '0'?>" />
    <input type="hidden" name="id" value="<?=isset($cafeshop['id']) ? $cafeshop['id'] : ''?>" />
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($cafeshop['status']) ? $cafeshop['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/cafeshop')?>'" />
			</td>
			<td align="right" nowrap="nowrap"><span class="required">*</span> Indicate required fields</td>
		</tr>
	</table>
	
	<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<?if($this->validation->error_string != '') {?>
            <tr>
                <td colspan="4" style="color: red"><?=$this->validation->error_string?></td>
            </tr>
        <?}?>
        <tr>
			<td class="dataLabel" width="15%">Image:</td>
            <td colspan="3" class="dataField" width="85%">
				<?if(isset($cafeshop['image']) && $cafeshop['image']) {?>
					<?=$cafeshop['image']?>&nbsp;&nbsp;<a href="javascript: void(0)" onclick="this.parentNode.innerHTML='<input type=\'file\' name=\'image\' size=\'40\'/>'">[Remove]</a>
				<?} else {?>
					<input type="file" name="image" size="40"/>&nbsp;<span class="required"><?if(isset($this->upload)) echo $this->upload->display_errors('', '')?></span>
				<?}?>
			</td>
        </tr>
        <tr>
			<td class="dataLabel" width="15%">Category<span class="required">*</span>:</td>
            <td colspan="3" class="dataField" width="85%">
                <?
                    foreach($categories_catalog as $c) {?>
                        <span style="float-left"><input style="border: 0" type="checkbox" name="category_id[]" value="<?=$c['id']?>" <?=isset($cafeshop['categories']) && is_array($cafeshop['categories']) && in_array($c['id'], $cafeshop['categories']) ? 'checked' : ''?>"/>&nbsp;<?=$c['name']?>&nbsp;&nbsp;</span>
                    <?}
                ?>    
            </td>
        </tr>
        <tr>
			<td class="dataLabel" width="15%">Name<span class="required">*</span>:</td>
			<td class="dataField" width="35%"><input type="text" id="name" name="name" realname="Name" regexp="" required="true" maxlenght="128" value="<?=isset($cafeshop['name']) ? stripslashes($cafeshop['name']) : ''?>" size="40" /></td>
            <td class="dataLabel" width="15%">Alias<span class="required">*</span>:</td>
			<td class="dataField" width="35%"><input type="text" id="alias" name="alias" realname="Alias" regexp="" required="true" maxlenght="128" value="<?=isset($cafeshop['alias']) ? $cafeshop['alias'] : ''?>" size="40" /></td>
        </tr>
        <tr>
            <td class="dataLabel" width="15%">Province/City<span class="required">*</span>:</td>
			<td class="dataField" width="35%"><?=provinces_dropdown(isset($cafeshop['province_id']) ? $cafeshop['province_id'] : '', 'id="province_id" name="province_id" realname="Province/City" required="true" exclude="-1" style="width: 200px"; onchange="populate_districts(this)"')?></td>
            <td class="dataLabel" width="15%">District<span class="required">*</span>:</td>
			<td class="dataField" width="35%"><?=districts_dropdown(isset($cafeshop['district_id']) ? $cafeshop['district_id'] : '', 'id="district_id" name="district_id" realname="District" required="true" exclude="-1" style="width: 200px";', isset($cafeshop['province_id']) ? $cafeshop['province_id'] : '')?></td>
		</tr>
        <tr>
            <td class="dataLabel" width="15%">Ward<span class="required">*</span>:</td>
            <td class="dataField" width="35%"><input type="text" id="ward" name="ward" realname="Ward" regexp="" required="true" maxlenght="128" value="<?=isset($cafeshop['ward']) ? $cafeshop['ward'] : ''?>" size="40" /></td>
            <td class="dataLabel" width="15%">Street<span class="required">*</span>:</td>
			<td class="dataField" width="35%"><input type="text" id="street" name="street" realname="Street" regexp="" required="true" maxlenght="128" value="<?=isset($cafeshop['street']) ? $cafeshop['street'] : ''?>" size="40" /></td>
		</tr>
        <tr>
			<td class="dataLabel" width="15%">Contact phone:</td>
			<td class="dataField" width="35%"><input type="text" id="phone" name="phone" realname="Contact phone" regexp="" required="false" maxlenght="64" value="<?=isset($cafeshop['phone']) ? $cafeshop['phone'] : ''?>" size="20" /></td>
			<td class="dataLabel" width="15%">Fax:</td>
			<td class="dataField" width="35%"><input type="text" id="fax" name="fax" realname="Fax" regexp="" required="false" maxlenght="128" value="<?=isset($cafeshop['fax']) ? $cafeshop['fax'] : ''?>" size="40" /></td>
		</tr>
        <tr>
			<td class="dataLabel" width="15%">Website:</td>
			<td class="dataField" width="35%"><input type="text" id="website" name="website" realname="Website" regexp="" required="false" maxlenght="64" value="<?=isset($cafeshop['website']) ? $cafeshop['website'] : ''?>" size="20" /></td>
			<td class="dataLabel" width="15%">Contact email:</td>
			<td class="dataField" width="35%"><input type="text" id="email" name="email" realname="Contact email" regexp="JSVAL_RX_EMAIL" required="false" maxlenght="128" value="<?=isset($cafeshop['email']) ? $cafeshop['email'] : ''?>" size="40" /></td>
		</tr>
        <tr>
			<td class="dataLabel" width="15%">Number of seats:</td>
            <td class="dataField" width="35%"><input type="text" id="number_of_seats" name="number_of_seats" realname="Number of seats" regexp="JSVAL_RX_INT" required="false" maxlenght="8" value="<?=isset($cafeshop['number_of_seats']) ? $cafeshop['number_of_seats'] : ''?>" size="10" /></td>
			<td class="dataLabel" width="15%">Average price(min - max):</td>
            <td class="dataField" width="35%"><input type="text" id="min_price" name="min_price" realname="Min price" regexp="JSVAL_RX_MONEY" required="true" maxlenght="10" value="<?=isset($cafeshop['min_price']) ? $cafeshop['min_price'] : ''?>" size="10" /> - <input type="text" id="max_price" name="max_price" realname="Max price" regexp="JSVAL_RX_MONEY" required="true" maxlenght="10" value="<?=isset($cafeshop['max_price']) ? $cafeshop['max_price'] : ''?>" size="10" /></td>
        </tr>
        <tr>
			<td class="dataLabel" width="15%">Open time:</td>
            <td colspan="3" class="dataField" width="85%"><?=open_time_dropdown(isset($cafeshop['open_time_from']) ? $cafeshop['open_time_from'] : '', 'id="open_time_from" name="open_time_from" realname="Open time" required="false" exclude="-1"', 'AM')?> - <?=open_time_dropdown(isset($cafeshop['open_time_to']) ? $cafeshop['open_time_to'] : '', 'id="open_time_to" name="open_time_to" realname="Open time" required="false" exclude="-1"', 'PM')?></td>
        </tr>
        <tr>
			<td class="dataLabel" width="15%" valign="top">Other options:</td>
            <td class="dataField" width="35%">
                <input type="checkbox" name="option_accept_booking" <?=(isset($cafeshop['option_accept_booking']) && $cafeshop['option_accept_booking'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Acception booking<br />
                <input type="checkbox" name="option_free_parking" <?=(isset($cafeshop['option_free_parking']) && $cafeshop['option_free_parking'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Free parking<br />
                <input type="checkbox" name="option_free_wifi" <?=(isset($cafeshop['option_free_wifi']) && $cafeshop['option_free_wifi'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Free wifi<br />
                <input type="checkbox" name="option_breakfast" <?=(isset($cafeshop['option_breakfast']) && $cafeshop['option_breakfast'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Breakfast<br />
                <input type="checkbox" name="option_club_activities" <?=(isset($cafeshop['option_club_activities']) && $cafeshop['option_club_activities'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Club activities<br />
            </td>
            <td colspan="2" class="dataField" width="75%">
                <input type="checkbox" name="option_air_conditioner" <?=(isset($cafeshop['option_air_conditioner']) && $cafeshop['option_air_conditioner'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Air conditioner<br />
                <input type="checkbox" name="option_live_music" <?=(isset($cafeshop['option_live_music']) && $cafeshop['option_live_music'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Sing to gether / Live music<br />
                <input type="checkbox" name="option_lunch" <?=(isset($cafeshop['option_lunch']) && $cafeshop['option_lunch'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Lunch<br />
                <input type="checkbox" name="option_football" <?=(isset($cafeshop['option_football']) && $cafeshop['option_football'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Football show<br />
                <input type="checkbox" name="option_fashion" <?=(isset($cafeshop['option_fashion']) && $cafeshop['option_fashion'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Fashion show
            </td>
        </tr>
        <tr>
			<td colspan="4" class="dataLabel" width="100%" valign="top">Summary<span class="required">*</span>:</td>
        </tr>
        <tr>
    		<td colspan="4" class="dataField" width="100%">
    			<textarea style="width: 100%" cols="80" rows="3" id="summary" name="summary" realname="Summary" regexp="" required="true"><?=isset($cafeshop['summary']) ? stripslashes($cafeshop['summary']) : ''?></textarea>
    		</td>
    	</tr>
		<tr>
			<td colspan="4" class="dataLabel" width="100%" valign="top">Description<span class="required">*</span>:</td>
        </tr>
        <tr>
			<td colspan="4" class="dataField" width="100%">
				<?=form_fckeditor(array('name' => 'description', 'value' => (isset($cafeshop['description']) ? stripslashes($cafeshop['description']) : ''), 'width' => '100%', 'height' => '500px'))?>
			</td>
		</tr>
        <tr>
			<td colspan="4" class="dataLabel" width="100%">Source:</td>
        </tr>
        <tr>
			<td colspan="4" class="dataField" width="100%">
				<input type="text" id="source" name="source" realname="Source" regexp="" required="false" maxlenght="128" value="<?=isset($cafeshop['source']) ? $cafeshop['source'] : ''?>" size="120" />
			</td>
		</tr>
        <tr>
			<td colspan="4" class="dataLabel" width="100%">SEO keywords:</td>
        </tr>
        <tr>
			<td colspan="4" class="dataField" width="100%">
				<input type="text" id="seo_keywords" name="seo_keywords" realname="SEO keywords" regexp="" required="false" maxlenght="128" value="<?=isset($cafeshop['seo_keywords']) ? $cafeshop['seo_keywords'] : ''?>" size="120" />
			</td>
		</tr>
        <tr>
			<td colspan="4" class="dataLabel" width="100%">SEO description:</td>
        </tr>
        <tr>
			<td colspan="4" class="dataField" width="100%">
				<input type="text" id="seo_description" name="seo_description" realname="SEO description" regexp="" required="false" maxlenght="256" value="<?=isset($cafeshop['seo_description']) ? $cafeshop['seo_description'] : ''?>" size="120" />
			</td>
		</tr>
		</tbody>
	</table>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-top: 2px;">
				<input class="button" value="  Save  " type="submit" onclick="this.form.status.value='<?=isset($cafeshop['status']) ? $cafeshop['status'] : '0'?>'"/> <input class="button" value="  Save & Publish  " type="submit" onclick="this.form.status.value='1'"/> <input class="button" value="  Save as Draft " type="submit" onclick="this.form.status.value='2'"/> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/cafeshop')?>'" />
			</td>
		</tr>
	</table>
</form>