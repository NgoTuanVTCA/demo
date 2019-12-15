<?php if ($_SESSION['role'] == 2) : ?>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="<?php echo base_url("home/index") ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span><a href="<?php echo base_url('order/transaction_history'); ?>">Lịch sử giao dịch</a> <span class="mx-2 mb-0">/</span><strong>Chi tiết đơn hàng</strong> </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($_SESSION['role'] == 1) : ?>
    <a href="<?php echo base_url('order/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>
<?php endif; ?>
<div class="container mt-3 mb-3">
    <div class="row">
        <?php if ($_SESSION['role'] == 2) : ?>
            <div class="col-sm-3 border-right">
                <h3>Thông tin tài khoàn</h3>
                <ul class="list-group mt-3">
                    <li class="list-group-item">
                        <a href="<?php echo base_url("user/profile"); ?>">Thông tin cá nhân</a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?php echo base_url("user/password"); ?>">Thay đổi mật khẩu</a>
                    </li>
                    <?php if ($_SESSION['id'] != 1) : ?>
                        <li class="list-group-item">
                            <a href="<?php echo base_url('order/transaction_history'); ?>">Lịch sử giao dịch</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if ($_SESSION['role'] == 1) : ?>
            <div class="col-sm-12">
            <?php elseif ($_SESSION['role'] == 2) : ?>
                <div class="col-sm-9">
                <?php endif; ?>
                <h3>Mã đơn hàng : <?php echo $order['id'] ?></h3>
                <div class="border-bottom"></div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">Tên sản phẩm</th>
                            <th scope="col" style="text-align: center;">Kích thước</th>
                            <th scope="col" style="text-align: center;">Giá</th>
                            <th scope="col" style="text-align: center;">Số lượng</th>
                            <th scope="col" style="text-align: center;">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($order_details as $order_detail) : ?>
                            <?php foreach ($products as $product) : ?>
                                <?php if ($order_detail['product_id'] == $product['id']) : ?>
                                    <tr>
                                        <td><?php echo $product['name'] ?></td>
                                        <td class="text-center"><?php echo $order_detail['size_name'] ?></td>
                                        <td class="text-center"><?php echo number_format($order_detail['price'], 0, '.', ',') . ' VNĐ' ?></td>
                                        <td class="text-center"><?php echo $order_detail['quantity'] ?></td>
                                        <td class="text-center"><?php echo number_format($order_detail['price'] * $order_detail['quantity'], 0, '.', ',') . ' VNĐ' ?></td>
                                        <?php $total += $order_detail['price'] ?>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="hidden-xs"><strong>Giá vận chuyển : </td>
                            <?php foreach ($partners as $partner) : ?>
                                <?php if ($order['partner_id'] == $partner['id']) : ?>
                                    <td class="hidden-xs text-center"><strong><?php echo number_format($partner['price'], 0, '.', ',') . ' VNĐ' ?></strong></td>
                                    <?php $total += $partner['price'] ?>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <td colspan="4" class="hidden-xs"><strong>Thành tiền : </td>
                            <td class="hidden-xs text-center"><strong><?php echo number_format($total, 0, '.', ',') . ' VNĐ' ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="hidden-xs"><strong>Trạng thái : <?php echo $order['status'] ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="hidden-xs"><strong>Ngày tạo : <?php echo $order['created_at'] ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
    </div>