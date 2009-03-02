<form action="<?=$action?>" id="myform" onsubmit="return false;">
    <div class="warning"><?=$this->validation->error_string?></div>
    <label for="sender_name">Tên của bạn<span class="warning">*</span></label><br />
    <input type="text" id="sender_name" name="sender_name" value="<?=isset($info['sender_name']) ? $info['sender_name'] : ''?>" size="40" /><br />      
    <label for="sender_email">Email của bạn<span class="warning">*</span></label><br />
    <input type="text" id="sender_email" name="sender_email" value="<?=isset($info['sender_email']) ? $info['sender_email'] : ''?>" size="40" /><br />
    <label for="sender_phone">Điện thoại của bạn<span class="warning">*</span></label><br />
    <input type="text" id="sender_phone" name="sender_phone" value="<?=isset($info['sender_phone']) ? $info['sender_phone'] : ''?>" size="40" /><br />
    <label for="sender_">Công ty</label><br />
    <input type="text" id="sender_company" name="sender_company" value="<?=isset($info['sender_company']) ? $info['sender_company'] : ''?>" size="40" /><br />
    <label for="title">Tiêu đề<span class="warning">*</span></label><br />
    <input type="text" id="title" name="title" value="<?=isset($info['title']) ? $info['title'] : ''?>" size="40" /><br />
    <label for="message">Nội dung<span class="warning">*</span></label><br />
    <textarea id="message" name="message" cols="60" rows="4"><?=isset($info['message']) ? $info['message'] : ''?></textarea><br />
    <input value="Gửi đi" onclick="Modalbox.show('<?=$action?>', {title: 'Gửi liên hệ', width: 540, params:Form.serialize('myform') }); return false;" type="submit">
</form>
<span class="warning">*</span> Thông tin bắt buộc