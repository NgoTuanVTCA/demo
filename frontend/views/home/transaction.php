<div class="container mt-3 mb-3">
	<div class="row">
		<div class="col-sm-3 border-right">
			<h3>Thông tin tài khoàn</h3>
			<ul class="list-group mt-3">
				<li class="list-group-item">
					<a href="<?php echo base_url("home/show"); ?>">Thông tin cá nhân</a>
				</li>
				<li class="list-group-item">
					<a href="<?php echo base_url('home/transaction_history'); ?>">Lịch sử giao dịch</a>
				</li>
			</ul>
		</div>
		<div class="col-sm-9">
			<?php echo $successfully; ?>
			<h3>Lịch sử giao dịch</h3>
			<div class="border-bottom"></div>
			<? if ($orders == null) : ?>
				<p class="text-center mt-4">------------------------------------------------------------------------------------</p>
				<h3 class="text-center"><a href="<?php echo base_url("home/index"); ?>">Bạn hay mua đồ để được đẹp trai</a></h3>
				<p class="text-center">------------------------------------------------------------------------------------</p>
			<? else : ?>
				<?php foreach ($orders as $order) : ?>
				<?php endforeach; ?>
			<? endif; ?>
		</div>
	</div>
</div>