<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url('home/index') ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span><a href="<?php echo base_url('cart/index') ?>">Giỏ hàng</a><span class="mx-2 mb-0">/</span><strong class="text-black">Xác nhận thông tin</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row ml-auto mr-auto">
            <div class="col-md-7 mb-5 mb-md-0 mr-auto ml-auto">
                <h2 class="h3 mb-3 text-black">Thông tin khách hàng</h2>
                <div class="p-3 p-lg-5 border">
                    <form action="<?php echo base_url("cart/checkout") ?>" method="post">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Tên khách hàng<span class="text-danger">*</span></label>
                                <h3><b><?php echo $_SESSION['name'] ?></b></h3>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Địa chỉ <span class="text-danger">*</span></label>
                                <h3><b><?php echo $_SESSION['address'] ?></b></h3>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Số điện thoại <span class="text-danger">*</span></label>
                                <h3><b><?php echo $_SESSION['phone_number'] ?></b></h3>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="select" class="text-black">Đối tác giao hàng <span class="text-danger">*</span></label>
                            <select id="select" name="partner" class="form-control" onchange="showUser(this.value)" require>
                                <option value="-1">Chọn đối tác giao hàng </option>
                                <?php foreach ($partners as $partner) : ?>
                                    <option value="<?php echo $partner['id'] ?>"><?php echo $partner['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (!empty($error_message)) : ?>
                                <?php echo $error_message ?>
                            <?php endif; ?>
                        </div>
                        <div class="form-group row">
                            <input type="submit" value="Tiếp tục" class="btn btn-primary btn-lg btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>