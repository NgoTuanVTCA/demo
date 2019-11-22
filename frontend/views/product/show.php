<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="<?php echo base_url("home/index") ?>">Trang chủ</a>
                <span class="mx-2 mb-0">/</span>
                <a href="#"><?php echo $category['name'] ?></a>
                <span class="mx-2 mb-0">/</span>
                <strong class="text-black"><?php echo $product['name'] ?></strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="item-entry">
                    <a href="#" class="product-item md-height bg-gray d-block">
                        <img src="<?php echo PRODUCT_URL . $product['image'] ?>" alt="Image" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-black"><?php echo $product['name'] ?></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas, distinctio, aperiam, ratione dolore.</p>
                <p class="mb-4">Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.</p>
                <p><strong class="text-primary h4"><?php echo number_format($product['price'], 0, '.', ',') . ' VNĐ' ?></strong></p>
                <div class="mb-1 d-flex">
                    <?php foreach ($product_size as $product_size) : ?>
                        <?php foreach ($sizes as $size) : ?>
                            <?php if ($product_size['size_id'] == $size['id']) : ?>
                                <label for="option-sm" class="d-flex mr-3 mb-3">
                                    <button class="btn btn-outline-primary js-btn-plus" type=""> <?php echo $size['name']; ?></button>
                                </label>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                    </div>
                </div>
                <p><a href="cart.html" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Thêm vào giỏ hàng</a></p>
            </div>
            <div class="col-md-6">
                <br>
                <form action="<? echo base_url("comment/store&id={$product['id']}") ?>" method="post">
                    <div class="form-group comment">
                        <label for="form-href">Bình luận:</label>
                        <input type="text" class="form-control" name="comment" id="form-href" placeholder="Bình luận......">

                        <div>
                            <?php if (!$_SESSION['name']) : ?>
                                * <a href="<? echo base_url('user/login') ?>">Đăng nhập</a> hoặc <a href="<? echo base_url('user/registration') ?>">Đăng ký</a> để bình luận
                            <?php else : ?>
                                <p><?php echo $_SESSION['name'];    ?></p>
                                <div class="buttoncomment">
                                    <br>
                                    <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" type="submit">Bình luận</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
            <br>
        </div>
        <div class="displaycomment">
            <?php foreach ($comments as $comment) : ?>
                <?php foreach ($users as $user) : ?>
                    <?php if ($comment['product_id'] == $product['id']) : ?>
                        <?php if ($comment['user_id'] == $user['id']) : ?>
                            <div>
                                <?php echo $user['name'] . '    :     ' . $comment['content'] . '     <br>      ' . $comment['created_at'];
                                                echo '<hr>'; ?>
                            </div>
                        <? endif; ?>
                    <? endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>