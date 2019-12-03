<script language="JavaScript" type="text/javascript">
    function checkUpdate() {
        return confirm('Bạn có chắc muốn cập nhật thông tin mới');
    }
</script>
<div class="form-container">
    <h2>Cập nhật đối tác</h2>

    <form action="<?php echo base_url("partner/update&id={$partner['id']}") ?>" method="post" enctype="multipart/form-data">
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Name">Tên đối tác</label>
                    <input type="text" class="form-control" id="Name" name="name" placeholder="Name" value="<?php echo $partner['name'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress">Địa chỉ</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address" value="<?php echo $partner['address'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="phone">Số điện thoại</label>
                    <input type="number" class="form-control" id="phone" name="phone_number" placeholder="Phone Number" value="<?php echo $partner['phone_number'] ?>" required>
                    <?php echo $errors['phone_err']?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Khu vực</label>
                    <select name="area" id="inputState" class="form-control">
                        <option selected><?php echo $partner['area'] ?></option>
                        <option>Nội Thành</option>
                        <option>Ngoại Thành</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bt2" onclick="return checkUpdate()">Cập nhật</button>
        </form>
    </form>