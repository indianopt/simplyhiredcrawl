<table width='100%' cellpadding='0' cellspacing='0' border='0' class='moduleTitle'>
	<tr>
		<?if(null != $icon_image) {?>
			<td valign='top'><img src='<?=base_url()?>images/admin/<?=$icon_image?>' width='16' height='16' border='0' style='margin-top: 3px;' alt='Contacts'>&nbsp;</td>
		<?}?>
		<td width='100%'><h2><?=$title?></h2></td>
		<td valign='top' align='right' nowrap style='padding-top:3px; padding-left: 5px;'>
			<?if ($enabled_print) {?>
				<a href='#' class='utilsLink'><img src='<?=base_url()?>images/admin/print.gif' width='13' height='13' alt='Print' border='0' align='absmiddle'></a>&nbsp;<a href='#' class='utilsLink'>Print</a>&nbsp;
			<?}?>
			<?if ($enabled_help) {?>
				<a href="#" class='utilsLink'><img src='<?=base_url()?>images/admin/help.gif' width='13' height='13' alt='Help' border='0' align='absmiddle'></a>&nbsp;<A href="#" class='utilsLink'>Help</a>
			<?}?>
		</td>
	</tr>
</table>