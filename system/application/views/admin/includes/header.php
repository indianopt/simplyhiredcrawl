<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td colspan="2">
			<table class="headerBg" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="100%">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td class="logo" rowspan="2" valign="top" width="80%">
									<table border="0" cellpadding="3" cellspacing="0">
										<tr>
											<td align="center" style="color: #B60000; font-weight: bold;"><b>GiaoDN CMS Control Panel</b></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
                                <?$user = $this->session->userdata('user');?>
								<td class="welcome" id="welcome" style="border-left: 1px solid rgb(221, 221, 221);" nowrap="nowrap" width="80%">Welcome <b><?=isset($user) && $user != null ? $user['name'] : ''?></b></td>
								<td class="myArea" nowrap="nowrap"><ul class="subTabs"><li><a href="<?=site_url('admin/user/change_password')?>">Change password</a></li></ul></td>
                                <td class="myArea" nowrap="nowrap"><ul class="subTabs"><li><a href="<?=site_url('admin/logout')?>">Logout</a></li></ul></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				 <tr>
					<td colspan="3">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td style="padding-left: 14px;" class="otherTabRight">&nbsp;</td>
								<?
									foreach($tabs as $key => $val) {
										$tab_class = ($key == $current_tab) ? 'currentTab' : 'otherTab';
										?>
											<td>
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td class="<?=$tab_class?>Left"><img src="<?=base_url()?>images/admin/blank.gif" alt="Home" border="0" height="25" width="5"></td>
														<td class="<?=$tab_class?>" nowrap="nowrap"><a class="<?=$tab_class?>Link" href="<?=$val['url']?>"><?=$val['name']?></a></td>
														<td class="<?=$tab_class?>Right"><img src="<?=base_url()?>images/admin/blank.gif" alt="Home" border="0" height="25" width="5"></td>
													</tr>
												</table>
											</td>
										<?
									}
								?>
								<td class="tabRow" width="100%"><img src="<?=base_url()?>images/admin/blank.gif" alt="" border="0" height="1" width="1"></td>
							</tr>
						</table>
					 </td>
				</tr>
				<tr>
					<td class="subTabBar" colspan="3">
						<table border="0" cellpadding="0" cellspacing="0" height="20" width="100%">
							<tr>
								<td id="subtabs" width="100%">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!--
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td style="padding-top: 7px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td style="padding-left: 7px;"><img border="0" src="<?=base_url()?>images/admin/company_logo.jpg"/></td>
							<td align="right" valign="middle" style="padding-right: 7px;" class="myArea" nowrap="nowrap">
								<a class="myAreaLink" href="<?=site_url('admin/account/my_account')?>">Tài khoản của tôi</a> | <a class="myAreaLink" href="<?=site_url('admin/account/my_account')?>">Thoát</a>
								<br/>
								<img border="0" src="<?=base_url()?>images/admin/vietgift_logo.jpg"/>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td style="padding-top: 4px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr height="20">
					    	<td style="padding-left: 7px; background-image: url(<?=base_url()?>images/admin/emptyTabSpace.gif);">&nbsp;</td>
					    	<?
					    		foreach($tabs as $key => $val) {
					    			$image_tab_prefix = ($key == $current_tab) ? 'currentTab' : 'otherTab';
					    			$tab_text_class = ($key == $current_tab) ? 'currentTab' : 'otherTab';
					    			?>
					    				<td>
											<table style="background-color: rgb(229, 229, 229);" border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
													<tr height="20">
														<td style="background-image: url(<?=base_url()?>images/admin/<?=$image_tab_prefix?>_left.gif);"><img src="<?=base_url()?>images/admin/blank_002.gif" alt="Contacts" border="0" height="1" width="8"></td>
													    <td style="background-image: url(<?=base_url()?>images/admin/<?=$image_tab_prefix?>_middle.gif);" class="currentTab" nowrap="nowrap"><a class="<?=$tab_text_class?>" href="<?=$val['url']?>"><?=$val['name']?></a></td>
														<td style="background-image: url(<?=base_url()?>images/admin/<?=$image_tab_prefix?>_right.gif);"><img src="<?=base_url()?>images/admin/blank_002.gif" alt="<?=$val['name']?>" border="0" height="1" width="8"></td>
														<td style="background-image: url(<?=base_url()?>images/admin/emptyTabSpace.gif);"></td>
														<td style="background-image: url(<?=base_url()?>images/admin/emptyTabSpace.gif);"><img src="<?=base_url()?>images/admin/blank_002.gif" alt="" border="0" height="1" width="1"></td>
													</tr>
												</tbody>
											</table>
										</td>		
					    			<?
					    		}
					    	?>	
							<td style="background-image: url(<?=base_url()?>images/admin/emptyTabSpace.gif);" width="100%"><img src="<?=base_url()?>images/admin/blank_002.gif" alt="" border="0" height="1" width="1"></td>
						</tr>
						<tr>
						  	<td class="welcome" height="24" colspan="100%">Welcome <?=isset($user) && $user != null ? $user['name'] : ''?></td>			
						</tr>
					</tbody>
				</table>	
			</td>
		</tr>
	</tbody>
</table>
-->