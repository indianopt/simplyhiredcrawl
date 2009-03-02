<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;">
			<input class="button" value="  Edit  " type="submit" onclick="window.location.href='<?=site_url('admin/cafeshop/image/' . $cafeshop['id'] . '/edit/' . $image['id'])?>'" /> <input class="button" name="button" value="  Cancel  " type="button" onclick="history.back();" />
		</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Image:</td>
		<td width="85%" class="tabDetailViewDF">
            <?
                if($image['image'] != '') {
                    echo '<img src="' . base_url() . '/uploads/item_image_gallery/' . $image['image'] . '">';
                }
                else {
                    echo '&nbsp;';   
                }
            ?>
        </td>
	</tr>
	<tr>
		<td width="15%" class="tabDetailViewDL">Title:</td>
		<td width="85%" class="tabDetailViewDF"><?=$image['title']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Added date:</td>
		<td width="85%" class="tabDetailViewDF"><?=$image['added_date']?>&nbsp;</td>
	</tr>
    <tr>
		<td width="15%" class="tabDetailViewDL" valign="top">Last updated:</td>
		<td width="85%" class="tabDetailViewDF"><?=$image['last_updated']?>&nbsp;</td>
	</tr>
</table>