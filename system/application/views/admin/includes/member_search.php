<script type="text/javascript">
	function clear_form() {
		document.getElementsByName('first_name')[0].value = '';
        document.getElementsByName('last_name')[0].value = '';
		document.getElementsByName('email')[0].value = '';
        document.getElementsByName('is_active')[0].options.selectedIndex = 0;
        document.getElementsByName('member_category_enum')[0].options.selectedIndex = 0;
	}
</script>
<!-- Search form -->
<ul class="tablist">
	<li class="active"><a class="current">Search</a></li>	
</ul>
<form name='search_form' method="post" action="<?=site_url('admin/member/search')?>">
	<input type="hidden" name="make_new_search" value="true"/>
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-top: 0px none; margin-bottom: 4px" class="tabForm">
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td>
                            <table border="0" cellpadding="2" cellspacing="0" width="100%">
        						<tbody>
        							<tr>
        								<td class="dataLabel" width="15%">First name:</td>
        								<td class="dataField" width="35%"><input type="text" size="30" name="first_name" class="dataField" value="<?=isset($member_search_params['first_name']) ? $member_search_params['first_name'] : ''?>"></td>
                                        <td class="dataLabel" width="15%">Last name:</td>
        								<td class="dataField" width="35%"><input type="text" size="30" name="last_name" class="dataField" value="<?=isset($member_search_params['last_name']) ? $member_search_params['last_name'] : ''?>"></td>
        							</tr>
                                    <tr>
        								<td class="dataLabel" width="15%">Email:</td>
        								<td class="dataField" width="35%"><input type="text" size="30" name="email" class="dataField" value="<?=isset($member_search_params['email']) ? $member_search_params['email'] : ''?>"></td>
                                        <td class="dataLabel" width="15%">Member type:</td>
        								<td class="dataField" width="35%">
                                            <select name="member_category_enum">
                                                <option value=""></option>
                                                <option value="1" <?=isset($member_search_params['member_category_enum']) && $member_search_params['member_category_enum'] == 1 ? 'selected' : ''?>>Doctor/Physician</option>
                                                <option value="2" <?=isset($member_search_params['member_category_enum']) && $member_search_params['member_category_enum'] == 2 ? 'selected' : ''?>>Healthnews.Org User</option>
                                            </select>
                                        </td>
        							</tr>
                                    <tr>
                                        <td class="dataLabel" width="15%">Status:</td>
        								<td class="dataField" width="85%" colspan="3">
                                            <select name="is_active">
                                                <option value=""></option>
                                                <option value="1" <?=isset($member_search_params['is_active']) && $member_search_params['is_active'] == '1' ? 'selected' : ''?>>Active</option>
                                                <option value="0" <?=isset($member_search_params['is_active']) && $member_search_params['is_active'] == '0' ? 'selected' : ''?>>Inactive</option>
                                            </select>
                                        </td>
        							</tr>
                                </tbody>
                            </table>    
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<input class='button' type='submit' name='button' value=' Search '/>&nbsp;<input class='button' type='button' name='clear' value=' Clear ' onclick="clear_form();"/>
</form>
<!-- End search form -->

<!-- Search result -->
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td nowrap style="padding-top: 10px;"">
			<h3><img src="<?=base_url()?>/images/admin/h3Arrow.gif" width="11" height="11" border="0" />&nbsp;Results</h3>
		</td>
		<td width='100%'><img height='1' width='1' src='<?=base_url()?>/images/admin/blank.gif' alt=''></td>
		</tr>
</table>
<?=$data_grid?>
<!-- End search result -->