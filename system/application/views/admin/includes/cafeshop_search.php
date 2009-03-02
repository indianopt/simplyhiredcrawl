<script type="text/javascript">
	function clear_form() {
		document.getElementsByName('name')[0].value = '';
        document.getElementsByName('province_id')[0].options.selectedIndex = 0;
        document.getElementsByName('category_id')[0].options.selectedIndex = 0;
        document.getElementsByName('district_id')[0].options.selectedIndex = 0;
        document.getElementsByName('province_id')[0].options.selectedIndex = 0;
		document.getElementsByName('status')[0].options.selectedIndex = 0;
	}
</script>
<?=generate_populate_districts_js('district_id')?>
<!-- Search form -->
<ul class="tablist">
	<li class="status"><a class="current">Search</a></li>	
</ul>
<form name='search_form' method="post" action="<?=site_url('admin/cafeshop/search')?>">
	<input type="hidden" name="make_new_search" value="true"/>
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-top: 0px none; margin-bottom: 4px" class="tabForm">
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
            			<td class="dataLabel">Name:</td>
                        <td class="dataField"><input type="text" size="20" name="name" class="dataField" value="<?=isset($cafeshop_search_params['name']) ? $cafeshop_search_params['name'] : ''?>" /></td>
                        <td class="dataLabel">Category:</td>
                        <td colspan="3" class="dataField"><?=categories_dropdown('cafeshop', isset($cafeshop_search_params['category_id']) ? $cafeshop_search_params['category_id'] : '', 'id="category_id" name="category_id" realname="Category" required="true" exclude="-1"')?></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Province:</td>
                        <td class="dataField"><?=provinces_dropdown(isset($cafeshop_search_params['province_id']) ? $cafeshop_search_params['province_id'] : '', 'id="province_id" name="province_id" realname="Province/City" required="true" exclude="-1" onchange="populate_districts(this)"')?></td>
                        <td class="dataLabel">District:</td>
                        <td class="dataField"><?=districts_dropdown(isset($cafeshop_search_params['district_id']) ? $cafeshop_search_params['district_id'] : '', 'id="district_id" name="district_id" realname="District" required="true" exclude="-1"', isset($cafeshop_search_params['province_id']) ? $cafeshop_search_params['province_id'] : '')?></td>
            			<td class="dataLabel">Status:</td>
            			<td class="dataField">
                            <select name="status">
								<option value="" <?=(isset($cafeshop_search_params['status']) && $cafeshop_search_params['status'] == '') ? 'selected="selected"' : ''?>></option>
								<option value="0" <?=(isset($cafeshop_search_params['status']) && $cafeshop_search_params['status'] == '0') ? 'selected="selected"' : ''?>>Not yet pushlish</option>
								<option value="1" <?=(isset($cafeshop_search_params['status']) && $cafeshop_search_params['status'] == '1') ? 'selected="selected"' : ''?>>Publish</option>
                                <option value="2" <?=(isset($cafeshop_search_params['status']) && $cafeshop_search_params['status'] == '2') ? 'selected="selected"' : ''?>>Draft</option>
							</select>
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
			<h3><img src="<?=base_url()?>/images/admin/h3Arrow.gif" width="11" height="11" border="0" />&nbsp;News</h3>
		</td>
		<td width='100%'><img height='1' width='1' src='<?=base_url()?>/images/admin/blank.gif' alt=''></td>
		</tr>
</table>
<?=$data_grid?>
<!-- End search result -->