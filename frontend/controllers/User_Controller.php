<?php

class User_Controller extends Base_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->view->load('auth/auth_layout');
		$this->layout->set(null);
	}

	public function profile()
	{
		// show profile

		if (!$_SESSION['email']) {
			redirect('user/login');
		}
		$this->view->load('user/profile');
	}

	public function handle_update()
	{
		// process update

		$id = $_SESSION['id'];
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

		if (!$phone_number || !preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $phone_number)) {
			$errors['phone_number'] = 'Vui lòng nhập đúng số điện thoại';
		}

		if (count($errors) > 0) {
			$this->view->load('user/profile', [
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
			$this->view->load('user/profile', [
				'successfully' => 'Đổi thông tin thành công'
			]);
		}
	}
	public function password()
	{
		// show change password

		if (!$_SESSION['email']) {
			redirect('user/login');
		}
		$this->view->load('user/password');
	}

	public function handle_password()
	{

		// process change password

		$id = $_SESSION['id'];
		$user = $this->model->user->find_by_id($id);

		$old_password = getPostParameter('old_password');
		$new_password = getPostParameter('new_password');
		$re_new_password = getPostParameter('re_new_password');

		$errors = [];
		if (!$old_password) {
			$errors['old_password'] = 'Trường  này không được để trống';
		} elseif (!$new_password) {
			$errors['new_password'] = 'Trường này không được để trống';
		} elseif (!$re_new_password) {
			$errors['re_new_password'] = 'Trường này không được để trống';
		} elseif (password_verify($old_password, $user['password']) == false) {
			$errors['old_password'] = 'Sai mật khẩu hiện tại';
		} elseif ($old_password == $new_password) {
			$errors['new_password'] = 'Mật khẩu mới không được giống mật khẩu cũ';
		} elseif ($new_password != $re_new_password) {
			$errors['re_new_password'] = 'Mật khẩu không trùng khớp';
		}
		$new_password = hash_password($new_password);
		if (count($errors) > 0) {
			$this->view->load('user/password', [
				'errors' => $errors
			]);
		} else {
			$user = $this->model->user->update_by_id($id, [
				'password' => $new_password
			]);

			$this->view->load('user/password', [
				'successfully' => 'Đổi mật khẩu thành công'
			]);
		}
	}

	public function login()
	{
		// show login

		if ($_SESSION['email']) {
			redirect('home/index');
		}
		$this->view->load('user/login');
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
			if ($email == $user['email'] && password_verify($password, $user['password']) == true) {
				if ($user['role'] == 2) {
					$_SESSION['id'] = $user['id'];
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
				$this->view->load('user/login', [
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
		redirect('user/login');
	}

	public function registration()
	{
		// show registration

		$this->view->load('user/registration');
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

		if (!$phone_number || !preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $phone_number)) {
			$errors['phone_number'] = 'Vui lòng nhập đúng số điện thoại';
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
			$this->view->load('user/registration', [
				'errors' => $errors
			]);
		} else {
			$user = $this->model->user->get_by_email($email);
			if ($email != $user['email']) {
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
			} else {
				$this->view->load('user/registration', [
					'error_message' => 'Email đã được đăng ký'
				]);
			}
		}
	}

	// view form
	public function add()
	{
		$this->view->load('user/create');
		$this->layout->set(null);
	}

	// insert
	public function create()
	{
		$this->layout->set(null);

		$status = API_SUCCESS;
		$message = 'Lỗi hệ thống!';

		$phone_number	 = getPostParameter('phone_number');
		$email	 = getPostParameter('email');
		$name	 = getPostParameter('name');
		$password	 = getPostParameter('password');
		$repassword	 = getPostParameter('repassword');

		$user = $this->model->user->get_by_email($email);

		// Lỗi nhập lại password ko chính xác
		// và thay đổi nội dung thông báo
		if ($password != $repassword) {
			$status = API_ERROR;
			$message = 'Nhập lại mật khẩu không chính xác!';
		} else if ($user) {
			$status = API_ERROR;
			$message = "email \"$email\" đã tồn tại!";
		}

		// neu ko co loi
		if ($status === API_SUCCESS) {
			$this->model->user->create([
				'phone' => $phone_number,
				'email' => $email,
				'name' => $name,
				'password' => hash_password($password)
			]);

			// Khi login cho user
			// Bước 1: nhận post username & password của người dùng
			// BƯớc 2: mã hóa lại username & password nhận được
			// vd: $password = hash_password($username, $password);
			// so sánh với password trong dabase
			// select * from users where username = '$username' and password = '$password'
			// anh ví dụ vậy nhưng em phải viết query theo mẫu trong model anh đã viết nhé: vd model user
			// Bản chất hàm hash_password khi em truyền đúng username & password đã truyền khi đăng ký thì nó sẽ trả lại đúng chuỗi mã hóa giống với chuỗi mình lưu trong database
			// bản chất của việc mã hóa này là để bảo mật, ko ai có thể biết đc pass vì chuỗi này ko mã hóa ngược (giải mã) đc. Ngay cả người phát minh ra PHP :D
			// Và khi website bị hack, kẻ hack cũng ko đọc đc password.
			// ok, em học thêm nhé, ngồi đọc lại code, ngẫm cho ra nhé ;:D
			//e sẽ nghiên cứu lâu dài lun. a cao siêu quá :D, anh ko cao siêu đâu, nhưng yên tâm mà theo anh chắc chắn sớm pro hơn bạn bè :D
			// thanks a trc.ok nhé
			// có ngày e sẽ đích thân hậu tạ. oke hehe. bb em.bye a!

			// truyen vao mang rong vi truong hop nay ko can tra lai data
			$message = 'Đăng ký thành công!';
			return to_api_json(API_SUCCESS, $message, []);
		}
		return to_api_json(API_ERROR, $message, []);
	}
}
