<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/cafeshop/edit/' . $cafeshop['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
	<tr>
        <td width="15%" class="tabDetailViewDL">Category:</td>
		<td colspan="3" width="35%" class="tabDetailViewDF"><?=cafeshop_categories($cafeshop['id'])?>&nbsp;</td>
	</tr>
    <tr>
        <td width="15%" class="tabDetailViewDL">Name:</td>
		<td width="35%" class="tabDetailViewDF"><?=stripslashes($cafeshop['name'])?>&nbsp;</td>
        <td width="15%" class="tabDetailViewDL">Alias:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['alias']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Province/City:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['province_name']?>&nbsp;</td>
        <td width="15%" class="tabDetailViewDL">District:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['district_name']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Ward:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['ward']?>&nbsp;</td>
        <td width="15%" class="tabDetailViewDL">Street:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['street']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Contact phone:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['phone']?>&nbsp;</td>
        <td width="15%" class="tabDetailViewDL">Fax:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['fax']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Contact email:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['email']?>&nbsp;</td>
        <td width="15%" class="tabDetailViewDL">Website:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['website']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Number of seats:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['number_of_seats']?>&nbsp;</td>
        <td width="15%" class="tabDetailViewDL">Average price(min -  max):</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['min_price'] . ' - ' . $cafeshop['max_price']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Open time:</td>
		<td width="35%" class="tabDetailViewDF"><?=($cafeshop['open_time_from'] != '' && $cafeshop['open_time_to'] != '') ? show_open_time($cafeshop['open_time_from']) . ' - ' . show_open_time($cafeshop['open_time_to']) : ''?>&nbsp;</td>
        <td width="15%" class="tabDetailViewDL">Number views:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['number_views']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Other options:</td>
		<td width="35%" class="tabDetailViewDF">
            <input type="checkbox" disabled="disabled" name="option_accept_booking" <?=(isset($cafeshop['option_accept_booking']) && $cafeshop['option_accept_booking'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Acception booking<br />
            <input type="checkbox" disabled="disabled" name="option_free_parking" <?=(isset($cafeshop['option_free_parking']) && $cafeshop['option_free_parking'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Free parking<br />
            <input type="checkbox" disabled="disabled" name="option_free_wifi" <?=(isset($cafeshop['option_free_wifi']) && $cafeshop['option_free_wifi'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Free wifi<br />
            <input type="checkbox" disabled="disabled" name="option_breakfast" <?=(isset($cafeshop['option_breakfast']) && $cafeshop['option_breakfast'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Breakfast<br />
            <input type="checkbox" disabled="disabled" name="option_club_activities" <?=(isset($cafeshop['option_club_activities']) && $cafeshop['option_club_activities'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Club activities<br />
        </td>
        <td colspan="2" width="50%" class="tabDetailViewDF">
            <input type="checkbox" disabled="disabled" name="option_air_conditioner" <?=(isset($cafeshop['option_air_conditioner']) && $cafeshop['option_air_conditioner'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Air conditioner<br />
            <input type="checkbox" disabled="disabled" name="option_live_music" <?=(isset($cafeshop['option_live_music']) && $cafeshop['option_live_music'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Sing to gether / Live music<br />
            <input type="checkbox" disabled="disabled" name="option_lunch" <?=(isset($cafeshop['option_lunch']) && $cafeshop['option_lunch'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Lunch<br />
            <input type="checkbox" disabled="disabled" name="option_football" <?=(isset($cafeshop['option_football']) && $cafeshop['option_football'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Football show<br />
            <input type="checkbox" disabled="disabled" name="option_fashion" <?=(isset($cafeshop['option_fashion']) && $cafeshop['option_fashion'] == 1) ? 'checked="checked"' : ''?> value="1" />&nbsp;Fashion show
        </td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Summary:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=stripslashes($cafeshop['summary'])?>&nbsp;</td>
	</tr>
    <!--
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Description:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=stripslashes($cafeshop['description'])?>&nbsp;</td>
	</tr>
    -->
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Source:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=stripslashes($cafeshop['source'])?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Added date:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['added_date']?>&nbsp;</td>
		<td width="15%" class="tabDetailViewDL">Last updated:</td>
		<td width="35%" class="tabDetailViewDF"><?=$cafeshop['last_updated']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Status:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=status_2_string($cafeshop['status'])?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">SEO keywords:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$cafeshop['seo_keywords']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">SEO description:</td>
		<td colspan="3" width="85%" class="tabDetailViewDF"><?=$cafeshop['seo_description']?>&nbsp;</td>
	</tr>
</table>

<table id="gallery" width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td nowrap style="padding-top: 10px;"">
			<h3><img src="<?=base_url()?>/images/admin/h3Arrow.gif" width="11" height="11" border="0" />&nbsp;Gallery</h3>
		</td>
		<td width='100%'><img height='1' width='1' src='<?=base_url()?>/images/admin/blank.gif' alt=''></td>
    </tr>
</table>
<form action="<?=site_url('admin/cafeshop/upload_image/' . $cafeshop['id'])?>" method="post" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error')" onsubmit="return validateStandard(this, 'error')">
    <table>
        <?if(isset($this->upload)) {?>
            <tr>
                <td colspan="3">
                    <span class="required"><?=$this->upload->display_errors('', '')?></span>
            </tr>
        <?}?>
        <tr>
            <td class="dataLabel">Title<span class="required">*</span>:</td>
            <td class="dataField">
                <input type="text" id="title" name="title" realname="Title" regexp="" required="true" maxlenght="128" value="" size="30" />
            </td>
            <td class="dataLabel">Image<span class="required">*</span>:</td>
            <td class="dataField">
                <input type="file" name="image" size="40"/> <input class='button' type='submit' name='upload' value=' Upload '/>
            </td>
        </tr>
    </table>
</form>
<?=$gallery?>