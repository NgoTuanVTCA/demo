<?php
class Home_Controller extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	// show all posts
	function index()
	{
		$products = $this->model->product->find_category();
		$this->view->load('home/index', [
			'products' => $products
		]);
	}

	public function login()
	{
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
			if ($email == $user['email'] && $password == $user['password']) {
				if ($user['role'] == 2) {
					session_start();
					$_SESSION['name'] = $user['name'];
					redirect('home/index');
				} elseif ($user['role'] == 1) {
					session_start();
					$_SESSION['name'] = $user['name'];
					redirect('home/index');
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
		redirect('home/index');
	}

	public function registration()
	{
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
			$password = hash_password($email, $password);
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
