<div class="container">
    <p></p>
    <section id="page-wrapper">
        <div class="wrapper">
            <div class="grid">
                <form class="form-content" action="<?php echo base_url('user/handle_login') ?>" method="post">
                    <h3><b>Đăng nhập</b></h3>
                    <div class="question">
                        <input type="email" name="email" required />
                        <label>Email</label>
                        <?php if(!empty($errors['email'])):?>
                        <?php echo $errors['email']; ?>
                        <?php endif;?>
                    </div> 
                    <div class="question">
                        <input type="password" name="password" required />
                        <label>Mật khẩu</label>
                        <?php if(!empty($errors['password'])||!empty($error_message)):?>
                        <?php echo $errors['password']; ?>
                        <?php echo $error_message; ?>
                        <?php endif;?>
                    </div>
                    <p class="button">
                        <a href="#recover" id="RecoverPassword">Quên mật khẩu?</a>
                        <a href="<?php echo base_url('user/registration') ?>" id="registration">Đăng ký</a>
                    </p><br>
                    <p class="button ml-auto"><button type="submit">Đăng nhập</button></p>
                </form>
            </div>
        </div>
    </section>
</div>