<script language="JavaScript" type="text/javascript">
    function checkUpdate() {
        return confirm('Bạn có chắc muốn cập nhật thông tin mới');
    }
</script>
<div class="form-container">
    <h2>Update a partner</h2>

    <form action="<?php echo base_url("partner/update&id={$partner['id']}") ?>" method="post" enctype="multipart/form-data">
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Name">Name Partner</label>
                    <input type="text" class="form-control" id="Name" name="name" placeholder="Name" value="<?php echo $partner['name'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address" value="<?php echo $partner['address'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="phone">Phone Number</label>
                    <input type="number" class="form-control" id="phone" name="phone_number" placeholder="Phone Number" value="<?php echo $partner['phone_number'] ?>" required>
                    <?php echo $errors['phone_err']?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Area</label>
                    <select name="area" id="inputState" class="form-control">
                        <option selected><?php echo $partner['area'] ?></option>
                        <option>Nội Thành</option>
                        <option>Ngoại Thành</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bt2" onclick="return checkUpdate()">Submit</button>
        </form>
    </form>