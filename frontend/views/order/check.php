<div class="container">
    <?php echo $error_message ?>
    <table class="table table-striped">
        <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Trạng thái đơn hàng</th>
            <th scope="col">Action</th>
        </tr>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?php echo $order['id'] ?></td>
                <td><?php echo $order['status'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary">
                        <a style="color:white; text-decoration: none;" href="<? echo base_url("order/edit?id={$order['id']}") ?>">Update</a>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>