<?php
foreach ($products as $product) {
    foreach ($categories as $category) {
        foreach ($brands as $brand) {
            foreach ($product_sizes as $product_size) {
                foreach ($sizes as $size) {
                    if ($product['categories_id'] == $category['id']) {
                        if ($product['brand_id'] == $brand['id']) {
                            if ($product['id'] == $product_size['product_id']) {
                                if ($product_size['size_id'] == $size['id']) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $product['id'] ?></td>
                                        <td class="text-center"><?php echo $product['name'] ?></td>
                                        <td class="text-center"><?php echo $product['price'] ?></td>
                                        <td class="text-center">
                                            <img width="100" src="<?php echo PRODUCT_URL . $product['image'] ?>">
                                        </td>
                                        <td class="text-center"><?php echo $product['quantity'] ?></td>
                                        <td class="text-center"><?php echo $category['name'] ?></td>
                                        <td class="text-center"><?php echo $brand['name'] ?></td>
                                        <td class="text-center"><?php echo $size['name'] ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-dark btn-block" href="<?php echo base_url("product/edit?id={$product['id']}") ?>"> Sửa</a>
                                            <a class="btn btn-dark btn-block" href="<?php echo base_url("product/destroy?id={$product['id']}") ?>"> Xóa</a>
                                            <a class="btn btn-dark btn-block" href="<?php echo base_url("product/show?id={$product['id']}") ?>">Xem thêm</a>
                                        </td>
                                    </tr>
<?php
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>