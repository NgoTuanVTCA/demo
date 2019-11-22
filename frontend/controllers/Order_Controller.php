<?php
class Order_Controller extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$orders = $this->model->order->find();
		$partners = $this->model->partner->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/index', [
			'orders' => $orders,
			'partners' => $partners
		]);
	}

	function check()
	{
		$orders = $this->model->order->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/check', [
			'orders' => $orders,
		]);
	}

	function edit()
	{
		// trang sua san pham
		// hien thi form sua san pham
		$id = getGetParameter('id');
		$order = $this->model->order->find_by_id($id);
		$this->layout->set('auth_layout');
		$this->view->load('order/edit', [
			'order' => $order
		]);
	}

	function handle_update()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		var_dump($id);
		$status = getPostParameter('status');
		// $errors = [];

		// if (!$name) {
		// 	$errors['name_err'] = 'Vui lòng nhập tên đối tác';
		// }
		// if (!$address) {
		// 	$errors['address_err'] = 'Vui long nhap địa chỉ';
		// }
		// if (!$phone_number) {
		// 	$errors['phone_err'] = 'Vui lòng nhập số điện thoại';
		// }
		// // if (!$email) {
		// // 	$errors['email_err'] = 'Vui lòng nhập email';
		// // }
		// if (!$area) {
		// 	$errors['area_err'] = 'Vui lòng chọn khu vực hoạt động';
		// }

		// if (count($errors) > 0) {
		// 	$this->layout->set('auth_layout');
		// 	$this->view->load('order/edit', [
		// 		'errors' => $errors
		// 	]);
			// redirect("partner/edit?id={$id}");
		// } else {
			$order = $this->model->order->update_by_id($id,[
				'status' => $status
			]);
			if ($order) {
				redirect('order/check');
			} else {
				// $this->layout->set('auth_layout');
				$this->view->load('order/check', [
					'error_message' => 'Cập nhật không thành công'
				]);
			}
		// }
	}
}
