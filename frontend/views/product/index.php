<a href="<?php echo base_url('product/add') ?>">ADD</a>
<ul>
    <?php foreach ($products as $product) : ?>
        <li>
            <a href="<?php echo base_url("product/show?id={$product['id']}") ?>"><?php echo $product['name'] ?></a> <?php echo $product['price'] ?>
            <?php echo $product['image'] ?>
            <a href="<?php echo base_url("product/destroy?id={$product['id']}") ?>"> Delete</a>
        </li>
    <?php endforeach; ?>
</ul>