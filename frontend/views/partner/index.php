<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Danh sách đối tác giao hàng<a class="btn btn-dark float-right" href="<?php echo base_url('partner/add') ?>">Thêm</a>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                            <th>Khu vực</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($partners as $partner) : ?>
                            <tr>
                                <td><?php echo $partner['name'] ?></td>
                                <td><?php echo $partner['email'] ?></td>
                                <td><?php echo $partner['address'] ?> </td>
                                <td><?php echo $partner['phone_number'] ?></td>
                                <td><?php echo $partner['area'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <a style="color:white; text-decoration: none;" href="<?php echo base_url("partner/edit?id={$partner['id']}") ?>">Cập nhật</a>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>