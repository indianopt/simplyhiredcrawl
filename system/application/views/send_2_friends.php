<form action="<?=$action?>" id="myform" onsubmit="return false;">
    <div class="warning"><?=$this->validation->error_string?></div>
    <label for="sender_name">Tên của bạn<span class="warning">*</span></label><br />
    <input type="text" id="sender_name" name="sender_name" value="<?=isset($info['sender_name']) ? $info['sender_name'] : ''?>" size="40" /><br />      
    <label for="sender_email">Email của bạn<span class="warning">*</span></label><br />
    <input type="text" id="sender_email" name="sender_email" value="<?=isset($info['sender_email']) ? $info['sender_email'] : ''?>" size="40" /><br />
    <label for="receiver_email">Email người nhận<span class="warning">*</span></label><br />
    <input type="text" id="receiver_email" name="receiver_email" value="<?=isset($info['receiver_email']) ? $info['receiver_email'] : ''?>" size="40" /><br />
    <label for="title">Tiêu đề<span class="warning">*</span></label><br />
    <input type="text" id="title" name="title" value="<?=isset($info['title']) ? $info['title'] : ''?>" size="40" /><br />
    <label for="message">Lời nhắn<span class="warning">*</span></label><br />
    <textarea id="message" name="message" cols="60" rows="4"><?=isset($info['message']) ? $info['message'] : 'Chào bạn, tôi nghĩ thông tin này có ích với bạn.'?></textarea><br />
    <input value="Gửi đi" onclick="Modalbox.show('<?=$action?>', {title: 'Gửi cho bạn bè', width: 540, params:Form.serialize('myform') }); return false;" type="submit">
</form>
<span class="warning">*</span> Thông tin bắt buộc