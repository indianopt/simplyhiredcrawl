<div>
	<div class="float_right">
        <a href="<?=site_url('faq/ask')?>" title="Đặt câu hỏi" onclick="Modalbox.show(this.href, {title: this.title, width: 540}); return false;"><?=image('arrow.gif', 'Đặt câu hỏi', array('border' => 0))?> Đặt câu hỏi</a>
    </div>
	<h2 class="clear_both" id="top">Hỏi đáp</h2>
    <?$i = 1?>
	<? foreach($faqs as $faq) { ?>
		<b><?=$i++?>.&nbsp;&nbsp;<a href="javascript:void(0)" onclick="new Effect.ScrollTo('faq_<?=$faq['id']?>', {offset: -20})"><?=stripslashes($faq['title'])?></a></b>
		<br/>
	<? } ?>
	<br />
	<hr />
	<br />
	<?$i = 1?>
	<? foreach($faqs as $faq) { ?>
		<b id="faq_<?=$faq['id']?>"><?=$i++?>.&nbsp;&nbsp;<?=stripslashes($faq['title'])?></b>
		<br />
		<b id="faq_<?=$faq['id']?>">Hỏi: <?=stripslashes($faq['question'])?></b>
		<br />
		<b id="faq_<?=$faq['id']?>">Đáp: <?=stripslashes($faq['answer'])?></b>
		<br/>
		<div class="float_right">
        <a href="#" title="Top" onclick="new Effect.ScrollTo('top', {offset: -15}); return false;"><?=image('top.gif', 'Top', array('border' => 0))?> Top</a>
    </div>
	<? } ?>
	<br />
    <?=$this->pagination->create_links()?>
</div>