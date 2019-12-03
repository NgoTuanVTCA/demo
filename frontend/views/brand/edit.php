<script language="JavaScript" type="text/javascript">
    function checkUpdate() {
        return confirm('Bạn có chắc muốn sửa thông tin');
    }
</script>

<a href="<?php echo base_url('brand/index') ?>" class="btn btn-success"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <h3>Cập nhật thông tin thương hiệu</h3>
    <form action="<?php echo base_url("brand/update&id={$brand['id']}") ?>" method="post">
        <div class="form-group">
            <label for="name">Tên thương hiệu<span class="red">*</span></label>
            <input type="text" name="name" class="form-control" value="<?php echo $brand['name']; ?>">
        </div>

        <input type="submit" class="btn btn-success" value="Cập nhật" />
    </form>
</div>
<?php if (!empty($errors)) : ?>

    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>