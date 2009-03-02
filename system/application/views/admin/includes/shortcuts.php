<table class="leftColumnModuleHead" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<th class="leftColumnModuleName" width="100%">Shortcuts</th>
	</tr>
</table>
<ul class="subMenu" id="subMenu">
	<?foreach ($shortcuts as $s) {?>
		<li><a href="<?=$s['url']?>"><img src="<?=base_url()?>images/admin/<?=$s['icon_image']?>" align="absmiddle" border="0" height="16" width="16">&nbsp;<?=$s['name']?></a></li>
	<?}?>
</ul>