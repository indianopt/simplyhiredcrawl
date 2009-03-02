<form method="post" action="<?=site_url('member/register')?>">
    <div class="warning"><?=$this->validation->error_string?></div>
    <label for="name">Họ và tên<span class="warning">*</span></label><br />
    <input type="text" id="name" name="name" value="<?=isset($member['name']) ? $member['name'] : ''?>" /><br />

    <label for="username">Tên đăng nhập<span class="warning">*</span></label><br />
    <input type="text" id="username" name="username" value="<?=isset($member['username']) ? $member['username'] : ''?>" /><br />

    <label for="password">Mật khẩu<span class="warning">*</span></label><br />
    <input type="password" id="password" name="password" /><br />
      
    <label for="confirm_password">Nhập lại mật khẩu<span class="warning">*</span></label><br />
    <input type="password" id="confirm_password" name="confirm_password" /><br />
      
    <label for="email">Email<span class="warning">*</span></label><br />
    <input type="text" id="email" name="email" value="<?=isset($member['email']) ? $member['email'] : ''?>" /><br />
      
    <h3>Điều khoản sử dụng</h3>
    <div class="terms">
        All messages posted at this site express the views of the author, and do not necessarily reflect the views of the owners and administrators of this site.
        <br />
        <br />
        By registering at this site you agree not to post any messages that are obscene, vulgar, slanderous, hateful, threatening, or that violate any laws.   We will permanently ban all users who do so.   
        <br />
        <br />
        We reserve the right to remove, edit, or move any messages for any reason.
    </div>
    <br />
    <input type="checkbox" id="accept_terms" name="accept_terms" value="1" <?=isset($member['accept_terms']) && $member['accept_terms'] == 1 ? 'checked' : ''?>  /><label for="accept_terms">Tôi đồng ý*</label><br />  
      
    <input type="submit" value="Đăng ký" />
</form>
<span class="warning">*</span> Thông tin bắt buộc