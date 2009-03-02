<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/member/edit/' . $member['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
    <tr>
		<td width="15%" class="tabDetailViewDL">Image:</td>
		<td width="85%" class="tabDetailViewDF">
            <img src="<?=base_url() . 'images/members/' . ($member['avatar_image'] != '' ? $member['avatar_image'] : 'doctor_default.jpg')?>" alt="<?=$member['first_name']?>" />
        </td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">First name:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['first_name']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Last name:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['last_name']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Gender:</td>
		<td width="85%" class="tabDetailViewDF"><?=gender_to_string($member['gender_enum'])?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Medical board:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['med_board_state']?>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">License number:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['lic_number']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Facility name :</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['facility_name']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Address :</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['address']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Address 2:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['address2']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">City:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['city']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">State/Province:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['state']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Postal code:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['postal_code']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Country:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['country']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Phone:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['phone']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Toll-free phone:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['toll_free']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Fax:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['fax']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Email:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['email']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Website:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['website']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Office hours:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['service_hours']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">Services provided:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['services_provided']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL">About me:</td>
		<td width="85%" class="tabDetailViewDF"><?=$member['about_me']?>&nbsp;</td>
	</tr>
</table>