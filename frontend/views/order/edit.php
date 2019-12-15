<a href="<?php echo base_url('order/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <h3>Cập nhật đơn hàng</h3>
    <form action="<?php echo base_url("order/update&id={$order['id']}") ?>" method="post">
        <div class="form-group">
            <label for="status">Trạng thái <span class="red">*</span></label>
            <select name="status" id="status" class="form-control">
                <option value="1">Đang xử lý</option>
                <option value="2">Đã xử lý</option>
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