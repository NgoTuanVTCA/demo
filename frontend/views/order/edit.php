<script language="JavaScript" type="text/javascript">
    function checkUpdate() {
        return confirm('Bạn có chắc muốn cập nhật thông tin mới');
    }
</script>
<div class="form-container">
    <h2>Update a status</h2>

    <form action="<?php echo base_url("order/handle_update?id={$order['id']}") ?>" method="post" enctype="multipart/form-data">
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    Mã đơn hàng:<input class="form-control" name="id" value="<?php echo $order['id'] ?>" disabled></input>
                    <label for="inputStatus">Trạng thái đơn hàng</label>
                    <select name="status" id="inputStatus" class="form-control">
                        <option selected><?php echo $order['status'] ?></option>
                        <option>đã xử lý</option>
                        <option>đang giao</option>
                        <option>đã giao</option>
                        <option>đã hủy</option>
                    </select>
                </div>
        </form>
        <button type="submit" class="btn btn-primary bt2" onclick="return checkUpdate()">Xác nhận</button>
    </form>
    </form>