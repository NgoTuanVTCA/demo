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
		$this->view->load('home/show');
	}

	public function transaction_history()
	{
		// show transation his
		$this->view->load('home/transaction');
	}
	public function login()
	{
		// show login

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
			session_start();
			$_SESSION['name'] = $user['name'];
			redirect('home/index');
		}
	}
}
