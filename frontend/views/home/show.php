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
			<h3>Thông tin cá nhân</h3>
			<div class="border-bottom"></div>
			<?php if (!$_SESSION['name']) : ?>
				<h1 class="text-center mt-5">Bạn cần phải <a href="<?php echo base_url('home/login') ?>">Đăng nhập</a></h1>
			<?php else : ?>
				<form style="width: 100%;" class="form-content mt-3 mb" action="<?php echo base_url('home/show') ?>" method="post">
					<input type="text" name="name" class="info" id="nme" placeholder="<?php echo $_SESSION['name'] ?>" required autocomplete="off" />
					<label class="change-input" for="nme"><span class="change-name">Tên thay đổi:</span></label>
					<input type="text" name="name" class="info" id="nme" placeholder="<?php echo $_SESSION['address'] ?>" required autocomplete="off" />
					<label class="change-input" for="nme"><span class="change-name">Địa chỉ thay đổi:</span></label>
					<input type="text" name="name" class="info" id="nme" placeholder="<?php echo $_SESSION['phone_number'] ?>" required autocomplete="off" />
					<label class="change-input" for="nme"><span class="change-name">Số điện thoại thay đổi:</span></label>
					<p class="button ml-auto"><button type="submit">Thay đổi</button></p>
				</form>
				<div class="border-bottom"></div>
				<h3 class="mt-3 mb-3">Đổi mật khẩu</h3>
				<form style="width: 100%;" class="form-content mt-3 mb" action="<?php echo base_url('home/show') ?>" method="post">
					<input type="password" name="name" class="info" id="nme" required autocomplete="off" />
					<label class="change-input" for="nme"><span class="change-name">Mật khẩu cũ:</span></label>
					<input type="password" name="name" class="info" id="nme" required autocomplete="off" />
					<label class="change-input" for="nme"><span class="change-name">Mật khẩu mới:</span></label>
					<input type="password" name="name" class="info" id="nme" required autocomplete="off" />
					<label class="change-input" for="nme"><span class="change-name">Nhập lại mật khẩu mới:</span></label>
					<p class="button ml-auto"><button type="submit">Thay đổi</button></p>
				</form>
			<?php endif; ?>
		</div>
	</div>
</div>