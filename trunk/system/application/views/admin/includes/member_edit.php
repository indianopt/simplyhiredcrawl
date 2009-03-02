<form action="<?=site_url('admin/member/edit')?>" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this, 'error');">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding-bottom: 2px;">
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/member')?>'" />
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
								<td class="dataLabel" width="15%">Image:</td>
								<td class="dataField" width="85%">
									<?if(isset($member['avatar_image']) && $member['avatar_image']) {?>
										<?=$member['avatar_image']?>&nbsp;&nbsp;<a href="javascript: void(0)" onclick="this.parentNode.innerHTML='<input type=\'file\' name=\'avatar_image\' size=\'40\'/>'">[Remove]</a>
									<?} else {?>
										<input type="file" name="avatar_image" size="40"/>&nbsp;<span class="required"><?if(isset($this->upload)) echo $this->upload->display_errors('', '')?></span>
									<?}?>
								</td>
							</tr>
							<tr>
								<td class="dataLabel" width="15%">First name<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="hidden" name="id" value="<?=isset($member['id']) ? $member['id'] : ''?>" />   
									<input type="text" id="first_name" name="first_name" realname="First name" regexp="/^\w*$/" required="true" maxlenght="64" value="<?=isset($member['first_name']) ? $member['first_name'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Last name<span class="required">*</span>:</td>
								<td class="dataField" width="85%">
									<input type="text" id="last_name" name="last_name" realname="Last name" regexp="/^\w*$/" required="true" maxlenght="64" value="<?=isset($member['last_name']) ? $member['last_name'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Gender:</td>
								<td class="dataField" width="85%">
									<input style="border: 0" type="radio" name="gender_enum" value="1" <?=isset($member) && $member['gender_enum'] == 1 ? 'checked' : ''?> />&nbsp;Male&nbsp;&nbsp;<input style="border: 0" type="radio" name="gender_enum" value="0" <?=isset($member) && $member['gender_enum'] == 0 ? 'checked' : ''?> />&nbsp;Female
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Medical board:</td>
								<td class="dataField" width="85%">
                                    <input type="text" id="med_board_state" name="med_board_state" realname="Medical board" regexp="" required="false" maxlenght="64" value="<?=isset($member['med_board_state']) ? $member['med_board_state'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">License number:</td>
								<td class="dataField" width="85%">
									<input type="text" id="lic_number" name="lic_number" realname="License number" regexp="" required="false" maxlenght="64" value="<?=isset($member['lic_number']) ? $member['lic_number'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Facility name:</td>
								<td class="dataField" width="85%">
									<input type="text" id="facility_name" name="facility_name" realname="Facility name" regexp="" required="false" maxlenght="64" value="<?=isset($member['facility_name']) ? $member['facility_name'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Address:</td>
								<td class="dataField" width="85%">
                                    <input type="text" id="address" name="address" realname="Address" regexp="" required="false" maxlenght="128" value="<?=isset($member['address']) ? $member['address'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Address 2:</td>
								<td class="dataField" width="85%">
									<input type="text" id="address2" name="address2" realname="Address 2" regexp="" required="false" maxlenght="128" value="<?=isset($member['address2']) ? $member['address2'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">City:</td>
								<td class="dataField" width="85%">
									<input type="text" id="city" name="city" realname="City" regexp="" required="false" maxlenght="64" value="<?=isset($member['city']) ? $member['city'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">State/Province:</td>
								<td class="dataField" width="85%">
									<input type="text" id="state" name="state" realname="State/Province" regexp="" required="false" maxlenght="64" value="<?=isset($member['state']) ? $member['state'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Postal code:</td>
								<td class="dataField" width="85%">
									<input type="text" id="postal_code" name="postal_code" realname="Postal code" regexp="" required="false" maxlenght="64" value="<?=isset($member['postal_code']) ? $member['postal_code'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">City:</td>
								<td class="dataField" width="85%">
									<input type="text" id="city" name="city" realname="City" regexp="" required="false" maxlenght="64" value="<?=isset($member['city']) ? $member['city'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Country:</td>
								<td class="dataField" width="85%">
									<?=countries_dropdown(isset($member['country']) ? $member['country'] : '', 'name="country"')?>
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Phone:</td>
								<td class="dataField" width="85%">
									<input type="text" id="phone" name="phone" realname="Phone" regexp="" required="false" maxlenght="64" value="<?=isset($member['phone']) ? $member['phone'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Toll-free phone:</td>
								<td class="dataField" width="85%">
									<input type="text" id="toll_free" name="toll_free" realname="Toll-free phone" regexp="" required="false" maxlenght="64" value="<?=isset($member['toll_free']) ? $member['toll_free'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Fax:</td>
								<td class="dataField" width="85%">
									<input type="text" id="fax" name="fax" realname="Fax" regexp="" required="false" maxlenght="64" value="<?=isset($member['fax']) ? $member['fax'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Email:</td>
								<td class="dataField" width="85%">
									<input type="text" id="email" name="email" realname="Email" regexp="JSVAL_RX_EMAIL" required="false" maxlenght="64" value="<?=isset($member['email']) ? $member['email'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%">Website:</td>
								<td class="dataField" width="85%">
									<input type="text" id="website" name="website" realname="Website" regexp="" required="false" maxlenght="64" value="<?=isset($member['website']) ? $member['website'] : ''?>" size="60" />
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%" valign="top">Office Hours:</td>
								<td class="dataField" width="85%">
                                    <textarea id="service_hours" name="service_hours" realname="Office Hours" regexp="" required="false" cols="80" rows="2"><?=isset($member['service_hours']) ? $member['service_hours'] : ''?></textarea>
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%" valign="top">Services provided:</td>
								<td class="dataField" width="85%">
                                    <textarea id="services_provided" name="services_provided" realname="Services provided" regexp="" required="false" cols="80" rows="2"><?=isset($member['services_provided']) ? $member['services_provided'] : ''?></textarea>
								</td>
							</tr>
                            <tr>
								<td class="dataLabel" width="15%" valign="top">About me:</td>
								<td class="dataField" width="85%">
									<textarea id="about_me" name="about_me" realname="About me" regexp="" required="false" cols="80" rows="2"><?=isset($member['about_me']) ? $member['about_me'] : ''?></textarea>
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
				<input class="button" value="  Save  " type="submit" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="document.location='<?=site_url('admin/member')?>'" />
			</td>
		</tr>
	</table>
</form>