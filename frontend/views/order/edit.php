<a href="<?php echo base_url('order/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">

    <h3>Cập nhật đơn hàng</h3>
    <form action="<?php echo base_url('order/update') ?>" method="post">
        <div class="form-group">
            <label for="status">Trạng thái <span class="red">*</span></label>
            <select name="" id="status" class="form-control">
                <option value="">Đang xử lý</option>
                <option value="">Đã xử lý</option>
            </select>
        </div>
        <input type="submit" class="btn btn-dark" value="Cập nhật" />
    </form>
</div>
<?php if (!empty($errors)) : ?>

    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>