<form action="<?=$action?>" id="myform" onsubmit="return false;">
    <div class="warning"><?=$this->validation->error_string?></div>
    <label for="questioner">Tên của bạn<span class="warning">*</span></label><br />
    <input type="text" id="questioner" name="questioner" value="<?=isset($info['questioner']) ? stripslashes($info['questioner']) : ''?>" size="40" /><br />
    <label for="title">Tiêu đề<span class="warning">*</span></label><br />
    <input type="text" id="title" name="title" value="<?=isset($info['title']) ? stripslashes($info['title']) : ''?>" size="40" /><br />
    <label for="question">Câu hỏi<span class="warning">*</span></label><br />
    <textarea id="question" name="question" cols="60" rows="4"><?=isset($info['question']) ? stripslashes($info['question']) : ''?></textarea><br />
    <input value="Gửi đi" onclick="Modalbox.show('<?=$action?>', {title: 'Gửi cho bạn bè', width: 540, params:Form.serialize('myform') }); return false;" type="submit">
</form>
<span class="warning">*</span> Thông tin bắt buộc