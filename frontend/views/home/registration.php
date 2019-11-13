<div class="container mt-2">
    <section id="page-wrapper">
        <div class="wrapper">
            <div class="grid">
                <form class="form-content" action="<?php echo base_url('home/handle_registration') ?>" method="post">
                    <h3><b>Tạo tài khoản</b></h3>
                    <div class="question">
                        <input type="text" name="name" required />
                        <label>Họ và Tên</label>
                        <span><?php echo $errors['name']; ?></span>
                    </div>
                    <div class="question">
                        <input type="text" name="address" required />
                        <label>Địa chỉ</label>
                        <span><?php echo $errors['address']; ?></span>
                    </div>
                    <div class="question">
                        <input type="number" name="phone_number" required />
                        <label>Số điện thoại</label>
                        <span><?php echo $errors['phone_number']; ?></span>
                    </div>
                    <div class="question">
                        <input type="email" name="email" required />
                        <label>Email</label>
                        <?php echo $errors['email']; ?>
                    </div>
                    <div class="question">
                        <input type="password" name="password" required />
                        <label>Mật khẩu</label>
                        <?php echo $errors['password']; ?>
                        <?php echo $error_message; ?>
                    </div>

                    <div class="question">
                        <input type="password" name="re_password" required />
                        <label>Nhập lại mật khẩu</label>
                        <span>
                            <?php echo $errors['password']; ?>
                            <?php echo $errors['re_password']; ?>
                        </span>
                    </div>
                    <p class="button">
                        <a href="<?php echo base_url('home/login') ?>" id="registration"><b>Đăng nhập </b></a> <span> /</span>
                        <button type="submit">Đăng ký</button>
                    </p>
                </form>
            </div>
        </div>
    </section>
</div>