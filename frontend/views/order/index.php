<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh sách đơn hàng</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th class="text-center">Mã đơn hàng<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th class="text-center">Trạng thái<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th class="text-center">Ngày tạo<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $order['id'] ?></td>
                                    <td class="text-center"><?php echo $order['status'] ?></td>
                                    <td class="text-center"><?php echo $order['created_at'] ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-dark btn-block" href="<?php echo base_url("order/edit?id={$order['id']}") ?>"> Cập nhật</a>
                                        <a class="btn btn-dark btn-block" href="<?php echo base_url("order/show?id={$order['id']}") ?>"> Xem thêm</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
</div>