<html>
	<?php include('includes/head_tag.php')?>
	<body>
		<?=header_with_tabs(isset($current_tab) ? $current_tab : null)?>
		<br/>
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<tbody>
				<tr>
					<td width="4px" valign="top"><!--<img border="0" src="<?=base_url()?>images/admin/hide.gif"/>--></td>
					<td width="160px" valign="top"><?=shortcuts(isset($current_tab) ? $current_tab : 'home')?></td>
					<td width="10px"><img border="0" src="<?=base_url()?>images/admin/blank.gif"/></td>
					<td style="padding-right: 10px; vertical-align: top;" width="*">
						<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tbody>
								<tr>
									<td><?=module_title($title_info)?></td>
								</tr>
								<tr>
									<td style="padding-top: 10px;">
										<?=$main_content?>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		<?php include('includes/footer.php')?>
	</body>
</html>