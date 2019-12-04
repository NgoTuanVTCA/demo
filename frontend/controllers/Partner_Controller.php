<?php
class Partner_Controller extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
	    
	    if(empty($_SESSION['role']) || $_SESSION['role'] != 1){
	        redirect('home/index');
	    }
		$partners = $this->model->partner->find();
		$this->layout->set('auth_layout');
		$this->view->load('partner/index', [
			'partners' => $partners
		]);
	}

	function add()
	{
		// trang them san pham
		// hien thi form them san pham
		
	    if(empty($_SESSION['role']) || $_SESSION['role'] != 1){
	        redirect('home/index');
	    }
		$this->layout->set('auth_layout');
		$this->view->load('partner/add');
	}

	function store()
	{
		// xu li them san pham

		$name = getParameter('name');
		$address = getParameter('address');
		$phone_number = getParameter('phone_number');
		$email = getParameter('email');
		$area = getParameter('area');

		$partner_email = $this->model->partner->get_by_email($email);
		$partner_phone = $this->model->partner->get_by_phone($phone_number);

		$errors = [];

		if (!$name) {
			$errors['name_err'] = 'Vui lòng nhập tên đối tác';
		}
		if (!$address) {
			$errors['address_err'] = 'Vui long nhap địa chỉ';
		}
		if ($partner_phone) {
			$errors['phone_err'] = "số điện thoại \"$phone_number\" đã tồn tại";
		}
		if ($partner_email) {
			$errors['email_err'] = "email \"$email\" đã tồn tại";
		}
		if ($area == 'Chọn khu vực...') {
			$errors['area_err'] = 'Vui lòng chọn khu vực hoạt động';
		}
		if (count($errors) > 0) {
			$this->layout->set('auth_layout');
			$this->view->load('partner/add', [
				'errors' => $errors
			]);
		} else {
			$partner = $this->model->partner->create([
				'name' => $name,
				'address' => $address,
				'phone_number' => $phone_number,
				'email' => $email,
				'area' => $area
			]);

			if ($partner) {
				redirect('partner/index');
				var_dump($partner);
			} else {
				$this->view->load('partner/add', [
					'error_message' => 'Không thêm được đối tác mới'
				]);
			}
		}
	}

	function edit()
	{
		// trang sua san pham
		// hien thi form sua san pham
		
	    if(empty($_SESSION['role']) || $_SESSION['role'] != 1){
	        redirect('home/index');
	    }
		$id = getGetParameter('id');
		$partner = $this->model->partner->find_by_id($id);
		$this->layout->set('auth_layout');
		$this->view->load('partner/edit', [
			'partner' => $partner
		]);
	}

	function update()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		$name = getParameter('name');
		$address = getParameter('address');
		$phone_number = getParameter('phone_number');
		$area = getParameter('area');

		$errors = [];

		// if (!$name) {
		// 	$errors['name_err'] = 'Vui lòng nhập tên đối tác';
		// }
		// if (!$address) {
		// 	$errors['address_err'] = 'Vui long nhap địa chỉ';
		// }
		// // if (!$email) {
		// // 	$errors['email_err'] = 'Vui lòng nhập email';
		// // }
		// if (!$area) {
		// 	$errors['area_err'] = 'Vui lòng chọn khu vực hoạt động';
		// }

		if (count($errors) > 0) {
			$this->layout->set('auth_layout');
			$this->view->load(('partner/edit'), [
				'errors' => $errors
			]);
			// redirect("partner/edit?id={$id}");
		} else {
			$partner = $this->model->partner->update_by_id($id, [
				'name' => $name,
				'address' => $address,
				'phone_number' => $phone_number,
				'area' => $area
			]);
			if ($partner) {
				redirect('partner/index');
			} else {
				$this->layout->set('auth_layout');
				$this->view->load('partner/edit', [
					'error_message' => 'Cập nhật không thành công'
				]);
			}
		}
	}

}
