<div class="bg-light py-3 mb-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="<?php echo base_url('home/index') ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $category['name']; ?></strong></div>
    </div>
  </div>
</div>
<div class="container mt-5">
  <?php
  $numOfCols = 3;
  $rowCount = 0;
  $bootstrapColWidth = 12 / $numOfCols;
  ?>
  <div class="row mb-5">
      <?php foreach ($products as $product) : ?>
        <?php if ($category['id'] == $product['categories_id']) : ?>
          <div class="col-lg-4 col-md-4 item-entry mb-4">
            <a href="<?php echo base_url("product/show?id={$product['id']}") ?>" class="item-entry">
              <img src="<?php echo PRODUCT_URL . $product['image'] ?>" alt="Image" class="img-fluid">
              <h2 class="item-title"><?php echo $product['name']; ?></h2>
              <p class="item-price"><?php echo number_format($product['price'], 0, '.', ',') . ' VNĐ' ?></p>
            </a>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php
    $rowCount++;
    if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
    ?>
  </div>
</div>