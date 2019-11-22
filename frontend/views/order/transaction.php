<div class="bg-light py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-0"><a href="<?php echo base_url("home/index") ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Lịch sử giao dịch</strong></div>
		</div>
	</div>
</div>
<div class="container mt-3 mb-3">
	<div class="row">
		<div class="col-sm-3 border-right">
			<h3>Thông tin tài khoàn</h3>
			<ul class="list-group mt-3">
				<li class="list-group-item">
					<a href="<?php echo base_url("user/profile"); ?>">Thông tin cá nhân</a>
				</li>
				<li class="list-group-item">
					<a href="<?php echo base_url("user/password"); ?>">Thay đổi mật khẩu</a>
				</li>
				<li class="list-group-item">
					<a href="<?php echo base_url('order/transaction_history'); ?>">Lịch sử giao dịch</a>
				</li>
			</ul>
		</div>
		<div class="col-sm-9">
			<?php echo $successfully; ?>
			<h3>Lịch sử giao dịch</h3>
			<div class="border-bottom"></div>
			<? if ($orders == null) : ?>
				<p class="text-center mt-4">------------------------------------------------------------------------------------</p>
				<h3 class="text-center"><a href="<?php echo base_url("home/index"); ?>">Bạn chưa mua hàng lần nào</a></h3>
				<p class="text-center">------------------------------------------------------------------------------------</p>
			<? else : ?>
				<?php foreach ($orders as $order) : ?>
					<?php if($user['id'] == $order['id']):?>
						
					<?php endif;?>
				<?php endforeach; ?>
			<? endif; ?>
		</div>
	</div>
</div>