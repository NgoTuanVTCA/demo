<div class="container">
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6"><img src="<?php echo PRODUCT_URL . $product['image'] ?>" alt="" width="100%" height="100%"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <p><?php echo $product['name'] ?></p>
            <p><?php echo $product['price'] ?></p>
            <button type="submit" class="btn btn-dark addtocart">Thêm vào giỏ hàng</button>
        </div>
    </div>
    <div class="col-lg-6">
        <br>
        <form action="<? echo base_url("comment/store&id={$product['id']}") ?>" method="post">
            <div class="form-group comment">
                <label for="form-href">Bình luận:</label>
                <input type="text" class="form-control" name="comment" id="form-href" placeholder="Bình luận......">

                <div>
                    <?php
                    if (!$_SESSION['name']) :

                        ?>
                        * <a href="<? echo base_url('user/login') ?>">Đăng nhập</a> hoặc <a href="<? echo base_url('user/registration') ?>">Đăng ký</a> để bình luận
                    <?php
                    else :

                        ?>
                        <p><?php echo $_SESSION['name'];    ?></p>
                        <div class="buttoncomment">
                            <br>
                            <button type="submit" class="comment1">Bình luận</button>
                        </div>
                    <?php

                    endif;
                    ?>

                </div>
            </div>
        </form>
    </div>
    <br>
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