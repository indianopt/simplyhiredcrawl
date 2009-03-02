<form method="post" action="<?=site_url('member/forgot_password')?>">
    <div class="warning"><?=$this->validation->error_string?></div>
    <label for="username">Nhập vào địa chỉ e-mail mà bạn đã đăng ký. Mật mã mới sẽ được gửi theo địa chỉ e-mail đó.</label><br />
    <input type="text" id="email" name="email" value="" /> <input type="submit" value="Gửi đi" /> <a href="<?=site_url()?>">Quay lại trang chủ</a>
</form>