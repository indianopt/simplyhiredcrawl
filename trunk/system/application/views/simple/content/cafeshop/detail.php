<div class="left">
    <h2><?=stripslashes($cafeshop['name'])?></h2>
    <p><b><?=stripslashes($cafeshop['summary'])?></b></p>
    <br />
    <p><?=stripslashes($cafeshop['description'])?></p>
    <br />
	<?if($cafeshop['source']) {?>
    	<p>Theo <?=stripslashes($cafeshop['source'])?></p>
	<?}?>
    <?if(count($item_images) > 0) {?>
        <h3>Gallery</h3>
        <center><iframe src="<?=site_url('cafeshop/gallery/' . $cafeshop['alias'])?>" width="485" height="355" frameborder="0" align="middle" scrolling="no"></iframe></center>
    <?}?>        
    <?if(count($relate_cafeshops) > 0) {?>
        <h3>Quán cùng phong cách</h3>
        <?foreach($relate_cafeshops as $it) {?>
            <a href="<?=site_url('cafeshop/detail/' . $it['alias'])?>"><b><?=stripslashes($it['name'])?></b></a><br />
        <?}?>
    <?}?>
</div>
<div class="right">
        <div class="right_articles">
		    <b>Phong cách:</b> <?=cafeshop_categories($cafeshop['id'], '; ')?><br />
			<b>Địa chỉ:</b> <?=build_address($cafeshop['province_name'], $cafeshop['district_name'], $cafeshop['ward'], $cafeshop['street'])?><br />
			<b>Điện thoại:</b> <?=$cafeshop['phone']?><br />
			<b>Fax:</b> <?=$cafeshop['fax']?><br />
			<b>Email:</b> <?=$cafeshop['email']?><br />
			<b>Website:</b> <?=$cafeshop['website']?><br />
			<b>Số chỗ:</b> <?=$cafeshop['number_of_seats'] ? $cafeshop['number_of_seats'] : 'Chưa cập nhật'?><br />
			<b>Giờ phục vụ:</b> <?=($cafeshop['open_time_from'] != '' && $cafeshop['open_time_to'] != '') ? show_open_time($cafeshop['open_time_from']) . ' - ' . show_open_time($cafeshop['open_time_to']) : ''?><br />
			<b>Giá trung bình:</b> <?=$cafeshop['min_price'] . ' - ' . $cafeshop['max_price']?><br />
			<b>Đặt chỗ trước:</b> <?=$cafeshop['option_accept_booking'] == 1 ? 'Chấp nhận' : ($cafeshop['option_accept_booking'] == 0 ? 'Không chấp nhận' : 'Chưa cật nhật')?><br />
			<b>Dịch vụ khác:</b> <?=$cafeshop['option_free_parking'] == 1 ? 'Gửi xe miễn phí' : ''?><?=$cafeshop['option_free_parking'] == 1 ? '; Wifi miễn phí' : ''?><?=$cafeshop['option_air_conditioner'] == 1 ? '; Máy lạnh' : ''?><?=$cafeshop['option_live_music'] == 1 ? '; Nhạc sống' : ''?><?=$cafeshop['option_breakfast'] == 1 ? '; Điểm tâm' : ''?><?=$cafeshop['option_lunch'] == 1 ? '; Cơm trưa' : ''?><?=$cafeshop['option_club_activities'] == 1 ? '; Liên hoan, họp nhóm' : ''?><?=$cafeshop['option_football'] == 1 ? '; Chiếu bóng đá' : ''?><?=$cafeshop['option_fashion'] == 1 ? '; Trình diễn thời trang' : ''?><br />
			<b>Cập nhật:</b> <?=$cafeshop['last_updated']?><br />
        </div>
</div>