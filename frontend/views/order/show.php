<h1>SHOW PAGE</h1>
<div class="order-item">
    <h3><?php echo $order['id'] ?></h3>
    <h3>
        <a href="<?php echo base_url("order/show?id={$order['id']}") ?>"><?php echo $order['id'] ?></a>
    </h3>
    <p><?php echo $order['status'] ?></p>
    <p><?php echo $order['created_at'] ?></p>
</div>