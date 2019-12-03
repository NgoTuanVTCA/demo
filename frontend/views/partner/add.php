<script language="JavaScript" type="text/javascript">
    function checkAdd() {
        return confirm('Bạn có chắc muốn thêm đối tác này');
    }
</script>

<div class="form-container">
    <h2>Thêm đối tác giao hàng</h2>

    <form action="<?php echo base_url('partner/store') ?>" method="post" enctype="multipart/form-data">
        <form>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="Name">Tên đối tác</label>
                    <input type="text" class="form-control" id="Name" name="name" placeholder="Name" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <?php echo $errors['email_err']?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputAddress">Địa chỉ</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="phone">Số điện thoại</label>
                    <input type="number" class="form-control" id="phone" name="phone_number" placeholder="Phone Number" required>
                    <?php echo $errors['phone_err']?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputArea">Khu vực</label>
                    <select id="inputArea" class="form-control" name="area">
                        <option selected>Chọn khu vực...</option>
                        <option>Nội Thành</option>
                        <option>Ngoại Thành</option>
                    </select>
                    <?php echo $errors['area_err'] ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bt1 " onclick="return checkAdd()">Submit</button>
        </form>
    </form>