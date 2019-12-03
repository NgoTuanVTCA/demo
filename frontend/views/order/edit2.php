<script language="JavaScript" type="text/javascript">
    function checkUpdate() {
        return confirm('Bạn có chắc muốn cập nhật thông tin mới');
    }
</script>

<!-- ========== -->

<a href="<?php echo base_url('order/check') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <h3>Cập nhật trạng thái đơn hàng</h3>
    <form action="<?php echo base_url("order/update2&id={$order['id']}") ?>" method="post">
        <div class="form-group">
            <select name="status" id="status" class="form-control">
                <option>đã xử lý</option>
                <option>đang giao</option>
                <option>đã giao</option>
                <option>đã hủy</option>
            </select>
            <small style="font-size: 15px">Trạng thái hiện tại của đơn hàng : <?php echo $order['status'] ?></small>
        </div>
        <button type="submit" class="btn btn-dark" onclick="return checkUpdate()">Xác nhận</button>
    </form>
</div>