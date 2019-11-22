<div class="bg-light py-3 mb-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="<?php echo base_url('home/index') ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $category['name']; ?></strong></div>
    </div>
  </div>
</div>
<div class="container">
  <?php
  $numOfCols = 3;
  $rowCount = 0;
  $bootstrapColWidth = 12 / $numOfCols;
  ?>
  <div class="row">
    <?php
    foreach ($category as $category) {
      foreach ($products as $products) {
        if ($category['id'] == $products['categories_id']) {
          ?>
          <div class="col-md-<?php echo $bootstrapColWidth; ?>">
            <div class="thumbnail">
              <img src="<?php echo PRODUCT_URL . $products['image'] ?>" alt="Image" class="img-fluid">
              </a>
              <h2 class="item-title"><a href="<?php echo base_url("product/show&id={$products['id']}") ?>"><?php echo $products['name']; ?></a></h2>
              <strong class="item-price"><?php echo $products['price'] . ' ' . 'VND'; ?></strong>
            </div>
          </div>
    <?php
          $rowCount++;
          if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
        }
      }
    }
    ?>
  </div>
</div>