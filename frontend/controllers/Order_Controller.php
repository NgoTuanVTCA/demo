<?php
class Order_Controller extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		// trang danh sach san pham
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$orders = $this->model->order->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/index', [
			'orders' => $orders
		]);
	}

	function show()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$this->layout->set('auth_layout');
		$id = getParameter('id');
		$data = [
			'order' => $this->model->order->find_by_id($id)
		];
		$this->view->load('order/show', $data);
	}
	function edit()
	{
		// trang sua san pham
		// hien thi form sua san pham
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$id = getGetParameter('id');
		$orders = $this->model->order->find_by_id($id);
		$this->layout->set('auth_layout');
		$this->view->load('order/edit', [
			'orders' => $orders
		]);
	}
	function update()
	{
		$this->layout->set(null);

		$id = getParameter('id');
		$status = getParameter('status');
		$errors = [];

		if (count($errors) > 0) {
			$this->layout->set('auth_layout');
			$this->view->load(('order/edit'), [
				'errors' => $errors
			]);
		} else {
			$order = $this->model->order->update_by_id($id, [
				'status' => $status
			]);

			if ($order) {
				redirect('order/index');
			} else {
				$this->layout->set('auth_layout');
				$this->view->load('order/edit', [
					'error_message' => 'Cập nhật không thành công'
				]);
			}
		}
	}

	function index2()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$orders = $this->model->order->find();
		$partners = $this->model->partner->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/index2', [
			'orders' => $orders,
			'partners' => $partners
		]);
	}

	function check()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$orders = $this->model->order->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/check', [
			'orders' => $orders,
		]);
	}

	function edit2()
	{
		// trang sua san pham
		// hien thi form sua san pham
		$id = getGetParameter('id');
		$order = $this->model->order->find_by_id($id);
		$this->layout->set('auth_layout');
		$this->view->load('order/edit2', [
			'order' => $order
		]);
	}

	function update2()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		$status = getPostParameter('status');
		$order = $this->model->order->update_by_id($id, [
			'status' => $status
		]);
		if ($order) {
			redirect('order/check');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('order/edit2', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}
	
	public function transaction_history()
	{
		$orders = $this->model->order->get_order_by_user($_SESSION['id']);
		$partners = $this->model->partner->find();
		$this->view->load('order/transaction', [
			'orders' => $orders,
			'partners' => $partners
		]);
	}
}
