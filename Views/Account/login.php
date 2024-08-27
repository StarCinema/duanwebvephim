<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="<?php echo $path?>/public/assets//images/account/account-bg.jpg">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <span class="cate">hello</span>
                    <h2 class="title">welcome back</h2>
                </div>
                <form class="account-form" action="index.php?act=logIn" method="post">
                    <div class="form-group">
                        <label for="email2">Email<span>*</span></label>
                        <input type="email" placeholder="Nhập địa chỉ email" name="email" id="email2" value="">
                        <?php if(isset($erEmail)) echo "<small class='error-text'>$erEmail</small>"; ?>
                    </div>
                    <div class="form-group">
                        <label for="pass3">Password<span>*</span></label>
                        <input type="password" placeholder="Nhập mật khẩu" name="password" id="pass3" value="">
                        <?php if(isset($erPassword)) echo "<small class='error-text'>$erPassword</small>"; ?>
                        <?php if(isset($error)) echo "<small class='error-text'>$error</small>"; ?>
                    </div>
                    <div class="form-group checkgroup">
                        <a href="index.php?act=forgot_password" class="forget-pass">Quên mật khẩu?</a>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="btn_login" value="Đăng nhập">
                    </div>
                </form>
                <div class="option">
                    Bạn chưa có tài khoản? <a href="index.php?act=register">đăng ký ngay</a>
                </div>
                <div class="or"><span>Or</span></div>
                <ul class="social-icons">
                    <li>
                        <a href="#0">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0" class="active">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ==========Sign-In-Section========== -->
