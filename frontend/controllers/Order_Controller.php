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

		$order = $this->model->order->update_by_id($id, [
			'status' => $status
		]);
		if ($order) {
			redirect('order/check');
		} else {
			$this->view->load('order/check', [
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
