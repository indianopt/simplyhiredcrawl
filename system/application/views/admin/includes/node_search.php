<script type="text/javascript">
	function clear_form() {
		document.getElementsByName('name')[0].value = '';
		document.getElementsByName('status')[0].options.selectedIndex = 0;
	}
</script>
<!-- Search form -->
<ul class="tablist">
	<li class="status"><a class="current">Search</a></li>	
</ul>
<form name='search_form' method="post" action="<?=site_url('admin/node/search')?>">
	<input type="hidden" name="make_new_search" value="true"/>
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-top: 0px none; margin-bottom: 4px" class="tabForm">
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="dataLabel" noWrap>
							Name:</span>&nbsp;&nbsp;<input type="text" size="30" name="name" class="dataField" value="<?=isset($node_search_params['name']) ? $node_search_params['name'] : ''?>">
                            &nbsp;&nbsp;&nbsp;&nbsp;Status:&nbsp;&nbsp;
							<select name="status">
								<option value="" <?=(isset($node_search_params['status']) && $node_search_params['status'] == '') ? 'selected="selected"' : ''?>></option>
								<option value="0" <?=(isset($node_search_params['status']) && $node_search_params['status'] == '0') ? 'selected="selected"' : ''?>>Not yet pushlish</option>
								<option value="1" <?=(isset($node_search_params['status']) && $node_search_params['status'] == '1') ? 'selected="selected"' : ''?>>Publish</option>
                                <option value="2" <?=(isset($node_search_params['status']) && $node_search_params['status'] == '2') ? 'selected="selected"' : ''?>>Draft</option>
							</select>
						</td>
						<td align="right" width="100%">&nbsp;</td>
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
			<h3><img src="<?=base_url()?>/images/admin/h3Arrow.gif" width="11" height="11" border="0" />&nbsp;Nodes</h3>
		</td>
		<td width='100%'><img height='1' width='1' src='<?=base_url()?>/images/admin/blank.gif' alt=''></td>
		</tr>
</table>
<?=$data_grid?>
<!-- End search result -->