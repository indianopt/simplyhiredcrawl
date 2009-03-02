<div>
    <div class="float_right">
        <a href="<?=site_url('send_2_friends/index/news/' . $news['alias'])?>" title="Gửi cho bạn bè" onclick="Modalbox.show(this.href, {title: this.title, width: 540}); return false;"><?=image('email.gif', 'Gửi cho bạn bè', array('border' => 0))?> Gửi cho bạn bè</a>&nbsp;&nbsp;&nbsp;&nbsp;<a rel="nofollow" href="<?=site_url('news/print_version/' . $news['alias'])?>" target="_blank"><?=image('print.gif', 'Bản in', array('border' => 0))?> Bản in</a>
    </div>
    <h2 class="clear_both"><?=$news['title']?></h2>
    <p><b><?=$news['summary']?></b></p>
    <p><?=$news['description']?></p>
    <?if(count($relate_news) > 0) {?>
        <h3>Tin liên quan</h3>
        <?foreach($relate_news as $n) {?>
            <a href="<?=site_url('news/detail/' . $n['alias'])?>"><b><?=$n['title']?></b></a><br />
        <?}?>
    <?}?>
</div>