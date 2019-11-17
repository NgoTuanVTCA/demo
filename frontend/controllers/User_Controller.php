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
