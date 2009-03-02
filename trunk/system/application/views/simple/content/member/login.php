<form method="post" action="<?=site_url('member/login')?>">
    <div class="warning"><?=$this->validation->error_string?></div>
    <label for="username">Tên đăng nhập</label><br />
    <input type="text" id="username" name="username" value="<?=isset($member['username']) ? $member['username'] : ''?>" /><br />

    <label for="password">Mật khẩu</label><br />
    <input type="password" id="password" name="password" /><br />
      
    <input type="submit" value="Đăng nhập" /> <a href="<?=site_url('member/forgot_password')?>">Quên mật khẩu?</a>
</form>