<script language="JavaScript" type="text/javascript">
    function checkAdd() {
        return confirm("Bạn Có Chắc Muốn Thêm Người Dùng Mới");
    }
</script>
<a href="<?php echo base_url('user/index') ?>" class="btn btn-success"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <h3>Thêm Người Dùng</h3>
    <p>Tạo mới một người dùng</p>
    <form action="<?php echo base_url('user/store') ?>" method="post" enctype="multipart/form-data" style="margin-left: 30px;">
        <div class="form-group">
            <label for="Name">Tên Người Dùng</label>
            <input type="text" class="form-control" id="Name" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Địa Chỉ</label>
            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address" required>
        </div>
        <div class="form-group">
            <label for="phone">Số Điện Thoại</label>
            <input type="text" class="form-control" id="phone" name="phone_number" pattern="[0-9]{10,11}" placeholder="Phone Number" required>
            <small>Số điện thoại không chứa kí tự và không quá 11 số</small>
            <?php echo $errors['phone_err'] ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <?php echo $errors['email_err'] ?>
        </div>
        <div class="form-group">
            <label for="password">Mật Khẩu</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <?php echo $errors['password_err'] ?>
        </div>
        <button type="submit" class="btn btn-success" onclick="return checkAdd()">Submit</button>
    </form>
</div>