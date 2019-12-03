<script language="JavaScript" type="text/javascript">
    function checkAdd() {
        return confirm('Bạn có chắc muốn thêm loại sản phẩm này');
    }
</script>

<a href="<?php echo base_url('category/index') ?>" class="btn btn-success"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <h3>Tạo mới một loại hàng</h3>
    <form action="<?php echo base_url('category/store') ?>" method="post">
        <div class="form-group">
            <label for="name">Tên <span class="red">*</span></label>
            <input type="text" name="name" class="form-control">
            <span class="invalid-feedback"></span>
        </div>
        <input type="submit" class="btn btn-success" value="Thêm" />
    </form>
</div>