<div class="container">

    <table class="table table-striped">
        <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Đối tác nhận đơn hàng</th>
            <th scope="col">Khu vực</th>
        </tr>
        <?php foreach ($partners as $partner) : ?>
        <?php foreach ($orders as $order) : ?>
            <tr>
            <?php if ($order['partner_id'] == $partner['id']) :?>
                <td><?php echo $order['id'] ?></td>
                <td><?php echo $partner['name'] ?></td>
                <td><?php echo $partner['area']; ?></td>
            <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</div>