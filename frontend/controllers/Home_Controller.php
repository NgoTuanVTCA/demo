<?php
class Home_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		// show home
		$products = $this->model->product->find_category();
		$this->view->load('home/index', [
			'products' => $products
		]);
	}

	public function show()
	{
		// show profile

		if (!$_SESSION['email']) {
			redirect('home/login');
		}
		$this->view->load('home/show');
	}

	public function handle_update()
	{
		// process update

		$id = $_SESSION['id'];
		// var_dump($id);
		$name = getPostParameter('name');
		$phone_number = getPostParameter('phone_number');
		$address = getPostParameter('address');
		$errors = [];
		if (!$name) {
			$errors['name'] = 'Vui lòng nhập Họ và Tên';
		}

		if (!$address) {
			$errors['address'] = 'Vui lòng nhập địa chỉ';
		}

		if (!$phone_number) {
			$errors['phone_number'] = 'Vui lòng nhập số điện thoại';
		}

		if (count($errors) > 0) {
			$this->view->load('home/show', [
				'errors' => $errors
			]);
		} else {
			$user = $this->model->user->update_by_id($id, [
				'name' => $name,
				'address' => $address,
				'phone_number' => $phone_number
			]);
			$_SESSION['name'] = $name;
			$_SESSION['address'] = $address;
			$_SESSION['phone_number'] = $phone_number;
			$this->view->load('home/show', [
				'successfully' => 'Đổi thông tin thành công'
			]);
		}
	}

	public function handle_password()
	{

		// process change password
		$id = $_SESSION['id'];
		$old_password = getPostParameter('old_password');
		$new_password = getPostParameter('new_password');
		$re_new_password = getPostParameter('re_new_password');

		$errors = [];
		if (!$old_password) {
			$errors['old_passwrod'] = 'Trường  này không được để trống';
		} elseif (!$new_password) {
			$errors['new_password'] = 'Trường này không được để trống';
		} elseif (!$re_new_password) {
			$errors['re_new_password'] = 'Trường này không được để trống';
		} elseif ($old_password == $new_password) {
			$errors['new_password'] = 'Mật khẩu mới không được giống mật khẩu cũ';
		} elseif ($new_password != $re_new_password) {
			$errors['re_new_password'] = 'Mật khẩu không trùng khớp';
		}
		$new_password = hash_password($new_password);
		if (count($errors) > 0) {
			$this->view->load('home/show', [
				'errors' => $errors
			]);
		} else {
			$user = $this->model->user->update_by_id($id, [
				'password' => $new_password
			]);

			$this->view->load('home/show', [
				'successfully' => 'Đổi mật khẩu thành công'
			]);
		}
	}
	public function transaction_history()
	{
		// show transation history

		if (!$_SESSION['email']) {
			redirect('home/login');
		}
		$this->view->load('home/transaction');
	}

	public function login()
	{
		// show login

		if ($_SESSION['email']) {
			redirect('home/index');
		}
		$this->view->load('home/login');
	}

	public function handle_login()
	{
		// process login

		$email = getPostParameter('email');
		$password = getPostParameter('password');

		$errors = [];
		if (!$email) {
			$errors['email'] = 'Vui lòng nhập email';
		}

		if (!$password) {
			$errors['password'] = 'Vui lòng nhập password';
		}

		if (count($errors) > 0) {
			$this->view->load('home/login', [
				'errors' => $errors
			]);
		} else {
			$user = $this->model->user->get_by_email($email);
			if (password_verify($password, $user['password']) == true) {
				if ($user['role'] == 2) {
					$_SESSION['id'] = $user['id'];
					var_dump($_SESSION['id']);
					$_SESSION['email'] = $user['email'];
					$_SESSION['name'] = $user['name'];
					$_SESSION['phone_number'] = $user['phone_number'];
					$_SESSION['address'] = $user['address'];
					redirect('home/index');
				} elseif ($user['role'] == 1) {
					$_SESSION['name'] = $user['name'];
					$_SESSION['phone_number'] = $user['phone_number'];
					$_SESSION['address'] = $user['address'];
					redirect('user/index');
				}
			} else {
				$this->view->load('home/login', [
					'error_message' => 'Tài khoản hoặc mật khẩu không chính xác !'
				]);
			}
		}
	}

	public function handle_logout()
	{
		// process logout

		session_start();
		unset($_SESSION['name']);
		session_destroy();
		redirect('home/login');
	}

	public function registration()
	{
		// show registration

		$this->view->load('home/registration');
	}

	public function handle_registration()
	{
		// process registration

		$name = getPostParameter('name');
		$address = getPostParameter('address');
		$phone_number = getPostParameter('phone_number');
		$email = getPostParameter('email');
		$password = getPostParameter('password');
		$re_password = getPostParameter('re_password');


		$errors = [];

		if (!$name) {
			$errors['name'] = 'Vui lòng nhập Họ và Tên';
		}

		if (!$address) {
			$errors['address'] = 'Vui lòng nhập địa chỉ';
		}

		if (!$phone_number) {
			$errors['phone_number'] = 'Vui lòng nhập số điện thoại';
		}

		if (!$email) {
			$errors['email'] = 'Vui lòng nhập email';
		}

		if (!$password || !$re_password) {
			$errors['password'] = 'Vui lòng nhập mật khẩu';
		}

		if ($password !== $re_password) {
			$errors['re_password'] = 'Mật khẩu không trùng khớp';
		}

		if (count($errors) > 0) {
			$this->view->load('home/registration', [
				'errors' => $errors
			]);
		} else {
			$role = 2;
			$password = hash_password($password);
			$user = $this->model->user->create([
				'name' => $name,
				'address' => $address,
				'phone_number' => $phone_number,
				'email' => $email,
				'password' => $password,
				'role' => $role
			]);
			$_SESSION['name'] = $user['name'];
			redirect('home/index');
		}
	}
}
